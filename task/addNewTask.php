<?php
	//Include all user details or route to login page
	include('../session.php');
	include('../database.php');
	
	//Only managers and admins may set add tasks
	if(strcasecmp($user_type,"Manager") && strcasecmp($user_type,"Admin"))
	{
		//Reject usage
		echo '[Restricted] Only Managers or Administrators may evaluate Task status';
		return;
	}	
	
	// build a PHP variable from JSON sent using GET method
	$taskDetails = $_POST["json"];

	//Get the JSON
	$taskDetails = json_decode($taskDetails);
		
	$sql='insert into task (Task_Name, `Task Description`, Managers_Comments, Assigned_Date, Start_Date, Due_Date, Hours_Alloted, Associated_Manager, Lead_Employee, Task_Status) values ("'.$taskDetails->{"TaskName"}.'","'.$taskDetails->{"TaskDescription"}.'","'.$taskDetails->{"ManagersComment"}.'","'.
	$taskDetails->{"AssignedDate"}.'","'.$taskDetails->{"StartDate"}.'","'.$taskDetails->{"DueDate"}.'",'.$taskDetails->{"HoursAllotted"}.',"'.$taskDetails->{"AssociatedManager"}.'","'.$taskDetails->{"LeadEmployee"}.'","Assigned");';
		
	$result = mysqli_query($con,$sql);
	
	echo $result;
	mysqli_close($con);
?>