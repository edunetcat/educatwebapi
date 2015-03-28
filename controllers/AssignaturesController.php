<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\data\Pagination;
use app\models\Assignatures;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class AssignaturesController extends ActiveController {
	public $modelClass = 'app\models\Assignatures'; // no cal fer cap accio, nomes aixo i la resta ho fa el yii
	public function behaviors() {
		$behaviors = parent::behaviors ();
		// configurem la resposta en format json cuan es demani desde web
		$behaviors ['contentNegotiator'] ['formats'] ['text/html'] = Response::FORMAT_JSON;
		$behaviors ['authenticator'] = [ 
				'class' => QueryParamAuth::className () 
		]; // daquesta forma necesita la apikey

		return $behaviors;
	}
	public function init() {
		parent::init ();
		\Yii::$app->user->enableSession = false;
	}
}

?>