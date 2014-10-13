<!-- This is View -->
<?php
echo $this->Html->css('profile_setting');
?>
<div id="edit_profile_container">

	<div id="topic">Edit Profile</div>
	<div id="line"></div>

	<?php
	echo $this->Form->create(array(
		'enctype' => 'multipart/form-data',
		'type' => 'post'	
	));
	?>
	Pen Name
	<?php
	echo $this->Form->input('Pen Name',array(
		'value' => $UserData['User']['pen_name'],
		'label' => false
	));
	?>
	Password
	<?php
	echo $this->Form->input('Password',array(
		'value' => $UserData['User']['password'],
		'label' => false
	));
	?>
	Email
	<?php
	echo $this->Form->input('Email',array(
		'value' => $UserData['User']['email'],
		'label' => false
	));
	?>

	<h4>Current Display Image</h4>
	<img id="article_image" src="/Cakephp/<?php echo $UserData['User']['display_image_name']; ?>">

	<h4>New Image</h4>
	<input type="file" name="display_image" >
	<?php 
	echo $this->Form->end('Update');
	?>

</div>