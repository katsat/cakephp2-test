<?php
class Post extends AppModel {
	public $hasMany = "Comment";
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message'=>'$B$+$i$8$c$@$a(B'
		),
		'body' => array(
			'rule' => 'notEmpty'
		)
	);
}
