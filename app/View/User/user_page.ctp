<!-- This is View -->
<?php
	echo $this->Html->css('user_page');
 ?>

<div id="topic">
	<?php echo $UserData['User']['pen_name']; ?> Page<br/>
	<img src="/CakePHP/<?php echo $UserData['User']['display_image_name']; ?>">
</div>

<div id="profile_setting">
	<?php
		echo $this->Html->link(
				'Profile Setting',
				array(
						'controller' => 'User',
						'action' => 'ProfileSetting'
				)
		);
	?>
</div>

<br/><br/>

<div id="user_page_container">
	<?php
	for($i=0;$i<$ArticleDataCount;$i++)
	{
	?>	
		<!-- article image -->
		<img id="article_image" src="/CakePHP<?php echo $ArticleData[$i]['Article']['article_image_name']; ?>" />
		<br/>

		<!-- article topic -->
		<a href="/CakePHP/Article/ShowArticle/<?php echo $ArticleData[$i]['Article']['id']; ?>">
			<?php 	
				echo "Topic: ".$ArticleData[$i]['Article']['article_title']."<br/>";
			?>
		</a>

		<!-- Edit button -->
		<?php
			echo $this->Html->link(
					'EditArticle',
					array(
							'controller' => 'Article',
							'action' => 'EditArticle',$ArticleData[$i]['Article']['id']
					)
			);
		?>
		&nbsp;
		<!-- delete button -->
		<?php
			echo $this->Html->link(
					'Delete',
					array(
							'controller' => 'Article',
							'action' => 'Delete',$ArticleData[$i]['Article']['id']
					)
			);
		?>

		<br/><br/><br/>
		
	<?php 
	}//end for loop
	?>

</div><!-- end div user_page_container -->







