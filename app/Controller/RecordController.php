<?php
//this is controller
class RecordController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' ,'Captcha');
	//set componant
	public $components=array('Captcha', 'Session');	
	//set object model
	var $uses = array('Log','Department','Status','UserCategory','Comment','Service');
			
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
				$log_data_array = array(
						'status_id' => '1',
						'emp_id' => $emp_id,
						'service_id' => $service,
						'department_id' => $department+1,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'mail'=> $mail,
						'tel' => $tel,
						'user_category' => $user_category+1,
						'service' => $service+1,
						'location' => $location,
						'title' => $title,
						'detail' => $detail
				);
				$this->Session->write('log_data_array', $log_data_array);
				$this->render('confirm_new_record');
			}

		}
		else{
			
		}

	}
	
	public function Login(){
		
		if($this->request->is('post')){
			debug($this->request->data);
			$username = $this->request->data['Username'];
			$password = $this->request->data['Password'];
			if($username == "admin" && $password == "icc"){
				//$this->Session->write('UserId',$UserData[$i]['User']['user_id']);
				$this->Session->write('login_status','1');
				$this->Session->setFlash("Login success");
			}
			else{
				$this->Session->write("login_status",'0');
				$this->Session->setFlash("Login fell");
			}
			
			$this->redirect(array(
				'action' => 'Show'
			));
			
		}
	}//end function
	
	public function Logout(){
		$this->Session->delete('login_status');
		$this->redirect(array(
				'action' => 'Show'
		));
	}
	
	public function Show($status_tag_id=null){
		$login_status = $this->Session->read('login_status');
		$this->set('login_status',$login_status);
		
		if(isset($status_tag_id)){
				$this->set('log_data',$this->Log->find('all',array('conditions' => array('Log.status_id' => $status_tag_id))));
				$this->set('log_amount',$this->Log->find('count',array('conditions' => array('Log.status_id' => $status_tag_id))));
		}
		else{
				$this->set('log_data',$this->Log->find('all'));
				$this->set('log_amount',$this->Log->find('count'));
		}
		
		$this->Session->delete('log_data_array');
		$this->Session->delete('comment_data_array');
			
		
		$this->set('department_data',$this->Department->find('all'));
		$this->set('department_data_list',$this->Department->find('list',array(
				'fields' => array('Department.department_name')
		)));
		$this->set('department_amount',$this->Department->find('count'));
		
		$this->set('status_data',$this->Status->find('all'));
		$this->set('status_data_list',$this->Status->find('list',array(
			'fields' => array('Status.status_name')
		)));
		$this->set('status_amount',$this->Status->find('count'));
		
		$this->set('user_category_data',$this->UserCategory->find('all'));
		$this->set('user_category_amount',$this->UserCategory->find('count'));
		
		$this->set('service_data',$this->Service->find('all'));
		$this->set('service_amount',$this->Service->find('count'));
	
		if($this->request->is('post')){
			debug($this->request->data);
			
			if($this->request->data['Status']['status_name']==0)
			{
			
				$status_update = array('log_id' => $_POST['log_id'],'status_id' => 1);
				$this->Log->save($status_update);
				$this->redirect(array(
						'action' => 'show'
				));
			
			}
			if($this->request->data['Status']['status_name']==1)
			{
				$this->redirect(array(
						'action' => 'Update',$_POST['log_id']
				));
			}
			if($this->request->data['Status']['status_name']==2)
			{
				
				$status_update = array('log_id' => $_POST['log_id'],'status_id' => 3);
				$this->Log->save($status_update);
				$this->redirect(array(
						'action' => 'show'
				));
				
			}
			if($this->request->data['Status']['status_name']==3)
			{
			
				$status_update = array('log_id' => $_POST['log_id'],'status_id' => 4);
				$this->Log->save($status_update);
				$this->redirect(array(
						'action' => 'show'
				));
			
			}
			if($this->request->data['Status']['status_name']==4)
			{
			
				$status_update = array('log_id' => $_POST['log_id'],'status_id' => 5);
				$this->Log->save($status_update);
				$this->redirect(array(
						'action' => 'show'
				));
			
			}//end if

			
				
				
		}//end if check post
	}//end function
	
	//action for insert Log table for NewRecord action
	public function InsertNewLog(){
	
		$log_data_array = $this->Session->read('log_data_array');
		if(isset($log_data_array)){
			$this->Log->create();
			$this->Log->save(array(
					'status_id' => $log_data_array['status_id'],
					'emp_id' => $log_data_array['emp_id'],
					'service_id' => $log_data_array['service_id'],
					'department_id' => $log_data_array['department_id'],
					'first_name' => $log_data_array['first_name'],
					'last_name' => $log_data_array['last_name'],
					'mail'=> $log_data_array['mail'],
					'tel' => $log_data_array['tel'],
					'user_category' => $log_data_array['user_category'],
					'location' => $log_data_array['location'],
					'title' => $log_data_array['title'],
					'detail' => $log_data_array['detail']
			));
			$this->Session->delete('log_data_array');
			$this->redirect(array(
					'action' => 'Show'
			));
		}
		else{
			$this->redirect(array(
					'action' => 'Show'
			));
		}
	}
	//action for edit Log table for Update action
	public function EditLog(){
	
		$log_data_array = $this->Session->read('log_data_array');
		$comment_data_array = $this->Session->read('comment_data_array');
		if(isset($log_data_array)){
			$this->Log->save(array(
					'log_id' => $log_data_array['log_id'],
					'status_id' => $log_data_array['status_id'],
					'emp_id' => $log_data_array['emp_id'],
					'service_id' => $log_data_array['service_id'],
					'department_id' => $log_data_array['department_id'],
					'first_name' => $log_data_array['first_name'],
					'last_name' => $log_data_array['last_name'],
					'mail'=> $log_data_array['mail'],
					'tel' => $log_data_array['tel'],
					'user_category' => $log_data_array['user_category'],
					'location' => $log_data_array['location'],
					'title' => $log_data_array['title'],
					'detail' => $log_data_array['detail']
			));
			$this->Comment->save(array(
					'log_id' => $comment_data_array['log_id'],
					'comment' => $comment_data_array['comment']
			));
			$this->Session->delete('log_data_array');
			$this->Session->delete('comment_data_array');
			$this->redirect(array(
					'action' => 'Show'
			));
		}
		else{
			$this->redirect(array(
					'action' => 'Show'
			));
		}
	}

	public function Delete($log_id=null){
		if(isset($log_id)){
			$this->Log->delete($log_id);
		}
	
		$this->redirect(array(
				'action' => 'Show'
		));
	
	}
	
	public function Update($log_id = null){
	
		$log = $this->Log->find('all', array('conditions' => array('Log.log_id' => $log_id)));
			
		$this->set('log', $log[0]);
		//debug($this->request->data);
		//var_dump($log[0]);
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
				$signature= $this->request->data['Log']['Signature'];
				$this->set('signature',$signature);
				$comment= $this->request->data['Log']['Comment'];
				$this->set('comment',$comment);
	
				require_once 'signature-to-image.php';
				$img = sigJsonToImage($signature);
				//Merge signature img with ICC Stamp
				$src = imagecreatefrompng('img/ICC_Stamp.png');
				imagealphablending($img, false);
				imagesavealpha($img, true);
				imagecopymerge($img, $src, 168, 0, 0, 0, 30, 55, 100); //have to play with these numbers for it to work for you, etc.
				//header('Content-Type: image/png');
				imagepng($img, 'img/Signature/'.$log_id.'.png');
				imagedestroy($img);
				imagedestroy($src);
				// End merge
				$comment= $this->request->data['Log']['Comment'];
				$this->set('comment',$comment);
	
				//INSERT data to DB
				$log_data_array = array(
						'log_id' => $log_id,
						'status_id' => '2',
						'emp_id' => $emp_id,
						'service_id' => $service+1,
						'department_id' => $department+1,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'mail'=> $mail,
						'tel' => $tel,
						'user_category' => $user_category+1,
						'location' => $location,
						'title' => $title,
						'detail' => $detail
				);
	
				$comment_data_array = array(
						'log_id' => $log_id,
						'comment' => $comment,
				);
				$this->Session->write('log_data_array', $log_data_array);
				$this->Session->write('comment_data_array', $comment_data_array);
	
				$this->render('confirm_update_record');
			}
		}
	}//end function of Update
	
		
	public function Detail($log_id = null){
		
	}
	
	public function Comment(){
		
	}
	
	public function SearchResult()
	{
		debug($this->request->data);
		
		if($this->request->is('post'))
		{
			$search_key = array();
			//check data that is null or not if not null it will give the value to array
			
			if($this->request->data['Log']['type'] != ""){
				//in case user fill in text field and select type put keyword in $keyword	
				$type = $this->request->data['Log']['type'];
				$keyword = $this->request->data['Log']['keyword'];
				
				//check what the typr that come in $keyword
				
				if($type == "emp_id"){
					$search_key['emp_id'] = $keyword;
					$search_key['first_name'] = "%%";
					$search_key['last_name'] = "%%";
				}
				else if($type == "first_name" ){
					$search_key['first_name'] = $keyword;
					$search_key['emp_id'] = "%%";
					$search_key['last_name'] = "%%";
				}
				else if($type == "last_name"){
					$search_key['last_name'] = $keyword;
					$search_key['first_name'] = "%%";
					$search_key['emp_id'] = "%%";
				}
				else{
					$search_key['last_name'] = "%%";
					$search_key['first_name'] = "%%";
					$search_key['emp_id'] = "%%";
				}
				
			}
			
			if($this->request->data['Log']['month']['month'] != ""){
				$type = $this->request->data['Log']['month']['month'];
				$search_key['month'] = $type;
			}
			
			if($this->request->data['Log']['year']['year'] != ""){
				$type = $this->request->data['Log']['year']['year'];
				$search_key['year'] = $type;
			}
			
			if($this->request->data['Log']['user_category'] != ""){
				$user_category = $this->request->data['Log']['user_category'];
				$search_key['user_category'] = $user_category;
			}
			
			if($this->request->data['Log']['service'] != ""){
				$service = $this->request->data['Log']['service'];
				$search_key['service'] = $service;
			}
			
			if($this->request->data['Log']['department'] != ""){
				$service = $this->request->data['Log']['department'];
				$search_key['department'] = $service;
			}
						
			if($this->request->data['Status']['status_name'] != ""){
				$service = $this->request->data['Status']['status_name'];
				$search_key['status'] = $service;
			}
			
			//check value that are not null in array
			$count_array = count(array_filter($search_key,create_function('$a','return $a !== null;')));
			
			//count value that not null
			$result_array = $this->Log->find('all',array(
					'conditions' => array(
						'Log.user_category LIKE' => $search_key['user_category'],
						'Log.service_id LIKE' =>	$search_key['service'],	
						'Log.department_id LIKE' => $search_key['department'],
						'Log.status_id LIKE' => $search_key['status'],
						'Log.emp_id LIKE' => $search_key['emp_id'],
						'Log.first_name LIKE' => $search_key['first_name'],
						'Log.last_name LIKE' => $search_key['last_name'],			 								
					)//end condition 
			));//end find all

			
			/*
			//count value that not null
			$result_array = $this->Log->find('all',array(
					'conditions' => array(
						'Log.user_category' => $search_key['user_category'],
						'Log.service' => $search_key['service'],
						'Log.department' => $search_key['department'],
						'Log.status_id' => $search_key['status'],
						'Log.emp_id' => $search_key['type'],									
					)//end condition 
			));//end find all
			 * */
			

			
			debug($search_key);
			debug($count_array);
			debug($result_array);
			/*
			if($this->request->data['Log']['month']['month']=="" && $this->request->data['Log']['year']['year']=="")
			{
				echo "check case1";	
				$keyword = $this->request->data['Log']['keyword'];
				
				if($this->request->data['Log']['type']==0){
					debug($this->Log->findAllByEmpId($keyword));
					$this->set('keyword',$this->Log->findAllByEmpId($keyword));					
				}
				else if($this->request->data['Log']['type']==1){
					debug($this->Log->findAllByEmpId($keyword));
					$this->set('keyword',$this->Log->findAllByFirstName($keyword));
				}
				else if($this->request->data['Log']['type']==2){
					debug($this->Log->findAllByEmpId($keyword));
					$this->set('keyword',$this->Log->findAllByLastName($keyword));
				}

			}
			
			case condition = 1
			$this->find-('all',array(
				'conditions' => array('a' => 'a');
			)
			case condition = 2
			$this->find-('all',array(
				'conditions' => array('a' => 'a');
			)
			
			//select type and month case
			else if($this->request->data['Log']['year']['year']=="")
			{
				echo "check case2";
				
				$keyword = $this->request->data['Log']['keyword'];
				$month = $this->request->data['Log']['month']['month']+1;
				
				if($this->request->data['Log']['type']==0){
					debug($this->Log->findAllByEmpId($keyword));
					$this->set('keyword',$this->Log->find('all',array(
						'conditions' => array('Log.emp_id' => $keyword,'Log.department' => $month)
					)));
				}
				else if($this->request->data['Log']['type']==1){
					debug($this->Log->findAllByEmpId($keyword));
					$this->set('keyword',$this->Log->findAllByFirstName($keyword));
				}
				else if($this->request->data['Log']['type']==2){
					debug($this->Log->findAllByEmpId($keyword));
					$this->set('keyword',$this->Log->findAllByLastName($keyword));
				}
				
			}
			
			//select any selection
			else
			{
				echo "check case3";	
			}
			*/
			
			
		}//end if post check
		
	}
	
	public function Status(){
		
	}
	
}

?>