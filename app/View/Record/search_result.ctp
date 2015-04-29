
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
