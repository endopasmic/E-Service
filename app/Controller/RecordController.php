<?php
//this is controller
class RecordController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' ,'Captcha');
	//set componant
	public $components=array('Captcha', );	
	//set object model
	var $uses = array('Log','Department','Status');
			
	public function index(){

	}
	
	public function captcha() {
		$this->Captcha->configCaptcha( array( 'pathType'=>3));
		$this->Captcha->getCaptcha();
	}
	
	
	public function NewRecord(){

		//in case before fill form
		if(!$this->request->is('post')){
			$this->render('new_record');
		}
		//in case after fill form	
		if($this->request->is('post')){
			if($this->Captcha->validateCaptcha()) {
				// OKの場合の処理 
				
				//debug what data is coming by POST
				debug($this->request->data);

				//set data
				$emp_id = $this->request->data['Log']['Employee Id'];
				$this->set('emp_id',$emp_id);
								
				$first_name = $this->request->data['Log']['first_name'];
				$this->set('first_name',$first_name);
								
				$last_name = $this->request->data['Log']['last_name'];
				$this->set('last_name',$last_name);
								
				$mail = $this->request->data['Log']['email'];
				$this->set('email',$mail);
				
				$tel = $this->request->data['Log']['Tel'];
				$this->set('tel',$tel);
												
				$department = $this->request->data['Log']['department'];
				$this->set('department',$department);
				
				$user_category = $this->request->data['Log']['user_category'];
				$this->set('user_category',$user_category);
				
				$service = $this->request->data['Log']['service'];
				$this->set('service',$service);
				
				$location = $this->request->data['Log']['location'];
				$this->set('location',$location);
				
				$title = $this->request->data['Log']['title'];
				$this->set('title',$title);
				
				$detail = $this->request->data['Log']['Detail'];
				$this->set('detail',$detail);
				
				//INSERT data to DB
				$this->Log->create();
				$this->Log->save(array(
						'status_id' => '1',
						'emp_id' => $emp_id,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'mail'=> $mail,
						'tel' => $tel,
						'department' => $department,
						'user_category' => $user_category,
						'service' => $service,
						'location' => $location,
						'title' => $title,
						'detail' => $detail
				));
										
				$this->render('confirm_new_record');
			}

		}
		else{
			
		}

	}
	
	public function Show(){
		$this->set('log_data',$this->Log->find('all'));
		$this->set('log_amount',$this->Log->find('count'));
		$this->set('department_data',$this->Department->find('all'));
		$this->set('status_data',$this->Status->find('all'));
	
		if($this->request->is('post')){
			debug($this->request->data);
				
			if($this->request->data['Status']['status_name']==1)
			{
				$this->redirect(array(
						'action' => 'Update'
				));
			}
			
				
				
		}
	}
	
	public function Delete(){
		$emp_id = $this->Log->getLastInsertId();
		$this->Log->delete($emp_id);
		/*
		$this->redirect(array(
				'action' => 'NewRecord'
		));
		*/
	}
	
	public function Update(){
		
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