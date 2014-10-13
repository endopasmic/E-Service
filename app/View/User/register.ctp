
<h2>Register</h2>
<?php
	echo $this->Form->create('User',array(
		'enctype' => 'multipart/form-data'
	));
	echo $this->Session->flash();
	echo $this->Form->input('Pen Name');
	echo $this->Form->input('Password',array('type' => 'password'));
	echo $this->Form->input('Email');
?>	
<input type="file" name="DisplayImage" />
<?php 
	echo $this->Form->end('Register');
	
?>