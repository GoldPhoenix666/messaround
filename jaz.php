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
			padding:5px;
		}

		table, th, td {
   			border: 1px solid black;
    		border-collapse: collapse;
    		text-align:center;
    	}

	</style>


	<script type="text/javascript" >
      	google.charts.load('current', {'packages':['corechart']});
      	google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {



     	var data = new google.visualization.DataTable();

      	data.addColumn('string', 'time');
      	data.addColumn('number', 'hours');

        data.addRow(["Eating  1 hours 0.31%", 1]);data.addRow(["Sleeping  7 hours 2.20%", 7]);data.addRow(["Waiting  1 hours 0.31%", 1]);data.addRow(["Working  12 hours 3.77%", 12]);data.addRow(["Youtube  2 hours 0.63%", 2]);data.addRow(["newtest  2 hours 0.63%", 2]);data.addRow(["werwer  4 hours 1.26%", 4]);data.addRow(["rtyt  66 hours 20.75%", 66]);data.addRow(["newtest  40 hours 12.58%", 40]);data.addRow(["eroo  99 hours 31.13%", 99]);data.addRow(["new  7 hours 2.20%", 7]);data.addRow(["test  67 hours 21.07%", 67]);data.addRow(["ebfnwkfbjkwe  7 hours 2.20%", 7]);data.addRow(["nfjisuhfdo  3 hours 0.94%", 3]);
      	var options = {
        title: 'List of all Infomation',
        sliceVisibilityThreshold: 0
     	 };

      	var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      	chart.draw(data, options);
      	// Changing legend  
	};
	</script>


	<script type="text/javascript">
  
	  	google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var data = new google.visualization.DataTable();
        data.addColumn('string', 'name');
        data.addColumn('number', 'Quantity');
      	data.addColumn({type: 'string', role: 'annotation'});
    
       	var info = [
      		{
        qn: 0
      		}
    	];

    	var data = new google.visualization.arrayToDataTable([
      	['', 'Total: '],
      	[info[0]["name"] , info[0]["qn"]],  
    		]);



    data.addRow(["Eating  ", 1]);
    data.addRow(["Sleeping  ", 7]);
    data.addRow(["Waiting  ", 1]);
    data.addRow(["Working  ", 12]);
    data.addRow(["Youtube  ", 2]);
    data.addRow(["newtest  ", 2]);
    data.addRow(["werwer  ", 4]);
    data.addRow(["rtyt  ", 66]);
    data.addRow(["newtest  ", 40]);
    data.addRow(["eroo  ", 99]);
    data.addRow(["new  ", 7]);
    data.addRow(["test  ", 67]);
    data.addRow(["ebfnwkfbjkwe  ", 7]);
    data.addRow(["nfjisuhfdo  ", 3]);  

      	var options = {
        vAxis:{direction: -1},
        title: 'Activities in hours',
        chartArea: {width: '70%',},
        hAxis: {
        chartArea: {height: '70%',},
        title: 'Hours',
        minValue: 0
        },

        vAxis: {
        title: 'Activity',
        direction:'1'
        },

        annotation:{
        1:{

        style:'line'

          }         
        }
      	};
      	var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
      	chart.draw(data, options);
    };
	</script>


	<script type="text/javascript">
  
	  	google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawVisualization);

		function drawVisualization() {

     	var data = new google.visualization.DataTable();
        data.addColumn('string', 'name');
        data.addColumn('number', 'Quantity');
      	data.addColumn({type: 'string', role: 'annotation'});
    
       	var info = [
      		{
        qn: 0
      		}
    	];

    	var data = new google.visualization.arrayToDataTable([
      	['', 'Total: '],
      	[info[0]["name"] , info[0]["qn"]], 
    		]);



	data.addRow(["John  ", 7]);
	
	data.addRow(["Jill  ", 2]);
	
	data.addRow(["Django  ", 2]);
	
	data.addRow(["newtest  ", 2]);
	
	data.addRow(["Jack  ", 1]);
	
	data.addRow(["sdfsdf  ", 0]);
	
	data.addRow(["empty  ", 0]);
	  

      	var options = {
        vAxis:{direction: -1},
        title: 'Peoples activities',
        chartArea: {width: '70%',},
        hAxis: {
        chartArea: {height: '70%',},
        title: '# of Activities',
        minValue: 0
        },

        vAxis: {
        title: 'Name',
        direction:'1'
        },

        annotation:{
        1:{

        style:'line'

          }         
        }
      	};
      	var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
      	chart.draw(data, options);
    };
	</script>

</head>


<body>


<!--This is to display the message after a query has been processed, also it says that if the variable is empty do not echo. By merging all of the variables into one and echoing it, it only display which one has data and does not display error messages saying the variable is empty-->

<div class='row-fluid'>

	<div class='span4' style="border:0px purple solid;" >

		<div id="chart_div2" style="height:500px;"></div>

	</div>


	<div class='span4' style="border:0px black solid;" >

		<div id="chart_div3" style="height:500px;"></div>
		
	</div>


	<div class='span4' style="border:0px grey solid;" >
				
		<div id="chart_div" style="height:500px;"></div>

	</div>

</div>



	<h2>This is the information from the server</h2>


<div class='row-fluid'>
	<div class='span4' style="border:0px blue solid;" >
		<table class='table-hover align-self-start '>
			<tr>
				<th>Name</th>
				<th>Hours</th>
				<th>Minutes</th>
				<th>Activity</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>

<tr>
		<td>Django</td>
		<td>99</td>
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
</tr>
<tr>
		<td>Django</td>
		<td>66</td>
		<td>56</td>
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
</tr>
<tr>
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
</tr>
<tr>
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
</tr>
<tr>
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
</tr>
<tr>
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
</tr>
<tr>
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
</tr>
<tr>
		<td>John</td>
		<td>40</td>
		<td>43</td>
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
</tr>
<tr>
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
</tr>
<tr>
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
</tr>
<tr>
		<td>John</td>
		<td>4</td>
		<td>6</td>
		<td>werwer</td>
		<td>
			<form action="delete.php" method="post">
				<input type="hidden" name="dataid" value="118" />
				<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
			</form>
		</td>
		<td>
			<form action="update.php" method="post">
				<input type="hidden" name="dataid" value="118" />
				<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
			</form>
		</td>
</tr>
<tr>
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
</tr>
<tr>
		<td>newtest</td>
		<td>7</td>
		<td>59</td>
		<td>ebfnwkfbjkwe</td>
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
</tr>
<tr>
		<td>newtest</td>
		<td>67</td>
		<td>9</td>
		<td>test</td>
		<td>
			<form action="delete.php" method="post">
				<input type="hidden" name="dataid" value="156" />
				<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
			</form>
		</td>
		<td>
			<form action="update.php" method="post">
				<input type="hidden" name="dataid" value="156" />
				<input type="submit"  style="margin-top:20px;" class="btn btn-default" value="Update" name="update" />
			</form>
		</td>
</tr>
</table>
</div>
	


<div class='span4' style="border:0px orange solid;" >
<table class='table-hover'>
<tr>
<th>Name</th>
<th>Total Hours</th>
<th>Total Minutes</th>
<th># of Activities</th>
<th>Delete</th>
</tr>

<tr>
		<td>John</td>
		<td>58</td>
		<td>146</td>
		<td>7</td>
		<td>
			<form action="delete2.php" method="post">
				<input type="hidden" name="personid" value="1" />
				<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
			</form>
		</td>
</tr>
<tr>
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
</tr>
<tr>
		<td>Django</td>
		<td>165</td>
		<td>61</td>
		<td>2</td>
		<td>
			<form action="delete2.php" method="post">
				<input type="hidden" name="personid" value="4" />
				<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
			</form>
		</td>
</tr>
<tr>
		<td>newtest</td>
		<td>74</td>
		<td>68</td>
		<td>2</td>
		<td>
			<form action="delete2.php" method="post">
				<input type="hidden" name="personid" value="36" />
				<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
			</form>
		</td>
</tr>
<tr>
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
</tr>
<tr>
		<td>sdfsdf</td>
		<td>0</td>
		<td>0</td>
		<td>0</td>
		<td>
			<form action="delete2.php" method="post">
				<input type="hidden" name="personid" value="38" />
				<input type="submit" style="margin-top:20px;" class="btn btn-default" value="Delete" name="delete" />
			</form>
		</td>
</tr>
<tr>
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
</tr>
</table>
</div>


<div class='span4' style="border:0px green solid;" >
<table class='table-hover'>
<tr>
<th>Activity</th>
<th>Occurrence</th>
</tr>

<tr>
		<td>newtest</td>
		<td>2</td>
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
		<td>test</td>
		<td>1</td>
</tr>

<tr>
		<td>eroo</td>
		<td>1</td>
</tr>

<tr>
		<td>werwer</td>
		<td>1</td>
</tr>

<tr>
		<td>Youtube</td>
		<td>1</td>
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
		<td>ebfnwkfbjkwe</td>
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
		<td>Working</td>
		<td>1</td>
</tr>

</table>
</div>
</div>

<br />

<div class='row-fluid'>
<div class="span6" style="border: 0px red solid;" >

	<h3>Enter Information here to add Information</h3>

	<form action="newentry.php" method="post" >

		<label for="Activity">Enter your activity:</label>

			<input type="text" name="activity" placeholder="Activities" value="">

		<label for="Hours">Hours of said activity:</label>

			<input type="number" name="hours" placeholder="Hours" value="">


		<label for="Minutes">Minutes of said activity:</label>

			<input type="number" name="minutes" min="0" max="59" placeholder="Minutes" value="">



		<label for="personname">Pick your name:</label>

			<select name="personid">

				<option value='1'>John</option><option value='2'>Jack</option><option value='3'>Jill</option><option value='4'>Django</option><option value='36'>newtest</option><option value='37'>empty</option><option value='38'>sdfsdf</option>
 			</select>

		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>

		<br />
		<br />
		<br />
		<br />
		<br /> 

	</form>

</div>

<div class="span6" style="border: 0px red solid; ">
	<h3>Use this form to add a new name</h3>

	<form action="addname.php" method="post">
		
		<label for="Newname" >Add a new user:</label>

			<input type="text" name="personname" placeholder="Name" value="" />

 		<button type="submit" style="margin-top:-10px;" class="btn btn-success btn-small">Add</button>

		<br />

	</form>

</div>
</div>

</body>

</html>