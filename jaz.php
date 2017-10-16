<!DOCTYPE html>

<html>

<head>
  	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<style type="text/css">

		body{
			padding: 5px;
		}


	</style>

	<script type="text/javascript" >
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {

		var piedata = new google.visualization.DataTable();

		piedata.addColumn('string', 'time');
		piedata.addColumn('number', 'hours');

piedata.addRow(["Eating  1 hours 1.39%", 1]);piedata.addRow(["Sleeping  7 hours 9.72%", 7]);piedata.addRow(["Waiting  1 hours 1.39%", 1]);piedata.addRow(["Working  12 hours 16.67%", 12]);piedata.addRow(["Youtube  2 hours 2.78%", 2]);piedata.addRow(["newtest  2 hours 2.78%", 2]);piedata.addRow(["rtyt  9 hours 12.50%", 9]);piedata.addRow(["newtest  7 hours 9.72%", 7]);piedata.addRow(["eroo  14 hours 19.44%", 14]);piedata.addRow(["new  7 hours 9.72%", 7]);piedata.addRow(["calmdownthere  7 hours 9.72%", 7]);piedata.addRow(["nfjisuhfdo  3 hours 4.17%", 3]);
		var options = {title: 'List of all Infomation', sliceVisibilityThreshold: 0};

		var chart = new google.visualization.PieChart(document.getElementById('piedatadiv'));
		chart.draw(piedata, options);};
	</script>

	<script type="text/javascript">
  
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var activechartdata = new google.visualization.DataTable();
        activechartdata.addColumn('string', 'name');
        activechartdata.addColumn('number', 'Quantity');

activechartdata.addRow(["Eating  ", 1]);activechartdata.addRow(["Sleeping  ", 7]);activechartdata.addRow(["Waiting  ", 1]);activechartdata.addRow(["Working  ", 12]);activechartdata.addRow(["Youtube  ", 2]);activechartdata.addRow(["newtest  ", 2]);activechartdata.addRow(["rtyt  ", 9]);activechartdata.addRow(["newtest  ", 7]);activechartdata.addRow(["eroo  ", 14]);activechartdata.addRow(["new  ", 7]);activechartdata.addRow(["calmdownthere  ", 7]);activechartdata.addRow(["nfjisuhfdo  ", 3]);  

		activechartdata.sort({column: 1, desc: false});
		
      	var options = {title: 'Activities in hours', chartArea: {width: '60%'},
      	hAxis: {
      	title: 'Hours', minValue: 0},
        vAxis: {title: 'Activity', direction:'1'},
        annotation:{1:{style:'line'}}};
      	var chart = new google.visualization.BarChart(document.getElementById('activitydiv'));
      	chart.draw(activechartdata, options);
		};
	</script>

	<script type="text/javascript">
  
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var namechartdata = new google.visualization.DataTable();
        namechartdata.addColumn('string', 'name');
        namechartdata.addColumn('number', 'Quantity');
    

namechartdata.addRow(["John  ", 6]);
namechartdata.addRow(["Jill  ", 2]);
namechartdata.addRow(["Django  ", 2]);
namechartdata.addRow(["Jack  ", 1]);
namechartdata.addRow(["newtest  ", 1]);
namechartdata.addRow(["sdfsdfsdf  ", 0]);
namechartdata.addRow(["empty  ", 0]);  

      	var options = {title: 'Peoples activities', chartArea: {width: '60%'},
      	hAxis: {
		title: '# of Activities', minValue: 0},
        vAxis: {title: 'Name', direction:'-1'},
        annotation:{1:{style:'line'}}};
      	var chart = new google.visualization.BarChart(document.getElementById('peoplediv'));
      	chart.draw(namechartdata, options);
		};
	</script>

	<script type="text/javascript">
		function empty() {
    var x;
    x = document.getElementById("input-check").value;
    if (x == "") {
        alert("Please fill in all entries");
        return false;
    };
}
	</script>

</head>

<body>
<h2 style="text-align:center; text-decoration:underline;" >This is the information from the server</h2>
<div class="row">
	<div class="span4" style="border:0px purple solid;" >
		<div id="activitydiv" style="height:500px;"></div>
	</div>
	<div class="span4" style="border:0px black solid;" >
		<div id="peoplediv" style="height:500px;"></div>		
	</div>
	<div class="span4" style="border:0px grey solid;" >				
		<div id="piedatadiv" style="height:500px;"></div>
	</div>
</div>

<div class="row">	
	<div class="span4">
		<table class="table table-bordered table-hover" style="float: none; margin: 0 auto;">
			<tr>
				<th>Name</th><th>Hours</th><th>Minutes</th><th>Activity</th><th>Delete</th><th>Edit</th>
			</tr><tr>
	<td>Django</td>
	<td>14</td>
	<td>5</td>
	<td>eroo</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="140" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="140" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>Django</td>
	<td>9</td>
	<td>52</td>
	<td>rtyt</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="119" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="119" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>Jack</td>
	<td>12</td>
	<td>31</td>
	<td>Working</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="4" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="4" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>Jill</td>
	<td>2</td>
	<td>36</td>
	<td>newtest</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="83" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="83" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>Jill</td>
	<td>7</td>
	<td>30</td>
	<td>Sleeping</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="2" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="2" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>John</td>
	<td>1</td>
	<td>20</td>
	<td>Eating</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="1" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="1" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>John</td>
	<td>7</td>
	<td>20</td>
	<td>new</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="143" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="143" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>John</td>
	<td>7</td>
	<td>7</td>
	<td>newtest</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="138" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="138" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>John</td>
	<td>3</td>
	<td>30</td>
	<td>nfjisuhfdo</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="158" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="158" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>John</td>
	<td>1</td>
	<td>15</td>
	<td>Waiting</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="3" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="3" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>John</td>
	<td>2</td>
	<td>12</td>
	<td>Youtube</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="5" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="5" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr><tr>
	<td>newtest</td>
	<td>7</td>
	<td>59</td>
	<td>calmdownthere</td>
	<td>
		<form action="delete.php" method="post">
			<input type="hidden" name="dataid" value="157" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
	<td>
		<form action="update.php" method="post">
			<input type="hidden" name="dataid" value="157" />
			<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
		</form>
	</td>
</tr></table>	
	</div>
	<div class="span4">
		<table class="table table-bordered table-hover" style="float: none; margin: 0 auto;">
		<tr>
			<th>Name</th><th>Total Hours</th><th>Total Minutes</th><th># of Activities</th><th>Delete</th>
		</tr><tr>
	<td>John</td>
	<td>21</td>
	<td>104</td>
	<td>6</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="1" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr><tr>
	<td>Jill</td>
	<td>9</td>
	<td>66</td>
	<td>2</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="3" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr><tr>
	<td>Django</td>
	<td>23</td>
	<td>57</td>
	<td>2</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="4" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr><tr>
	<td>Jack</td>
	<td>12</td>
	<td>31</td>
	<td>1</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="2" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr><tr>
	<td>newtest</td>
	<td>7</td>
	<td>59</td>
	<td>1</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="36" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr><tr>
	<td>sdfsdfsdf</td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="41" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr><tr>
	<td>empty</td>
	<td>0</td>
	<td>0</td>
	<td>0</td>
	<td>
		<form action="delete2.php" method="post">
			<input type="hidden" name="personid" value="37" />
			<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
		</form>
	</td>
</tr></table>	</div>
	<div class="span4">
		<table class="table table-bordered table-hover" style="float: none; margin: 0 auto;" >
		<tr>
			<th>Activity</th>
			<th>Occurrence</th>
		</tr>
<tr>
	<td>newtest</td>
	<td>2</td>
</tr>
<tr>
	<td>Waiting</td>
	<td>1</td>
</tr>
<tr>
	<td>Eating</td>
	<td>1</td>
</tr>
<tr>
	<td>calmdownthere</td>
	<td>1</td>
</tr>
<tr>
	<td>eroo</td>
	<td>1</td>
</tr>
<tr>
	<td>Working</td>
	<td>1</td>
</tr>
<tr>
	<td>Sleeping</td>
	<td>1</td>
</tr>
<tr>
	<td>nfjisuhfdo</td>
	<td>1</td>
</tr>
<tr>
	<td>new</td>
	<td>1</td>
</tr>
<tr>
	<td>rtyt</td>
	<td>1</td>
</tr>
<tr>
	<td>Youtube</td>
	<td>1</td>
</tr></table>	</div>
</div>

<br />

<div class="row">
<div class="span6" style="border: 0px red solid; text-align: center;">
	<h3>Add Information here</h3>
	<form action="newentry.php" method="post" style="float: none; margin: 0 auto;" >
		<label>Activity:</label>
			<input type="text" name="activity" value="" id="input-check" >
		<label>Hours:</label>
			<input type="number" name="hours" value="">
		<label>Minutes:</label>
			<input type="number" name="minutes" min="0" max="59" value="">
		<label>Name:</label>
			<select name="personid">

				<option value='1'>John</option><option value='2'>Jack</option><option value='3'>Jill</option><option value='4'>Django</option><option value='36'>newtest</option><option value='37'>empty</option><option value='41'>sdfsdfsdf</option>
 			</select>
			<br />
		<button type="submit" style="margin-top:-10px;" onClick="return empty()" class="btn btn-success btn-small">Add</button>
	</form>
</div>

<div class="span6" style="border: 0px red solid;">
	<form action="addname.php" method="post" style="float: none; margin: 0 auto; text-align: center;">
		<h3>Add User</h3>		
		<label>Username:</label>
			<input type="text" name="personname" value="" />
			<br />
 		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>
		<br />
	</form>
</div>
</div>
</body>

</html>