<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */

$this->title = $model->question_bank_id;
$this->params['breadcrumbs'][] = ['label' => 'Question Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-image-form">
    
    <?php //print_r($model);?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <h4> <?= $question ?></h4><br>
    <?= $description ?><br><br><br><br>
        <div class="row">
            <?= $form->field($model, 'imageFile')->widget(FileInput::classname(), 
            [
            'pluginOptions' => ['fileActionSettings' => ['showUploadedThumbs' => false,]],
            ]) ?>
                <br>
        </div> 
        <h4><?= 'Match the label and column description' ?></h4>
        <?php for( $i = 1; $i <= $questionNos; $i++ ) { ?>
                <?= 'Label ' . $i . ':' . str_repeat('&nbsp;', 10)?>
                <input type="text"  name="<?=  $i ?>" cols="40">
                <br>
        <?php } ?>
          
<br>

</div>


<div class="upload-image-form">
        <?= Html::submitButton('Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<br>

<?php ActiveForm::end(); ?>

