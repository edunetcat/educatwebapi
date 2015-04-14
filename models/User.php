<?php


namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
*	Model User
*
* 	@author Marcos
*/

class User extends ActiveRecord implements IdentityInterface {
	
	
	  public static function tableName() {
	  return 'persona';
	  }
	 
	public function behaviors() {
		return [
				TimestampBehavior::className ()
		];
	}
	/*
	 *
	 * private static $users = [
	 * '100' => [
	 * 'id' => '100',
	 * 'username' => 'admin',
	 * 'password' => 'admin',
	 * 'authKey' => 'test100key',
	 * 'accessToken' => '100-token',
	 * ],
	 * '101' => [
	 * 'id' => '101',
	 * 'username' => 'demo',
	 * 'password' => 'demo',
	 * 'authKey' => 'test101key',
	 * 'accessToken' => '101-token',
	 * ],
	 * ];
	 */
	/**
	 * @inheritdoc
	 */
	/*
	 * public static function findIdentity($id)
	 * {
	 * return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
	 * }
	 */

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id) {
		return static::findOne ( [
				'id' => $id,
				'status' => self::STATUS_ACTIVE
		] );
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		return static::findOne ( [
				'authKey' => $token 
		] );

		/*
		 * foreach ( self::$users as $user ) {
		 * if ($user ['accessToken'] === $token) {
		 * return new static ( $user );
		 * }
		 * }
		*/

		return null;
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username) {
		/*
		 * foreach ( self::$users as $user ) {
		 * if (strcasecmp ( $user ['username'], $username ) === 0) {
		 * return new static ( $user );
		 * }
		 * }
		 *
		 * return null;
		 */
		return static::findOne ( [
				'username' => $username,
				'status' => self::STATUS_ACTIVE
		] );
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
		return $this->password;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
		return $this->authKey === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password
	 *        	password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password) {
		return $this->password === $password;
	}

	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey() {
		$this->auth_key = Yii::$app->security->generateRandomString ();
	}
	public function removePasswordResetToken() {
		$this->password_reset_token = null;
	}
}
