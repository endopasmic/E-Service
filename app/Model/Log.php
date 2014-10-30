<?php
//this is model
class Log extends AppModel{

	public $validate = array(

		'first_name' => array(
				'rule' => 'notEmpty',
				'message' => 'กรุณากรอกชื่อจริงด้วยครับ'
		),
		'last_name' => array(
				'rule' => 'notEmpty',
				'message' => 'กรุณากรอกนามสกุลด้วยครับ'
		),
		'email' => array(
				'rule' => 'email',
				'message' => 'กรุณากรอกอีเมลล์ให้ถูกรูปแบบด้วยครับ'
		),

					
		
	);
	
}

?>
