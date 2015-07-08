// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(GetJson);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
var department_id;
var department_type = {
	type1: 0,
	type2: 0,
	type3: 0,
	type4: 0,
	type5: 0,
	type6: 0,
	type7: 0,
	type8: 0,
	type9: 0,
	type10: 0,
	type11: 0,
	type12: 0,
	type13: 0,
	type14: 0,
	type15: 0,
	type16: 0,
	type17: 0
	
};
var i;
var check;

function GetJson(){
	
$.getJSON("/E-service/Graph/ShowGraph.json", function(data){
	$.each(data.department_json,function(key,value){
		department_id = value.Log.department_id;
		
		for(i=1;i<18;i++)
		{

			if(department_id == i){
				department_type['type'+i]++;
			}
			
		}

		drawChart(department_type);
	});
});//end $.getJSON

}//end function

function drawChart(department_type) {
	

// Create the data table.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Toppingd');
data.addColumn('number', 'Slices');
data.addRows([
  ['Mushrooms', department_type['type1']],
  ['Onions', 1],
  ['Olives', 1],
  ['Zucchini', 1],
  ['Pepperoni', 2]
]);

// Set chart options
var options = {'title':'How Much Pizza I Ate Last Night',
	       'width':400,
	       'height':300};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
chart.draw(data, options);

}
