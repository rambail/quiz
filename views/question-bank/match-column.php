<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */

$this->title = $model->question_bank_id;
$this->params['breadcrumbs'][] = ['label' => 'Question Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-column-form">
    
    <?php //print_r($sectionTensionLength);?>

    <?php $form = ActiveForm::begin(); ?>
    <h4> <?= $model->question ?></h4><br>
    <?= $model->description ?><br><br><br><br>

    <?php for( $i = 1; $i <= $model->nos_option; $i++ ) { ?>
        <div class="row">
            <textarea name="<?= 'col1_' . $i ?>" cols="40" rows="2"></textarea>
            <textarea name="<?= 'col2_' . $i ?>" cols="40" rows="2"></textarea>
            <br>
        </div>
    <?php } ?>
   
<br>

</div>


<div class="match-column-form">
        <?= Html::submitButton('Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<br>

<?php ActiveForm::end(); ?>

