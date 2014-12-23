<?php
//this is model
class Log extends AppModel{

	public $primaryKey = 'log_id';
	public $validate = array(

		'first_name' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'กรุณากรอกชื่อจริงด้วยครับ'
		)),
		'last_name' => array(
				'rule' => 'notEmpty',
				'message' => 'กรุณากรอกนามสกุลด้วยครับ'
		),
		'email' => array(
				'rule' => 'email',
				'message' => 'กรุณากรอกอีเมลล์ให้ถูกรูปแบบด้วยครับ'
		),
		'department' => array(
				'rule' => 'notEmpty',
				'message' => 'XXX'
					
		),
		'service' => array(
				'rule' => 'notEmpty'
		),
		'user_category' => array(
				'rule' => 'notEmpty'
		),
		'service' => array(
				'rule' => 'notEmpty'
		)		
					
		
	);
	
}

?>
