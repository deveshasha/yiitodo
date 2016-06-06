<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Statuses';
$this->title = 'Your Tasks';
$this->params['breadcrumbs'][] = $this->title;

$model->completion=1;
$model->save();

?>
<div class="status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){

            if($model->completion == 0)
            {
                return ['class'=>'danger','style'=>'color:#e60000;cursor:pointer;cursor:hand;','id'=> $model['id'],'onclick'=>'location.href="'.Yii::$app->urlManager->createUrl('status/view').'?id="+(this.id);',
            ];
            }
            else 
            {
                return ['class'=>'success','style'=>'color:#00cc00;cursor:pointer;cursor:hand;','id'=> $model['id'], 'onclick' => 'location.href="'.Yii::$app->urlManager->createUrl('status/view').'?id="+(this.id);',
            ];
            }        

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title:ntext',
            'description:ntext',
            [
                'attribute'=>'completion',
                'value'=>'completion',
                'contentOptions'=>['style'=>'width:50px;text-align:center;']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['style'=>'width:160px;'],
                'template'=>'{done}',
                'buttons'=>[
                    
                        'done'=>function($url,$model,$key)
                        {
                            if($model->completion == 0)
                            return Html::a('Mark as done', ['done', 'id'=>$model->id]);
                        },
                    

                ],
            ],

        ],

       /* 'buttons'=>[
                    'my_button'=>function($url,$model,$key)
                    {
                        return Html::a('Myy',['update','id'=>$model->id]);
                    },
        ],*/
    ]); ?>


    <p>
        <?= Html::button('Create Task', ['value'=>Url::to(['status/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([

            'header'=>'<h4>Tasks</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
            ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
</div>
