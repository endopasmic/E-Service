<!-- this is view -->
<?php 
	echo $this->Html->script('AddRemoveField', array('inline' => false)); 
	echo $this->Html->css('new_article');
?>

<div id="new_article_container">

	<span id="topic">Create New Article</span>

	<div id="line"></div>

	<form enctype="multipart/form-data" method="post">

	<!--//////////////// new article field //////////////////////////-->
	<div id="new_article_title">
		<span id="input_text">New Title</span>
		<br/>
		<input type="text"  name="article_title" />
		<br/>
	</div>

	<div id="anime_title">
		Anime Title
		<br/>
		<input type="text" name="anime_title" />
		<br/>
	</div>

	<div id="summary">
		Summary Detail
		<br/>
		<input type="text" name="summary" />
		<br/>
	</div>

	<div id="new_article_image">
		Article Image
		<br/>
		<input type="file" name="ArticleImage" />
		<br/>
	</div>

	<br/><br/>

	<!--//////////////// new article content set field //////////////////////////-->

	<div id="location_name">
	Location Name
	<br/>
	<input type="text" name="location_name_0" />
	<br/>
	</div>

	<div id="new_article_detail">
	Location Detail
	<br/>
	<textarea rows="4" cols="50" name="article_detail_0"></textarea>
	<br/>
	</div>

	<div id="article_content_image">
	Upload Location image
	<?php echo $this->Form->input('files.', array(
			'type' => 'file', 'multiple',
			'name' => 'data[ArticleImage_0][]'
	)); ?>
	</div>

	<br/><br/>

	<div id="PasteImageField" class="1"></div>

	<div id="PasteField"></div>
	<div id="addfield_cover"><a href="#" id="AddField">Add New Location</a></div>
	<input type="hidden" name="set_feild_count" value="1">
	<br/><br/>

	<input type="submit" />

	</form>



</div><!-- end div new article container -->



















