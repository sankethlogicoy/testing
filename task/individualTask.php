 <?php
include('../session.php');
include('../database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task Management</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="../css/global/mainstyles.css">
<script src="../js/meeting.js"></script>
	<script src="../js/global/mainscript.js"></script>
	<link rel="icon" type="image/x-icon" href="../images/Artifact.ico">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		
		.th_clr{
			 color: #906060;
    border: none !important;
    font-size: 1.3em;
		}
		.th_clr1{
			color:grey !important;
		}
		.btn_style{
			   background-color: #456945;
    color: white;
    font-size: 1.2em;
    padding: 0.5% 2% 0.5% 2%;
    width: auto !important;
		}
		.select_box{
			color: black;
    padding: 8px;
    border: 3px solid #6b2c2c;
    font-size: 1.2em;
		}
	</style>
</head>
<body>

<div class="container">
<div class="container_style">

<div id="updateTask"></div>
<div id="updateEmp"></div>
<div id="deleteEmp"></div>
                      
<?php


		
			$id = $_GET['approval'];
            



			$sql="select *,workledger.EmpUID,workledger.Hours_spent from task inner join workledger ON task.TaskUID=workledger.TaskUID and task.TaskUID='$id'";
			
			
			$result = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($result);
			?>
			<?php
			if($num_rows>0)
			{
			$row = mysqli_fetch_array($result);
				echo '<table class="table">';
				   echo ' <input type="hidden" class="border" id="TaskUID" value='.$row['TaskUID'].' readonly>';  
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Task Name:</h3>';
						echo '<p class="th_clr">'.$row['Task_Name'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Task Description:</h3>';
						echo '<p class="th_clr">'.$row['Task Description'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Assigned Date:</h3>';
						echo '<p class="th_clr">'.$row['Assigned_Date'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Due Date:</h3>';
						echo '<p class="th_clr">'.$row['Due_Date'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Hours Alloted:</h3>';
						echo '<p class="th_clr">'.$row['Hours_Alloted'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Point of Contact:</h3>';
						echo '<p class="th_clr">'.$row['Lead_Employee'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';	
						echo '<h3 class="th_clr1">Task Status:</h3>';
						echo '<p class="th_clr">'.$row['Task_Status'].'</p>';
					echo '</tr>';
					echo '<tr class="th_clr">';	
						echo '<h3 class="th_clr1">Hours spent:</h3>';

							echo '<p class="th_clr">'.$row['Hours_spent'].'</tp>';
					echo '</tr>';
					echo '<tr class="th_clr">';
					echo '<h3 class="th_clr1">update Task Status</h3>';
											echo '<p class="th_clr">';
											echo '<select id="select_id" class="select_box">';
												echo '<option>Started</option>';
												echo '<option>In progress</option>';
												echo '<option>Paused</option>';
												echo '<option>Submitted</option>';
											
												
											echo '</select>';
										echo '</p>';
										
								  echo "<input type='button' class='btn_style' onclick = 'setupdate(TaskUID.value,select_id.value);'  value='Update'>";
								
					echo '</tr>';
					echo '<tr class="th_clr">';
					echo '<h3 class="th_clr1">Add associated employee</h3>';
					echo '<p class="th_clr"><input type="text" style="color:black;" id="add_associated_emp" /></p>';
					echo "<input type='button' class='btn_style' onclick = 'add_emp_update(TaskUID.value,add_associated_emp.value);'  value='Update'>";
					echo '</tr>';
					//delete employee
					echo '<tr class="th_clr">';
					echo '<h3 class="th_clr1">Delete employee</h3>';
								$sql3 = mysqli_query($con, "select distinct EmpUID from associatedemployeetask");
       $data = "";
	   echo '<select id="select_id1" class="select_box">';
      
       while ($row = $sql3->fetch_assoc()) {

           $data = $row['EmpUID'];


           echo '<option>' . $data . '</option>';
       }
			echo '</select>';
			echo '<br />';
			echo '<br />';
			
      echo "<input type='button' class='btn_style' onclick = 'delete_emp(select_id1.value);'  value='Delete'>";			
					echo '</tr>';
					
					//end delete employee
					
					
					
					
					echo '<tr class="th_clr">';
						echo '<h3 class="th_clr1">Associated Employee:</h3>';
						$sql2="select emp_id ,first_name,last_name from register where register.emp_id in (select associatedemployeetask.EmpUID from associatedemployeetask where associatedemployeetask.TaskUID='$id')";
							$result = mysqli_query($con,$sql2);
								$num_rows = mysqli_num_rows($result);
								if($num_rows>0)
			        {
						   while($row = mysqli_fetch_array($result)) 
					{
					echo '<p  class="th_clr">'.$row['first_name'].'</p>';
					}
					}
					echo '</tr>';
					
            
			
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
			
		?>
</div>
</div>
</body>
</html>

