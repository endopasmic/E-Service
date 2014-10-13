<!-- This is view -->

<h2>Edit Article</h2>

<form enctype="multipart/form-data" method="post">

<br/><br/>
日記タイトル
<br/><br/>
<input type="text" name="article_title" value="<?php echo $ArticleData['Article']['article_title']; ?>" />
<br/><br/>

アニメタイトル
<br/><br/>
<input type="text" name="anime_title" value="<?php echo $AnimeData['Anime']['anime_title'] ?>" />
<br/><br/>

まとめ内容
<br/><br/>
<input type="text" name="summary" value="<?php echo $ArticleData['Article']['summary']; ?>" />
<br/><br/>

日記の画像
<br/>
<img id="article_image" src="/Cakephp/<?php echo $ArticleData['Article']['article_image_name']; ?>">

<br/><br/>
<input type="file" name="ArticleImage" />
<br/><br/>

<?php for($i=0;$i<$ArticleContentCount;$i++){ ?>

場所名前 
<br/><br/>
<input type="text" name="location_name_<?php echo $i; ?>" 
value="<?php echo $ArticleContentData[$i]['ArticleContent']['article_location_name'] ?>" />
<br/><br/>

日記内容
<br/><br/>
<textarea rows="4" cols="50" name="article_detail_<?php echo $i; ?>">
<?php echo $ArticleContentData[$i]['ArticleContent']['detail']; ?>
</textarea>
<br/><br/>

画像アップロード
<br/>
<?php
 
for($l=0;$l<$ArticleContentImageCount;$l++){

	if($ArticleContentData[$i]['ArticleContent']['id'] == $ArticleContentImageData[$l]['ArticleContentImage']['article_content_id'])
	{

?>
	<br/>
	<img id="article_image" src="/CakePHP/<?php echo $ArticleContentImageData[$l]['ArticleContentImage']['image_name']; ?>" >

<?php
echo $this->Form->input('files.', array(
		'type' => 'file', 'multiple',
		'name' => 'data[ArticleImage_'.$i.'][]'
));
	 }//end if
 
 }//end for
 
 ?>
 
<br/>

<?php }//end for loop ?>
<input type="submit">

</form>