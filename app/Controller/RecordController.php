<?php
//this is controller
class RecordController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' );
	
	//set object model
	var $uses = array('Log');
		
	public function index(){

	}
	
	public function New_record(){
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