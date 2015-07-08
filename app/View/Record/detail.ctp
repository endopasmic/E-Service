<!--This is detail.ctp View -->
log id
<?php
echo $log_data[0]['Log']['log_id'];
?>
<br />

status
<?php
echo $status_data[0]['Status']['status_name'];
?>
<br />

emp_id
<?php
echo $log_data[0]['Log']['emp_id'];
?>
<br />

service
<?php
echo $service_data[0]['Service']['service_name'];
?>
<br />

department
<?php
echo $department_data[0]['Department']['department_name'];
?>
<br />

first name
<?php
echo $log_data[0]['Log']['first_name'];
?>
<br />

last name
<?php
echo $log_data[0]['Log']['last_name'];
?>
<br />

mail
<?php
echo $log_data[0]['Log']['mail'];
?>
<br />

tel
<?php
echo $log_data[0]['Log']['tel'];
?>
<br />


category
<?php
echo $category_data[0]['UserCategory']['category_name'];
?>
<br />


title
<?php
echo $log_data[0]['Log']['title'];
?>
<br />


location
<?php
echo $log_data[0]['Log']['location'];
?>
<br />

<?php
$signature = $this->Html->image('Signature/'.$log_id.'.png'); 
//debug('/E-service/img/Signature/'.$log_id.'.png');

if(@getimagesize('http://localhost/E-service/img/Signature/19.png')){ 

?>

Signature
<br />
<?php
echo $this->Html->image('Signature/'.$log_id.'.png');
?>

<?php }else{ echo "notting";} ?>

