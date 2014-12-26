
<!-- Login Form -->
<h2>Login</h2>
<?php
if($login_status==0){

echo $this->Form->create(false,array(
	'action' => 'Login'
));
echo $this->Form->input('Username');
echo $this->Form->input('Password',array('type' => 'password'));
echo $this->Form->end('Login');
}
else if($login_status==1){
	echo "already logined";
}
echo "<br/>";
echo $this->Html->link('Logout',array('action' => 'Logout'));
?>

<!-- Search Form -->
<h2>Search As</h2>
<h3>Type</h3>
<?php
echo $this->Form->create(array(
	'type' => 'post',
	'url' => array('controller' => 'Record','action' => 'SearchResult'),
));
echo $this->Form->input('type',array(
	'options' => array('Employee ID','First Name','Last Name'),
	'empty' => 'Please choose one',
	'label' => false
));
?>
<h3>Month</h3>
<?php 
echo $this->Form->month('month',array('empty' => 'choose all'));
//echo $this->Form->year('year');
echo $this->Form->input('year',array(
	'type'=>'date',
	'dateFormat'=>'Y',
	'maxYear' => date('Y'),
	'empty' => 'choose all'
	));
echo $this->Form->input('keyword');
echo $this->Form->end('Search');
?>

<!-- status tag -->
<h2>Status Tag</h2>
<?php
echo $this->Html->link('รอรับดำเนินการ',array('action' => 'Status'));
echo "&nbsp";
echo $this->Html->link('กำลังดำเนินการ',array('action' => 'Status'));
echo "&nbsp";
echo $this->Html->link('ดำเนินการเสร็จแล้ว',array('action' => 'Status'));
echo "&nbsp";
echo $this->Html->link('ไม่สามารถแก้ไขเคสนี้ได้',array('action' => 'Status'));
echo "&nbsp";
echo $this->Html->link('ยกเลิก',array('action' => 'Status'));
echo "&nbsp";
?>
<br/>
<h2>Table</h2>
<!-- show table -->
<table border='1'>
<tr>
	<td>Employee ID</td>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Email</td>
	<td>Tel</td>
	<td>User Category</td>
	<td>Department</td>
	<td>Title</td>
	<td>Service</td>
	<td>Location</td>
	<td>Status</td>
</tr>
<?php 	for($i=0;$i<$log_amount;$i++) { ?>
<tr>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['emp_id']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['first_name']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['last_name']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['mail']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['tel']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	for($l=0;$l<$user_category_amount;$l++) 
	{
		if($log_data[$i]['Log']['user_category']==$user_category_data[$l]['UserCategory']['category_id'])
		{
			echo $user_category_data[$l]['UserCategory']['category_name']."<br/>";
		}
	}
	?>
	</td>
	<td>
	<?php	 	
	for($l=0;$l<$department_amount;$l++) 
	{	
		
		if($log_data[$i]['Log']['department']==$department_data[$l]['Department']['department_id'])
		{
			echo $department_data[$l]['Department']['department_name']."<br/>";
		}
	 
		 
	}

	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['title']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['service']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['location']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	if($login_status==1)
	{
		$option = array($status_data['0']['Status']['status_name'],
			$status_data['1']['Status']['status_name'],$status_data['2']['Status']['status_name'],
			$status_data['3']['Status']['status_name'],$status_data['4']['Status']['status_name']);
		 
		 
			echo $this->Form->create();
			echo $this->Form->input('Status.status_name',array(
				'label' => false,
				'options' => $option,
				'default' => $log_data[$i]['Log']['status_id']-1
			));
			//-1 because array is start at 0 but id start at 1
			echo $this->Form->input('log_id',array(
				'type' => 'hidden',
				'name' => 'log_id',
				'value' => $log_data[$i]['Log']['log_id'],
			));
			echo $this->Form->end('Submit');

			echo $this->Html->link('Detail',array(
				'action' => 'Detail',$log_data[$i]['Log']['log_id']
			));

	}
	else	
	{
		for($l=0;$l<5;$l++)
		{
			if($status_data[$l]['Status']['status_id']==$log_data[$i]['Log']['status_id'])
			{
				echo $status_data[$l]['Status']['status_name'];
			}
		}
	}	
	?>

	</td>	
</tr>
<?php } //end for loop ?>
</table>



