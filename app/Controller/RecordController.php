<?php
//this is controller
class RecordController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' );
		
	public function index(){
		$this->redirect(array('action' => 'New_record'));
	}
	
	public function New_record(){
		
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