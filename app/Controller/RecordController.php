<?php
//this is controller
class RecordController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' ,'Captcha');
	//set componant
	public $components=array( 'Security', 'Captcha', );	
	//set object model
	var $uses = array('Log');
		
	public function index(){

	}

	public function captcha() {
		$this->Captcha->configCaptcha( array( 'pathType'=>2));
		$this->Captcha->getCaptcha();
	}
	
	public function NewRecord(){
		if($this->Captcha->validateCaptcha()) {
			// OKの場合の処理
		}
		if($this->request->is('post'))
		{
			var_dump($this->request->data);
			
		}
		else 
		{
			
		}
	}
	
	public function ConfirmNewRecord(){
		
	}
	
	public function Update(){
		
	}
	
	public function Show(){
		
	}
	
	public function Detail(){
		
	}
	
	public function Comment(){
		
	}
	
	public function SerchResult(){
		
	}
	
	public function StatusTag(){
		
	}
	
}

?>