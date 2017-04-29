<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */

$this->title = $model->question_bank_id;
$this->params['breadcrumbs'][] = ['label' => 'Question Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="essay-form">
    
    <?php //print_r($sectionTensionLength);?>

    <?php $form = ActiveForm::begin(); ?>
    <h4> <?= $model->question ?></h4><br>

    <div class="row">
        <textarea name="essay" cols="80" rows="20"></textarea>
        <br>
    </div>
   
<br>

</div>


<div class="essay-form">
        <?= Html::submitButton('Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<br>

<?php ActiveForm::end(); ?>

