<?php
class NomTest extends \Codeception\TestCase\Test {
	use \Codeception\Specify;
	
	//use \Codeception\Verify; // no va, no es important
	
	/**
	 *
	 * @var \UnitTester
	 */
	protected $tester;
	protected function _before() {
		$this->user = new \app\models\User (); // creat usuari user de prova, no conectat amb la bbdd
		$this->persona = new \app\models\Persones ();
	}
	protected function _after() {
	}
	
	// tests
	public function testTaules() {
		$this->specify ( "Test de prova, el nom ha de ser nom", function () {
			$this->tester->assertEquals ( 'nom8', $this->persona->getNom () ); // comprovem que el nom sigui el que esperem
		} );
	}
}