
<!-- Login Form -->
<h2>Login</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('Username');
echo $this->Form->input('Password',array('type' => 'password'));
echo $this->Form->end('Login');
?>

<!-- Search Form -->
<h2>Search As</h2>
<h3>Type</h3>
<?php
echo $this->Form->create();
echo $this->Form->input('type]',array(
	'options' => array('Employee ID','First Name','User Category','Service','Department','Status'),
	'empty' => 'choose all',
	'label' => false
));
?>
<h3>Month</h3>
<?php 
echo $this->Form->month('month',array('empty' => 'choose all'));
//echo $this->Form->year('year');
echo $this->Form->input('year',array('type'=>'date', 'dateFormat'=>'Y','empty' => 'choose all'));
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
	 
	 
		echo $log_data[$i]['Log']['user_category']."<br/>";
	 
	?>
	</td>
	<td>
	<?php
	 
	 
		echo $log_data[$i]['Log']['department']."<br/>";
	 
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
	$option = array($status_data['0']['Status']['status_name'],$status_data['1']['Status']['status_name'],
	$status_data['2']['Status']['status_name'],$status_data['3']['Status']['status_name'],
	$status_data['4']['Status']['status_name']);
	 
	 
		echo $this->Form->create();
		echo $this->Form->input('Status.status_name',array(
			'label' => false,
			'options' => $option,
		));
		echo $this->Form->end('Submit');
	 
	?>

	</td>	
</tr>
<?php } ?>
</table>



