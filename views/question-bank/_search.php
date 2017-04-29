<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-bank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'question_bank_id') ?>

    <?= $form->field($model, 'question_type_id') ?>

    <?= $form->field($model, 'nos_option') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'level_id') ?>

    <?php // echo $form->field($model, 'has_figure') ?> 
 
    <?php // echo $form->field($model, 'max_mark') ?> 
 
    <?php // echo $form->field($model, 'no_time_served') ?>

    <?php // echo $form->field($model, 'no_time_corrected') ?>

    <?php // echo $form->field($model, 'no_time_incorrected') ?>

    <?php // echo $form->field($model, 'no_time_unattempted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
