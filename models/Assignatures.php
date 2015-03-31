<?php
	
	namespace app\models;

	use yii\db\ActiveRecord;

	class Assignatures extends ActiveRecord {

		// No es necessari definir el model, Yii fa la associació automàticament a través de de la Class i la Table

		public static function find() {
		
			return parent::find ()->orderBy ( 'nomAssignatura ASC' );
		}
	}
	
	

?>