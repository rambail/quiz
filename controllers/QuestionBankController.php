<?php

namespace app\controllers;

use Yii;
use app\models\QuestionBank;
use app\models\QuestionType;
use app\models\Level;
use app\models\Category;
use app\models\Option;
use app\models\MatchColumn;
use app\models\Essay;
use app\models\QuestionBankSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\StoreImage;
use yii\web\UploadedFile;

use app\models\UploadForm;

/**
 * QuestionBankController implements the CRUD actions for QuestionBank model.
 */
class QuestionBankController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all QuestionBank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionBankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single QuestionBank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new QuestionBank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuestionBank();

        // Get all values for drop down box
        $category = ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name');
        $questionType = ArrayHelper::map(QuestionType::find()->all(), 'question_type_id', 'question_type');
        $level = ArrayHelper::map(Level::find()->all(), 'level_id', 'level_name');
        $nosOption = [
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                ]; // Option value restricted to divisible values

        $this->view->params['category'] = $category;
        $this->view->params['questionType'] = $questionType;
        $this->view->params['level'] = $level;
        $this->view->params['nosOption'] = $nosOption;

        $model->max_mark = 1;

        if(!empty($_POST)){
            $model->attributes=$_POST['QuestionBank'];
            $valid=$model->validate();
            if ($valid && $model->save()) {
                if ($model->question_type_id ==  1) { // It is of the type Multiple Question Single ansswer
                    return $this->redirect(['option', 'id' => $model->question_bank_id]);
                }
                if ($model->question_type_id ==  2) { // It is of the type Multiple Question Multiple ansswers
                    return $this->redirect(['multi-option', 'id' => $model->question_bank_id]);
                }
                if ($model->question_type_id ==  3) { // It is of the type Match the columns
                    return $this->redirect(['match-column', 'id' => $model->question_bank_id]);
                }
                if ($model->question_type_id ==  4) { // It is of the type Match the columns
                    return $this->redirect(['upload-image', 'id' => $model->question_bank_id]);
                }
                if ($model->question_type_id ==  5) { // It is of the type Essay
                    return $this->redirect(['essay', 'id' => $model->question_bank_id]);
                }
            }
            return $this->redirect(['view', 'id' => $model->question_bank_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category'=>$category,
                'questionType'=>$questionType,
                'level'=>$level,
                'nosOption'=>$nosOption,
            ]);
        }

    }

    /**
     * Updates an existing QuestionBank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->question_bank_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing QuestionBank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the QuestionBank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuestionBank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuestionBank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
    * Function for Multiple Question Single Ansswer
    */
    public function actionOption( $id){

        $optionModel = new Option(); // get the option model
        $model = $this->findModel($id);

        if(!empty($_POST)){
            $correct = $_POST['correct']; // Sl.no of the correct answer
            for( $i = 1; $i <= $model->nos_option; $i++ ) {
                //reset the model, needed for saving in loop
                $optionModel->option_id = NULL; //primary key(auto increment id) id
                $optionModel->isNewRecord = true;
                $optionModel->score = 0; //reset the score

                // One mark for correct answer
                if ($i == $correct) {
                    $optionModel->score = $model->max_mark;// correct answer to be set for full marks
                } 

                //save the model
                $optionModel->question_bank_id = $id;
                $optionModel->question_option = $_POST['option_' . $i ];
                $optionModel->save();
            }
            return $this->redirect(['index']); // Go to theindex view of question bank

        } else { // Go to option form
            return $this->render('option', [
                'model' => $model,
           ]);
        }
    }

    /*
    * Function for Multiple Question Multiple Ansswers
    */
    public function actionMultiOption( $id){

        $optionModel = new Option(); // get the option model
        $model = $this->findModel($id);

        if(!empty($_POST)){
            $correct = $_POST['correct']; // Sl.no of the correct answer
            $correctCount = count($correct); // number of correct answer
            $score = $model->max_mark/$correctCount; // fraction marks for each correct answer
            
            for( $i = 1; $i <= $model->nos_option; $i++ ) {
                //reset the model, needed for saving in loop
                $optionModel->option_id = NULL; //primary key(auto increment id) id
                $optionModel->isNewRecord = true;
                $optionModel->score = 0; //reset the score

                // assign score if the answer is correct
                foreach($correct as $val) {
                    if(intval($val) == $i) {
                        $optionModel->score = $score;
                    }
                }

                //save the model
                $optionModel->question_bank_id = $id;
                $optionModel->question_option = $_POST['option_' . $i ];
                $optionModel->save();
            }
            return $this->redirect(['index']); // Go to theindex view of question bank

        } else { // Go to multi option form
            return $this->render('multi-option', [
                'model' => $model,
            ]);
        }
    }

    /*
    * Function for Matching the columns
    */
    public function actionMatchColumn( $id){

        $columnModel = new MatchColumn(); // get the match column model
        $model = $this->findModel($id);

        if(!empty($_POST)){
            // fraction of marks for each correct answer 
            $score = $model->max_mark/$model->nos_option; 
            
            for( $i = 1; $i <= $model->nos_option; $i++ ) {
                //reset the model, needed for saving in loop
                $columnModel->match_column_id = NULL; //primary key(auto increment id) id
                $columnModel->isNewRecord = true;

                //save the model
                $columnModel->question_bank_id = $id;
                $columnModel->column = $_POST['col1_' . $i ]; // column to be matched
                $columnModel->column_match = $_POST['col2_' . $i ]; // correct column
                $columnModel->score = $score; // equal score for each column
                $columnModel->save();
            }
            return $this->redirect(['index']); // Go to theindex view of question bank

        } else { // Go to match column form
            return $this->render('match-column', [
                'model' => $model,
            ]);
        }
    }

    /*
    * Function for Essay
    */
    public function actionEssay( $id){

        $essayModel = new Essay(); // get the match column model
        $model = $this->findModel($id);

        if(!empty($_POST)){
            $essayModel->question_bank_id = $id;
            $essayModel->essay = $_POST['essay']; // get the essay
            $essayModel->save();
             
            return $this->redirect(['index']); // Go to theindex view of question bank

        } else { // Go to essay form
            return $this->render('essay', [
                'model' => $model,
            ]);
        }
    }

    /*
    * Function for uploading the figures. The model will have the save
    * command to save into a specified directory.
    */
    public function actionUploadImage($id)
    {
        $model = new StoreImage();
        $questionBankModel = $this->findModel($id);
        $columnModel = new MatchColumn();

        $question = $questionBankModel->question;
        $description = $questionBankModel->description;
        $questionNos = $questionBankModel->nos_option; 

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile'); //image captured
            
            //Image has been submitted
            // populate the field in image table
            $model->question_bank_id = $id;
            $imageName = Yii::$app->security->generateRandomString();
            $model->file_name = $imageName . '.' . $model->imageFile->extension;
            $model->nos_question = $questionBankModel->nos_option; 
            $model->file_size = $model->imageFile->size; 


            if ($model->upload()) {

                // file is uploaded and saved
                // populate the field in match column table
                $score = $questionBankModel->max_mark/$questionBankModel->nos_option; 
            
                for( $i = 1; $i <= $questionBankModel->nos_option; $i++ ) {
                    //reset the model, needed for saving in loop
                    $columnModel->match_column_id = NULL; //primary key(auto increment id) id
                    $columnModel->isNewRecord = true;

                    //save the model
                    $columnModel->question_bank_id = $id;
                    $columnModel->image_id = $model->image_id;
                    $columnModel->column = $i . ''; // column to be matched
                    $columnModel->column_match = $_POST[ $i ]; // correct column
                    $columnModel->score = $score; // equal score for each column
                    $columnModel->save();
                }
            }
            return $this->redirect(['index']); // Go to theindex view of question bank
       }

        return $this->render('upload-image', [
            'model' => $model,
            'question' => $question,
            'description' => $description,
            'questionNos' => $questionNos,
            ]);
    }

/*
    public function actionUpload()
    {
        $model = new Image();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->question_bank_id = 10;
            $model->file_name = $model->imageFile->baseName . '.' . $model->imageFile->extension;
            $model->file_size = $model->imageFile->size; 
            if ($model->save()) {
                // file is uploaded successfully
                
                $model->upload();            
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
*/
}
