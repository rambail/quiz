<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionBank */

$this->title = $model->question_bank_id;
$this->params['breadcrumbs'][] = ['label' => 'Question Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->question_bank_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->question_bank_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'question_bank_id',
            'question_type_id',
            'nos_option',
            'question:ntext',
            'description:ntext',
            'category_id',
            'level_id',
            'has_figure',
            'max_mark',
            'no_time_served',
            'no_time_corrected',
            'no_time_incorrected',
            'no_time_unattempted',
        ],
    ]) ?>

</div>
