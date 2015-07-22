<!-- this is view of line_graph.ctp -->
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

echo $this->Html->script('line_graph_api')
?>
 <div id="curve_chart" style="width: 900px; height: 500px"></div>
