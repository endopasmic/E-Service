<!-- this is View -->
<div id="record_form">
<h2>E-service:Add new Record</h2>
<br/>

<?php

//create Form
echo $this->Form->create('Log',array('label' => false));
//create text field
echo $this->Form->input('Employee Id');
echo $this->Form->input('Log.first_name');
echo $this->Form->input('Log.last_name');
echo $this->Form->input('Log.email');
echo $this->Form->input('Tel');
//create select form option

echo $this->Form->input('Log.department', array(
	'options' => array('ผู้บริหาร','สำนักงานอธิการบดี', 'ฝ่ายวิจัยและบริการวิชาการ','ศูนย์สารสนเทศและการสื่อสาร',
	'ศูนย์สหกิจศึกษาและจัดหางาน','งานทะเบียนและประมวลผล','งานการเรียนการสอน','งานประกันคุณภาพการศึกษา',
	'ฝ่ายกิจการนักศึกษา','งานประชาสัมพันธ์','ศูนย์รับสมัครนักศึกษา','ศูนย์วิทยบริการ','ฝ่ายบริหาร','คณะวิศวกรรมศาสตร์',
	'คณะเทคโนโลยีสารสนเทศ','คณะบริหารธุรกิจ','สำนักวิชาพื้นฐานและภาษา'),
    'empty' => '(choose one)'
));
echo $this->Form->input('Log.user_category', array(
    'options' => array('Officer','Student', 'Teacher'),
    'empty' => '(choose one)'
));
//create radio
$options = array('IT Support','System and Network','Website Develope','Design');
echo $this->Form->radio('Log.service', $options);
//create text field
echo $this->Form->input('location');
echo $this->Form->input('title');
?>
Detail
<?php
//create textarea
echo $this->Form->textarea('Detail',array(
	'label' => 'Detail',
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
