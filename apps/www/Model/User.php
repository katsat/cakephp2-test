<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public function recoverHp($user) {
		$user['User']['hp'] = $user['User']['mhp'];
		return $user;
	}

}
