<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Status;


class StatusController extends Controller
{
	
	public function actionCreate()
	{
		$model = new Status;

		if($model->load(Yii::$app->request->post()) && $model->validate())
		{
			return $this->render('view',['model' => $model]); 
		}
		else
		{
			return $this->render('create',['model' => $model]); 
		}
	}
}

?>