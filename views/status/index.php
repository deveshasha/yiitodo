<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Statuses';
$this->title = 'Your Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){

            if($model->completion == 0)
            {
                return ['class'=>'danger'];
            }
            else 
            {
                return ['class'=>'success'];
            }

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'description:ntext',
            'completion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
