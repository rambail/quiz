<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Question Banks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-bank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Question Bank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'question_bank_id',
            'question_type_id',
            'nos_option',
            'question:ntext',
            'description:ntext',
            // 'category_id',
            // 'level_id',
            // 'no_time_served:datetime',
            // 'no_time_corrected:datetime',
            // 'no_time_incorrected:datetime',
            // 'no_time_unattempted:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
