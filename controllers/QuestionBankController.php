<?php

namespace app\controllers;

use Yii;
use app\models\QuestionBank;
use app\models\QuestionType;
use app\models\Level;
use app\models\Category;
use app\models\QuestionBankSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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

        $category = ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name');
        $questionType = ArrayHelper::map(QuestionType::find()->all(), 'question_type_id', 'question_type');
        $level = ArrayHelper::map(Level::find()->all(), 'level_id', 'level_name');
        $nosOption = [
                2 => 2,
                4 => 4,
                5 => 5,
                ];

        $this->view->params['category'] = $category;
        $this->view->params['questionType'] = $questionType;
        $this->view->params['level'] = $level;
        $this->view->params['nosOption'] = $nosOption;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
}
