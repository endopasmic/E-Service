<!-- this is view -->
<?php
echo $this->Html->css('show_article');
?>
<div id="show_article_ccontainer">

<!-- Show data from Article model -->
Article Title: <?php echo $ArticleData['Article']['article_title']; ?>
<br/>
Anime Title:<?php echo $AnimeData['Anime']['anime_title']; ?>
<br/>

Summary:<?php echo $ArticleData['Article']['summary']; ?>
<br/>

<!-- Show set data from ArticleContent model  -->

<br/><br/>
 
 <!-- show map -->
<div id="map-canvas"></div>

<script type="text/javascript">
	init(<?php echo $ArticleId ?>,<?php echo $ArticleLocationCount ?>);
</script>
<script type="text/javascript">
CallComment(<?php echo $ArticleId; ?>);
</script>


<br/>
<?php
for($i=0;$i<$ArticleContentCount;$i++)
{
?>
	<br/>
	<h4>Location</h4>
	<?php 
		echo $ArticleContentData[$i]['ArticleContent']['article_location_name']."<br/>";
	?>
	
	<?php
		echo $ArticleContentData[$i]['ArticleContent']['detail']."<br/>";
	?>

<?php }//end loop ?>
<br/>
 
 <!-- Comment zone  -->
 <?php
if($UserId!="")
{	 
?>	 
<h3>Comment</h3>
<div id="get_comment"></div>

      <form id="data" method="post" >
        <textarea id='textarea'  name="comment"></textarea>
        <input type="hidden" name="article_id" value="<?php echo $ArticleId; ?>">
        <br/>    
        <button onclick="CallComment(<?php echo $ArticleId; ?>)">Submit</button>
      </form>

<?php
}//end if 
?>
 

 <script>	
 $("form#data").submit(function(){
 		var formData = new FormData ($(this)[0]);

 		$.ajax({
 			url: "/CakePHP/Article/Comment",
 			type: "POST",
 			data: formData,
 			async: false,
 			success: function(data){
 	            if($('#textarea').val()=="" )
 	            {
 	              alert('Please input text or image');
 	              return;
 	            }
 	           $('form#data').each(function(){
                   this.reset();
               });
 			},
 			cache: false,
 			contentType: false,
 			processData: false
 		});
       
 		return false;

 	});
 
 </script>
 
<?php 
echo $this->Html->script('Comment', array('inline' => false));
 ?>
 <!-- Geolocation set current location script -->
<?php 
echo $this->Html->script('ResultLocation', array('inline' => false));
 ?>
 
</div>
 