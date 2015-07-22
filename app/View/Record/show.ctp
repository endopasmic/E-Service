
<!-- Login Form -->
<h2>Login</h2>
<?php

//if $login_status=0 it means still not login. $login=1 it means already logined 
if($login_status==0){

echo $this->Form->create(false,array(
	'action' => 'Login',
	'novalidate' => 'true'
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

<br />

<!-- New Record button -->
<?php
echo $this->Html->link('New Record',array(
	'action' => 'NewRecord'
));

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
	'options' => array('%%' => 'choose all','emp_id' => 'Employee ID','first_name' => 'First Name','last_name' => 'Last Name'),
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
?>
<?php
echo $this->Form->input('Log.user_category', array(
    'options' => array('%%' => 'choose all',1 => 'Officer',2 => 'Student',3 => 'Teacher'),
    'required' => false
));
?>
<?php
//create radio
$options = array('%%' => 'choose all','1' => $service_data['0']['Service']['service_name'],'2' => $service_data['1']['Service']['service_name'],'3' =>$service_data['2']['Service']['service_name'],'4' => $service_data['3']['Service']['service_name']);
echo $this->Form->input('Log.service', array(
	'options' => $options,
	'required' => false
));

?>
<?php
echo $this->Form->input('Log.department', array(
	'options' => $department_data_list,
	'empty' => array('%%' => 'choose all')
));
?>
<h3>Status</h3>
<?php

echo $this->Form->input('Status.status_name',array(
			'label' => false,
			'options' => $status_data_list,
			'empty' => array('%%' => 'choose all')
));

echo $this->Form->input('keyword');
echo $this->Form->end('Search');

?>

<!-- link to graph page -->
<h2>Link to Graph page</h2>
<?php
echo $this->Html->link('Pie Graph',array(
	'controller' => 'Graph',
	'action' => 'PieGraph'
));
?>

<br />
<?php
echo $this->Html->link('Line Graph',array(
	'controller' => 'Graph',
	'action' => 'LineGraph'
));
?>
<br /><br />

<!-- status tag -->
<h2>Status Tag</h2>
<?php
echo $this->Html->link('รอรับดำเนินการ',array('action' => 'Show',1));
echo "&nbsp";
echo $this->Html->link('กำลังดำเนินการ',array('action' => 'Show',2));
echo "&nbsp";
echo $this->Html->link('ดำเนินการเสร็จแล้ว',array('action' => 'Show',3));
echo "&nbsp";
echo $this->Html->link('ไม่สามารถแก้ไขเคสนี้ได้',array('action' => 'Show',4));
echo "&nbsp";
echo $this->Html->link('ยกเลิก',array('action' => 'Show',5));
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
<?php 	for($i=$log_amount-1;$i>-1;$i--) { ?>
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
		
		if($log_data[$i]['Log']['department_id']==$department_data[$l]['Department']['department_id'])
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
	for ($l = 0; $l < $service_amount ;$l++) 
	{
		if($log_data[$i]['Log']['service_id'] == $service_data[$l]['Service']['service_id'])
		{
			echo $service_data[$l]['Service']['service_name'];
		}	
	}
	 
		//echo $log_data[$i]['Log']['service']."<br/>";
	 
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
			echo("<br/>");
			echo $this->Html->link('Delete',array(
				'action' => 'Delete',$log_data[$i]['Log']['log_id']),
				array('onclick'=>'return confirm("Are you sure?");')
			);

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



