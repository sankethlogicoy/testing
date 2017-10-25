 
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Create Google Charts
        </title>
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
           google.charts.load('current', {'packages':['timeline']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Team');
      data.addColumn('date', 'Season Start Date');
      data.addColumn('date', 'Season End Date');
	  var dateObj = new Date();
var m = dateObj.getUTCMonth() + 1; //months from 1-12
var d = dateObj.getUTCDate();
var y = dateObj.getUTCFullYear();

 
	  
	  var year='2016';
	  var month='3';
	  var day='28';
	  
 <?php
$query = "select distinct first_name,emp_joining_date from register where flag=0 and emp_joining_date!='0000-00-00' ";

$exec = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($exec)) {
	$join_date  = $row['emp_joining_date'];
   $jn_date = explode("-", $join_date);
   
   ?>
   var name='<?php echo $row['first_name'];?>';
    var year='<?php echo $jn_date[0];?>';
	  var month='<?php echo $jn_date[1];?>';
	  var day='<?php echo $jn_date[2];?>';
      data.addRows([
	 

    //echo "['" . $row['first_name'] . "'," . $jn_date[0]. "],";

        [name,     new Date(year,month, day), new Date(y, m, d)],
		 
		
      ]);
 <?php
      }
?>  
      var options = {
        height: 450,
        timeline: {
          groupByRowLabel: true
        }
      };

      var chart = new google.visualization.Timeline(document.getElementById('columnchart'));

      chart.draw(data, options);
    }
        </script>
    </head>
    <body>

        <div id="columnchart"  class="chart"></div>
    </body>
</html>