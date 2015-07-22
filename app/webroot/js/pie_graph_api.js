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
var department_name = {
	name1: "",
	name2: "",
	name3: "",
	name4: "",
	name5: "",
	name6: "",
	name7: "",
	name8: "",
	name9: "",
	name10: "",
	name11: "",
	name12: "",
	name13: "",
	name14: "",
	name15: "",
	name16: "",
	name17: ""
};
var i;
var j = 1;
var check = [];

function GetJson(){
	
$.getJSON("/E-service/Graph/PieGraph.json", function(data){

	$.each(data.department_data,function(key,value){
		department_id = value.Log.department_id;
		
		for(i=1;i<18;i++)
		{
			if(department_id == i){
				department_type['type'+i]++;				
			}
			
		}

	});

	$.each(data.department_name,function(key,value){
		
		department_name['name'+j] = value.Department.department_name;
		j++
			
	});


	drawChart(department_type,department_name);

});//end $.getJSON


//department_name['name'+i] = value.Department.department_name;


}//end function

function drawChart(department_type,department_name) {
	

// Create the data table.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Toppingd');
data.addColumn('number', 'Slices');
data.addRows([
  [department_name['name1'], department_type['type1']],
  [department_name['name2'], department_type['type2']],
  [department_name['name3'], department_type['type3']],
  [department_name['name4'], department_type['type4']],
  [department_name['name5'], department_type['type5']],
  [department_name['name6'], department_type['type6']],
  [department_name['name7'], department_type['type7']],
  [department_name['name8'], department_type['type8']],
  [department_name['name9'], department_type['type9']],
  [department_name['name10'], department_type['type10']],
  [department_name['name11'], department_type['type11']],
  [department_name['name12'], department_type['type12']],
  [department_name['name13'], department_type['type13']],
  [department_name['name14'], department_type['type14']],
  [department_name['name15'], department_type['type15']],
  [department_name['name16'], department_type['type16']],
  [department_name['name17'], department_type['type17']],
  
]);

// Set chart options
var options = {'title':'Department of E-service',
	       'width':400,
	       'height':300};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
chart.draw(data, options);

}
