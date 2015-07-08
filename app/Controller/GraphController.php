<?php
//this is controller 

class GraphController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' ,'Paginator','Session');
	//set componant
	public $components=array('Session','Paginator','RequestHandler');
	//set object model
	var $uses = array('Log','Department','Status','UserCategory','Comment','Service');
	
	function ShowGraph(){
		$department_json = $this->Log->find('all',array(
				'fields' => array('Log.department_id')
		));		
		$this->set(compact('department_json'));
		$this->set('_serialize',array('department_json'));
	}
	
}

?>