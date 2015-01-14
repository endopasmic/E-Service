<!-- this is View -->

<!--script src="../../Signpad/jquery-1.11.2.min.js"></script>
<script src="../../Signpad/jquery.signaturepad.min.js"></script>
<script src="../../Signpad/assets/json2.min.js"></script>
<script src="../../Signpad/assets/flashcanvas.js"></script>
<script src="../../Signpad/assets/flashcanvas.swf"></script>
<link rel="stylesheet" href="../../Signpad/assets/jquery.signaturepad.css"-->
<head>
  <?php 
    echo $this->Html->script('jquery-1.9.1.min');
	echo $this->Html->script('jquery.signaturepad.min');
	echo $this->Html->script('json2.min');
	echo $this->Html->css('jquery.signaturepad');
  ?>
</head>
<body>
=======

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

<!--label for="name">Print your name</label-->
  
  <!--input type="text" name="name" id="name" class="name">
  <p class="typeItDesc">Review your signature</p-->
  <p>Draw your signature</p>
  <div class="sigPad">
  <ul class="sigNav">
    <!--li class="typeIt"><a href="#type-it" class="current">Type It</a></li--->
    <!--li class="drawIt"><a href="#draw-it">Draw It</a></li-->
    <li class="clearButton"><a href="#clear">Clear</a></li>
  </ul>
  <div class="sig sigWrapper">
    <div class="typed"></div>
    <canvas class="pad" width="190" height="55"></canvas>
    <?php
    	echo $this->Form->hidden('Signature',array('class' => 'output'));
    ?>
  </div>
  </div>

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

<script>
    $(document).ready(function() {
      $('.sigPad').signaturePad({drawOnly:true});
    });
</script>	

</div>
</body>
=======
?>	
</div>

