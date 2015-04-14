<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Persona;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class LoginController extends ActiveController {
	public $modelClass = 'app\models\Persona'; 
	
	
	
	public function init()
	{
		parent::init();
		\Yii::$app->user->enableSession = false;
	}
	
	public function actionLogin()
	{
		
			return 'LAMEVAAPIKEY';
		
	}
	
	
}
