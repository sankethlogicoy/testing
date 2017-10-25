<?php

include('../session.php');

include('../logger.php');
include('../database.php');
 
$task = $_POST['num'];

switch ($task) {
    case "1":
	$date=date("Y/m/d");
          $sql="SELECT * FROM `task` WHERE Assigned_Date='$date'";
			
			$result = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($result);
			
			if($num_rows>0)
			{
				echo '<table class="table">';
					echo '<tr class="th_clr">';
						echo '<th>Task Name</th>';
						echo '<th>Task Description</th>';
						echo '<th>Assigned Date</th>';
						echo '<th>Due Date</th>';
						 
					echo '</tr>';
					
					     $i = 1;

					while($row = mysqli_fetch_array($result)) 
					{
						echo '<tr class="th_clr">';
						echo ' <input type="hidden" class="border" id="taskID' . $i . '" value=' . $row['TaskUID'] . ' readonly>';
							echo '<td> <a  data-toggle="modal"  onclick = "indi_task(taskID' . $i . '.value);">' .$row['Task_Name'].'</td>';
							
							echo '<td>'.$row['Task Description'].'</td>';
							echo '<td>'.$row['Assigned_Date'].'</td>';
							echo '<td>'.$row['Due_Date'].'</td>';
							 
						echo '</tr>';
						$i++;
					}
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
        break;
		 case "2":
 
          $sql="SELECT * FROM `task` WHERE Task_Status='Completed'";
			
			$result = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($result);
			
			if($num_rows>0)
			{
				echo '<table class="table">';
					echo '<tr class="th_clr">';
						echo '<th>Task Name</th>';
						echo '<th>Task Description</th>';
						echo '<th>Status</th>';
						 
					echo '</tr>';
					
					     $i = 1;

					while($row = mysqli_fetch_array($result)) 
					{
						echo '<tr class="th_clr">';
						echo ' <input type="hidden" class="border" id="taskID' . $i . '" value=' . $row['TaskUID'] . ' readonly>';
							echo '<td> <a  data-toggle="modal"  onclick = "indi_task(taskID' . $i . '.value);">' .$row['Task_Name'].'</td>';
							
							echo '<td>'.$row['Task Description'].'</td>';
							echo '<td>'.$row['Task_Status'].'</td>';
							 
						echo '</tr>';
						$i++;
					}
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
        break;
		}
		?>