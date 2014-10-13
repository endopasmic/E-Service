<!-- This is view -->
<h2>検索結果</h2>
<h3>Search Result is <?php echo $SearchResult; ?></h3>

<?php echo $this->Session->flash(); ?>

<?php
//loop for to find Anime name that match to keyword
for($i=0;$i<$AnimeCount;$i++)
{	
	//loop for to find Article data that match Anime id
	for($l=0;$l<$ArticleCount;$l++)
	{
		if($AnimeData[$i]['Anime']['anime_id']==$ArticleData[$l]['Article']['anime_id'])
		{
?>
			<!-- Article Image -->	
			<img id="article_image" src="/CakePHP/<?php echo $ArticleData[$l]['Article']['article_image_name'] ?>">
			<br/>
			
			<!-- Article Topic -->
			<a href="/CakePHP/Article/ShowArticle/<?php echo $ArticleData[$i]['Article']['id']; ?>">
				<?php 	
					echo "Topic: ".$ArticleData[$i]['Article']['article_title']."<br/>";
				?>
			</a>
			<br/>
			
			<!--Written By User  -->
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
<?php 
		}
	}
	
}

?>