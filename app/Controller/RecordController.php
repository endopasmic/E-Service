<?php
//this is controller
class RecordController extends AppController{
	
	//set helper
	public $helpers = array('Html', 'Form', 'Js','Text' ,'Captcha');
	//set componant
	public $components=array('Captcha', 'Session');	
	//set object model
	var $uses = array('Log','Department','Status','UserCategory','Comment');
			
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
						'department' => $department+1,
						'user_category' => $user_category+1,
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
	
	public function Show(){
		$login_status = $this->Session->read('login_status');
		$this->set('login_status',$login_status);
			
		$this->set('log_data',$this->Log->find('all'));
		$this->set('log_amount',$this->Log->find('count'));
		
		$this->set('department_data',$this->Department->find('all'));
		$this->set('department_amount',$this->Department->find('count'));
		
		$this->set('status_data',$this->Status->find('all'));
		$this->set('status_amount',$this->Status->find('count'));
		
		$this->set('user_category_data',$this->UserCategory->find('all'));
		$this->set('user_category_amount',$this->UserCategory->find('count'));
	
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
				//imagepng($img);
				imagedestroy($img);
				imagedestroy($src);
	
				// End merge
				$comment= $this->request->data['Log']['Comment'];
				$this->set('comment',$comment);
	
				//INSERT data to DB
				$this->Log->create();
				$this->Log->save(array(
						'log_id' => $log_id,
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
				$this->Comment->save(array(
						'log_id' => $log_id,
						'comment' => $comment
				));
	
				$this->render('confirm_new_record');
			}
		}
	}
		
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
				$type = $this->request->data['Log']['type'];
				$search_key['type'] = $type;
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
			
			if($this->request->data['Log']['keyword'] != ""){
				$service = $this->request->data['Log']['keyword'];
				$search_key['keyword'] = $service;
			}
			
			if($this->request->data['Status']['status_name'] != ""){
				$service = $this->request->data['Status']['status_name'];
				$search_key['status'] = $service;
			}
			
			//check value that are not null in array
			$count_array = count(array_filter($search_key,create_function('$a','return $a !== null;')));
			
			//count value that not null
			for($i=0;$i<$count_array;$i++){
				
				if($this->request->data['Log']['type'] != ""){
					$type = $this->request->data['Log']['type'];
					$search_key['type'] = $type;
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
					
				if($this->request->data['Log']['keyword'] != ""){
					$service = $this->request->data['Log']['keyword'];
					$search_key['keyword'] = $service;
				}
					
				if($this->request->data['Status']['status_name'] != ""){
					$service = $this->request->data['Status']['status_name'];
					$search_key['status'] = $service;
				}
				
			}
			
			
			

			
			debug($search_key);
			debug($count_array);
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
				'conditions' => array('a' => 'a','b');
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
	
	public function StatusTag(){
		
	}
	
}

?>