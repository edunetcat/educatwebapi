<?php

namespace app\models;

use yii\db\ActiveRecord;

class Persones extends ActiveRecord {
	
	
	public function getNom(){
		return $this->nom;
	}
	
}
