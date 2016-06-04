<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = $model->title;
$done = $model->completion;
$color = gcolor($done);
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

function gcolor($done)
{
	if($done==1)
		return "green";
	else
		return "red";
}

?>
<div class="status-view">

    	<h1 style="color: <?=$color?> "><?= Html::encode($this->title) ?></h1>	
    	<br><br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'title:ntext',
            'description:ntext',
            'completion',
        ],
        /*'options' =>[

        function($model)
        {
        	if($model->completion == 0)
        	{
        		return ['style'=>'background-color:red'];
        	}
        	else
        	{
        		return ['style'=>'background-color:green'];
        	}
        }
        ],*/

    ]) ?>

</div>
