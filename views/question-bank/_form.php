<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-bank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question_type_id')->textInput() ?>

    <?= $form->field($model, 'nos_option')->textInput() ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <?= $form->field($model, 'no_time_served')->textInput() ?>

    <?= $form->field($model, 'no_time_corrected')->textInput() ?>

    <?= $form->field($model, 'no_time_incorrected')->textInput() ?>

    <?= $form->field($model, 'no_time_unattempted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
