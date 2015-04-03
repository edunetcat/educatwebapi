<?php
class NomTest extends \Codeception\TestCase\Test {
	/**
	 *
	 * @var \UnitTester
	 */
	protected $tester;
	protected function _before() {
	}
	protected function _after() {
	}
	
	// tests
	public function testMe() {
		// creat usuari user de prova, no conectat amb la bbdd
		$this->user = new \app\models\User ();
	}
}