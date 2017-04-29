<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */

$this->title = 'Create Question Bank';
$this->params['breadcrumbs'][] = ['label' => 'Question Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="question-create">
	<?php $form = ActiveForm::begin(); ?> 
    <h1>New Question for the Question Bank</h1>
    <br><br>
	<div style="float:left;padding:00px">
		<div class="row">
		    <div class="col-lg-10">
		        <?= $form->field($model, 'category_id')->dropDownList($this->params['category'],[ 'prompt' => '--- choose from ---' ]) ?>
		        <?= $form->field($model, 'question_type_id')->dropDownList($this->params['questionType'],[ 'prompt' => '--- choose from ---' ]) ?>
		        <?= $form->field($model, 'level_id')->dropDownList($this->params['level'],[ 'prompt' => '--- choose from ---' ]) ?>
		        <?= $form->field($model, 'nos_option')->dropDownList($this->params['nosOption'],[ 'prompt' => '--- choose from ---' ]) ?>
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-lg-8">        
	    	<?= $form->field($model, 'question')->textarea(['rows' => 2]) ?>
	        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	        <?= $form->field($model, 'has_figure')->checkbox(); ?>
		</div>
		<div class="col-lg-2">
				<?= $form->field($model, 'max_mark')->textInput(); ?>
		</div>
	</div>
	<div class="row">
	</div>

	<div class="form-group">
	    <?= Html::submitButton('Next' , ['class' => 'btn btn-success']) ?>
	</div>
	<?php ActiveForm::end() ?>
</div>