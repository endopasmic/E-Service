<!-- this is View -->
<div id="record_form">
<h2>E-service:Add new Record</h2>
<br/>

<?php

//create Form
echo $this->Form->create('Log',array('label' => false));
//create text field
var_dump($log);
echo $this->Form->input('Employee Id',array('value'=>$log["Log"]["emp_id"]));
echo $this->Form->input('Log.first_name',array('value'=>$log["Log"]["first_name"]));
echo $this->Form->input('Log.last_name',array('value'=>$log["Log"]["last_name"]));
echo $this->Form->input('Log.email',array('value'=>$log["Log"]["mail"]));
echo $this->Form->input('Tel',array('value'=>$log["Log"]["tel"]));
//create select form option

echo $this->Form->input('Log.department', array(
	'options' => array('ผู้บริหาร','สำนักงานอธิการบดี', 'ฝ่ายวิจัยและบริการวิชาการ','ศูนย์สารสนเทศและการสื่อสาร',
	'ศูนย์สหกิจศึกษาและจัดหางาน','งานทะเบียนและประมวลผล','งานการเรียนการสอน','งานประกันคุณภาพการศึกษา',
	'ฝ่ายกิจการนักศึกษา','งานประชาสัมพันธ์','ศูนย์รับสมัครนักศึกษา','ศูนย์วิทยบริการ','ฝ่ายบริหาร','คณะวิศวกรรมศาสตร์',
	'คณะเทคโนโลยีสารสนเทศ','คณะบริหารธุรกิจ','สำนักวิชาพื้นฐานและภาษา'),
    'empty' => '(choose one)',
    'value'=>$log["Log"]["department"]
));
echo $this->Form->input('Log.user_category', array(
    'options' => array('Officer','Student', 'Teacher'),
    'empty' => '(choose one)',
    'value'=>$log["Log"]["user_category"]
));
//create radio
$options = array('it_support' => 'IT Support', 'system_and_network' => 'System and Network', 'website_develope' => 'Website Develope','design' => 'Design');
echo $this->Form->radio('Log.service', $options,array('value'=>$log["Log"]["service"]));
//create text field
echo $this->Form->input('location',array('value'=>$log["Log"]["location"]));
echo $this->Form->input('title',array('value'=>$log["Log"]["title"]));
?>
Detail
<?php
//create textarea
echo $this->Form->textarea('Detail',array(
	'label' => 'Detail',
	'value'=>$log["Log"]["title"]
));
?>
Comment
<?php
echo $this->Form->textarea('Comment',array(
	'label' => 'Comment',
));
?>
<!--create capcha --!>
กรุณากรอก ตามตัวอักษรดังต่อไปนี้ 
<?php 
echo $this->Captcha->input();

?>

<?php
//create button
echo $this->Form->button("Reset",array(
	'type' => 'reset'
));
echo $this->Form->submit('Submit');

echo $this->Form->end();

?>	
</div>