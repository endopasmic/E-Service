<!-- Show data from new record form -->
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
 
 <!-- form for confirm or not -->
 <?php
 echo $this->Html->link('Confirm',array(
'action' => 'InsertNewLog'
 ));
 
 echo "<br/>";
 
 echo $this->Html->link('Cancel',array(
'action' => 'Show'
 ));
 ?>