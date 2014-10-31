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
//create option

echo $this->Form->input('Department', array(
	'options' => array('ผู้บริหาร','สำนักงานอธิการบดี', 'ฝ่ายวิจัยและบริการวิชาการ','ศูนย์สารสนเทศและการสื่อสาร',
	'ศูนย์สหกิจศึกษาและจัดหางาน','งานทะเบียนและประมวลผล','งานการเรียนการสอน','งานประกันคุณภาพการศึกษา',
	'ฝ่ายกิจการนักศึกษา','งานประชาสัมพันธ์','ศูนย์รับสมัครนักศึกษา','ศูนย์วิทยบริการ','ฝ่ายบริหาร','คณะวิศวกรรมศาสตร์',
	'คณะเทคโนโลยีสารสนเทศ','คณะบริหารธุรกิจ','สำนักวิชาพื้นฐานและภาษา'),
    'empty' => '(choose one)'
));
echo $this->Form->input('User Category', array(
    'options' => array('Officer','Student', 'Teacher'),
    'empty' => '(choose one)'
));
//create radio
$options = array('it_support' => 'IT Support', 'system_and_network' => 'System and Network', 'website_develope' => 'Website Develope','design' => 'Design');
echo $this->Form->radio('Service', $options);
//create text field
echo $this->Form->input('Location');
echo $this->Form->input('Title');
?>
Detail
<?php
//create textarea
echo $this->Form->textarea('Detail',array(
	'label' => 'Detail',
));
?>

<!--create capcha --!>

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
