<?php
class Post extends AppModel {
	public $hasMany = "Comment";
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message'=>'からじゃだめ'
		),
		'body' => array(
			'rule' => 'notEmpty'
		)
	);
}
