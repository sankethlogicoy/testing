<html lang="en">
 
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  
 </style>
</head>
 
<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
 
                <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
 
                        <!-- Form Name -->
                        <legend>Form Name</legend>
 
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>
 
                    </fieldset>
                </form>
 
            </div>
            <?php
			$one="";
			$two="";
			$three="";
			$four="";

		 include('../database.php');	
    $Sql = "SELECT * FROM employeeinfo";
    $result = mysqli_query($con, $Sql);  
    if (mysqli_num_rows($result) > 0) {
		
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Registration Date</th>
						  <th>Salary Date</th>
                        </tr></thead><tbody>";
 
 
     while($row = mysqli_fetch_assoc($result)) {
        if($row['emp_id']!="EMP_ID")
		{
			 
         echo "<tr><td>" . $row['emp_id']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td>
                   <td>" . $row['email']."</td>
                   <td>" . $row['reg_date']."</td>
				   <td>" . $row['salary1']."</td>
				   </tr>";  
				   
     }
	}
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
            ?>
			<?php 
			 $Sql = "SELECT * FROM employeeinfo LIMIT 1";
			 $result = mysqli_query($con, $Sql);  
    if (mysqli_num_rows($result) > 0) {
		 while($row = mysqli_fetch_assoc($result)) {
        if($row['emp_id']!="EMP_ID")
		{
			$one=$row['salary1'];
			$two=$row['salary2'];
			$three=$row['salary3'];
			$four=$row['salary4'];
		}
		 }
	}
		 
			 
              if($one!="" && $two!="" && $three!="" && $four!="")
			  {
				  ?>
				  
				<center> <button type="button" class="btn btn-primary" aria-hidden="true" id="quarter-click1">Quarter 1</button> &nbsp; <button type="button" class="btn btn-primary" id="quarter-click2">Quarter 2</button> &nbsp;
				<button type="button" class="btn btn-primary" id="quarter-click3">Quarter 3</button> &nbsp; <button type="button" class="btn btn-primary aria-hidden="true" id="quarter-click4">Quarter 4</button>
				</center>
			 <?php }
			 else if($one!="" && $two!="" && $three!="")
			 {
				 ?>
				  
				<center>  <button type="button" class="btn btn-primary" aria-hidden="true" id="quarter-click1">Quarter 1</button> &nbsp; <button type="button" class="btn btn-primary" id="quarter-click2">Quarter 2</button> &nbsp;
				<button type="button" class="btn btn-primary" id="quarter-click3">Quarter 3</button> 
				</center>
			 <?php } 
			 else if($one!="" && $two!="")
			 {
				 ?>
				  
				<center> <button type="button" class="btn btn-primary" aria-hidden="true" id="quarter-click1">Quarter 1</button> &nbsp; <button type="button" class="btn btn-primary" id="quarter-click2">Quarter 2</button> &nbsp;
				
				</center>
			 <?php } 
			 
			 else if($one!="")
			 {
				?>
<center> <button type="button" class="btn btn-primary" aria-hidden="true" id="quarter-click1">Quarter 1</button>  	</center>			
			 <?php } ?>
			
			<!--<button type="button" class="btn btn-primary">Click To Generate Graph</button>-->
			 
        </div>
		 <div class="container" id="quarter1">

             
                            <h4 class="modal-title">Quarter One</h4>
                            <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['Username', 'Salary INR'],
                    ["", 0],
<?php
$query = "select firstname,emp_id,salary1 from employeeinfo WHERE quarter1='Q1' ";

$exec = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($exec)) {
	 if($row['emp_id']!="EMP_ID")
		{

    echo "['" . $row['firstname'] . "','" . $row['salary1'] . "'],";
}
}
?>

                ]);

                var options = {
                    title: 'Salary Balance'
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart1"));
                chart.draw(data, options);
            }
        </script>
 <div id="columnchart1" style="width:auto;height:500px;" ></div> 

                        </div>
                        
		
		<div class="container" id="quarter2">

             
                            <h4 class="modal-title">Quarter Two</h4>
                            <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['Username', 'Salary INR'],
                    ["", 0],
<?php
$query = "select firstname,emp_id,salary2 from employeeinfo WHERE quarter2='Q2'";

$exec = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($exec)) {
	 if($row['emp_id']!="EMP_ID")
		{

    echo "['" . $row['firstname'] . "','" . $row['salary2'] . "'],";
}
}
?>

                ]);

                var options = {
                    title: 'Salary Balance'
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart2"));
                chart.draw(data, options);
            }
        </script>
 <div id="columnchart2" style="width:auto;height:500px;"  ></div> 

                        </div>
                        
		
		<div class="container" id="quarter3">

             
                            <h4 class="modal-title">Quarter Three</h4>
                            <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['Username', 'Salary INR'],
                    ["", 0],
<?php
$query = "select firstname,emp_id,salary3 from employeeinfo WHERE quarter3='Q3'";

$exec = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($exec)) {
	 if($row['emp_id']!="EMP_ID")
		{

    echo "['" . $row['firstname'] . "','" . $row['salary3'] . "'],";
}
}
?>

                ]);

                var options = {
                    title: 'Salary Balance'
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart3"));
                chart.draw(data, options);
            }
        </script>
 <div id="columnchart3" style="width:auto;height:500px;"  ></div> 

                        </div>
                       
		
		<div class="container" id="quarter4">

            
                            <h4 class="modal-title">Quarter Four</h4>
                            <script type="text/javascript">
            google.load("visualization", "1", {packages: ["corechart"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['Username', 'Salary INR'],
                    ["", 0],
<?php
$query = "select firstname,emp_id,salary4 from employeeinfo WHERE quarter4='Q4'";

$exec = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($exec)) {
	 if($row['emp_id']!="EMP_ID")
		{

    echo "['" . $row['firstname'] . "','" . $row['salary4'] . "'],";
}
}
?>

                ]);

                var options = {
                    title: 'Salary Balance'
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart4"));
                chart.draw(data, options);
            }
        </script>
 <div id="columnchart4" style="width:auto;height:500px;"  ></div> 

                        </div>
                         
        </div>
     
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
	 $("#quarter2").hide();
	 $("#quarter3").hide();
	 $("#quarter4").hide();
    $("#quarter-click2").click(function(){
        $("#quarter1").hide();
		 $("#quarter3").hide();
		  $("#quarter4").hide();
	   $("#quarter2").show();
    });
	$("#quarter-click1").click(function(){
        $("#quarter2").hide();
		  $("#quarter3").hide();
		    $("#quarter4").hide();
	   $("#quarter1").show();
    });
	$("#quarter-click3").click(function(){
        $("#quarter2").hide();
		  $("#quarter1").hide();
		    $("#quarter4").hide();
	   $("#quarter3").show();
    });
	$("#quarter-click4").click(function(){
        $("#quarter2").hide();
		  $("#quarter1").hide();
		    $("#quarter3").hide();
	   $("#quarter4").show();
    });
    
});
</script>
</body>
 
</html>