<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

	public function testRecoverHp() {
		$user = [
			'User' => [
				'id'	=> 1,
				'name'	=> 'sanpei',
				'hp'	=> 3,
				'mhp'	=> 100,
			],
		];

		$expected = [
			'User' => [
				'id'	=> 1,
				'name'	=> 'sanpei',
				'hp'	=> 100,
				'mhp'	=> 100,
			],
		];

		$result = $this->User->recoverHp($user);

		$this->assertEquals($expected, $result);
	}
}
