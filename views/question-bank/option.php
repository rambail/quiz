<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */

$this->title = $model->question_bank_id;
$this->params['breadcrumbs'][] = ['label' => 'Question Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ohe-progress-form">
    
    <?php //print_r($sectionTensionLength);?>

    <?php $form = ActiveForm::begin(); ?>
    <h4> <?= $model->question ?></h4><br>
    <?= $model->description ?><br><br><br><br>

    <?php for( $i = 1; $i <= $model->nos_option; $i++ ) { ?>
        <div class="row">
            <input type="radio" name="correct" value="<?= $i ?>" > 
            <textarea name="<?= 'option_' . $i ?>" cols="80" rows="3"></textarea>
            <br>
        </div>
    <?php } ?>
   
<br>

</div>


<div class="ohe-progress-form">
        <?= Html::submitButton('Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<br>

<?php ActiveForm::end(); ?>

