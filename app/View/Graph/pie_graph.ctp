<!-- this is show_graph view -->
<script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
	    }">
</script>

<?php
echo $this->Html->script('pie_graph_api');
echo $this->Html->script('jquery-1.9.1.min');
?>

 <!--Div that will hold the pie chart-->
 <div id="pie_chart_div"></div> 

