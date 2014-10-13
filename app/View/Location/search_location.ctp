<!DOCTYPE html>

<title>Search Location</title>
    <?php echo $this->Html->script('SearchLocation', array('inline' => false)); ?>
    <?php echo $this->Html->css('search_location', null, array('inline' => false)); ?>

    <style>
      /*
      #target {
        width: 345px;
      }
      */
    </style>


  	<!-- show map and search box -->
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map-canvas"></div>

    <h2>Search Map position</h2>

   <form method="post" >
     
  <input type="hidden" name="latitude" value="0" />
  <input type="hidden" name="longitude" value="0" />
	<h3>Location Name</h3>
	<input type="text" name="location_name" />
	<h3>Memo</h3>
	<input type="text" name="memo" />
	
  <input type="submit" value="Save" />

  </form>
   	


































