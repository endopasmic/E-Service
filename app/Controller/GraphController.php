<?php
//this is controller 

class GraphController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' ,'Paginator','Session');
	//set componant
	public $components=array('Session','Paginator','RequestHandler');
	//set object model
	var $uses = array('Log','Department','Status','UserCategory','Comment','Service');
	
	function PieGraph(){
		$department_data = $this->Log->find('all',array(
				'fields' => array('Log.department_id')
		));	
		$department_name  =$this->Department->find('all',array(
				'fields' => array('Department.department_name')	
		));
		$this->set(compact('department_data','department_name'));
		$this->set('_serialize',array('department_data','department_name'));
	}
	
	function LineGraph(){
		
	}
	
}

?>