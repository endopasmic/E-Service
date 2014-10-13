<!-- This is view -->
<!-- 
<div id="menu_button_container">

<div class='button dark center'>Sign Up</div>
<div class='button dark center'>Register</div>

</div>
-->

<div id="Fader" class="fader">

	<img class="slide" src="/CakePHP/app/webroot/files/seichichan/1.jpg" width="100%" />

    <img class="slide" src="/CakePHP/app/webroot/files/seichichan/2.jpg" width="100%" />
	
	<img class="slide" src="/CakePHP/app/webroot/files/seichichan/3.jpg" width="100%" />

	<div class="fader_controls">
      <div class="page prev" data-target="prev">&lsaquo;</div>
      <div class="page next" data-target="next">&rsaquo;</div>
      <ul class="pager_list"></ul>
    </div>
</div>  


<br/>
<div id="container">

<!-- 
<div id="concept">

	<div id="topic">
	Web Concept
	</div>
	<div id="detail">
		Have you ever copied some text from a web page or a document and then
	wanted to paste it as simple text into another application without getting
	all the formatting from the original source? PureText makes this simple
	by adding a new Windows hot-key (default is WINDOWS+V) 
	</div>

	
</div>
-->
<?php
echo $this->Html->css('slide_show');
echo $this->Html->css('home');
echo $this->Html->css('search_field');
echo $this->Html->script('slide_show');
?>
<div id="search">
	<!-- 検索  -->
	<br/>
	<?php
	echo $this->Form->create('Article',array(
		'type' => 'post',
		'url' => array('controller' => 'Article','action' => 'Search'),
	));
	?>

	  <input class="search_bar" 
	         name="data[Article][search]" 
	         type="search" 
	        >

	<?php	
	/*
	echo $this->Form->input('search',array(
		'id' => 'search_field',
		'label' => false,
		'type' => 'text'
	));
	*/
		
	echo $this->Form->input('Search',array('type' => 'submit','label' => false,'id' => 'search_button'));
	echo $this->Form->end();
	?>
</div>

<!-- Show Article -->

<div id="topic">Article List</div>
<div id="article_container">
<?php
for($i=0;$i<$ArticleCount;$i++)
{
?>
<div id="article_content">
	<!-- article image -->
	<div id="article_image_content">
	<img id="article_image" src="/CakePHP<?php echo $ArticleData[$i]['Article']['article_image_name']; ?>" />
	<br/>
	</div>
	
	<!-- article topic -->
	<div id="article_topic">
	<a href="/CakePHP/Article/ShowArticle/<?php echo $ArticleData[$i]['Article']['id']; ?>">
		<?php 	
			echo "Topic: ".$ArticleData[$i]['Article']['article_title']."<br/>";
		?>
	</a>
	</div>
	
	<!-- writen by User -->
	<div id="article_writer">
	<?php 	
		echo "Writen By:";
		for($l=0;$l<$UserCount;$l++)
		{	
			if($ArticleData[$i]['Article']['user_id']==$UserData[$l]['User']['user_id'])
			{	
				echo $UserData[$l]['User']['pen_name'];
			}	
		}
		echo "<br/><br/>";
	?>
	</div>
	
	<div id="article_border"></div>	
	
</div><!-- end div article content -->	
<?php 	
}//end for 
?>
</div><!--end div article containter  -->
	
</div><!-- end div container -->










