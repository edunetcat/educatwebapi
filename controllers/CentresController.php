<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Centres;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class CentresController extends ActiveController {
	public $modelClass = 'app\models\Centres'; 
	public function behaviors() {
	
		$behaviors = parent::behaviors();
		$behaviors['authenticator'] = [
				'class' => QueryParamAuth::className(),
		];
		return $behaviors;
	}
	
	
	public function init()
	{
		parent::init();
		\Yii::$app->user->enableSession = false;
	}
	
	
}
