<?php echo $emp_id; ?><br/>
<?php echo $first_name; ?><br/>
<?php echo $last_name; ?><br/>
<?php echo $email; ?><br/>
<?php echo $tel; ?><br/>
<?php echo $department; ?><br/>
<?php echo $user_category; ?><br/>
<?php echo $service; ?><br/>
<?php echo $location; ?><br/>
<?php echo $title; ?><br/>
<?php echo $detail; ?><br/>
<?php $comment_data_array = $this->Session->read('comment_data_array');
	var_dump($comment_data_array );
?>

<!-- form for confirm or not -->
<?php
echo $this->Html->link('Confirm',array(
'action' => 'EditLog'
));
echo "<br/>";
echo $this->Html->link('Cancel',array(
'action' => 'Show'
));
?>:
