<h2>Register Confirm</h2>
Pen Name : <?php echo $PenName; ?>
<br/>
Password : <?php echo $Password; ?>
<br/>
Email : <?php echo $Email; ?>
<br/>

<?php
	echo $this->Form->create('User',array(
		'enctype' => 'multipart/form-data'
	));
	echo $this->Session->flash();

?>

	<input type="hidden" name="ok" value="ok"/>
	<input type="hidden" name="PenName" value="<?php echo $PenName; ?>" />
	<input type="hidden" name="Password" value="<?php echo $Password; ?>" />
	<input type="hidden" name="Email" value="<?php echo $Email; ?>" />
	<br/>
	Display Image
	<br/>
	<img src="<?php echo $DisplayImage; ?>" >

<?php
	echo $this->Form->end('Confirm');
	
	echo $this->Html->link($this->Form->button('Cancel'), 
								array('action' => 'Register'), 
								array('escape'=>false,'title' => "Cancel")
							   );//create link button
	
?>