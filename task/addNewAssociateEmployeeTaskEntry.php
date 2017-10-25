<?php
	//Include all user details or route to login page
	include('../session.php');
	include('../database.php');
	
	//Only managers and admins may set add employees to tasks
	if(strcasecmp($user_type,"Manager") && strcasecmp($user_type,"Admin"))
	{
		//Reject usage
		echo '[Restricted] Only Managers or Administrators may evaluate Task status';
		return;
	}
	
	//build a PHP variable from JSON sent using POST method
	$taskDetails = $_POST["json"];
		
	//Get the JSON
	$taskDetails = json_decode($taskDetails);
		
	//Insert data into associatedemployeetask table
	$sql='insert into associatedemployeetask (TaskUID,EmpUID) values ("'.$taskDetails->{'TaskUID'}.'","'.$taskDetails->{'EmpUID'}.'")';
	
	//Execute query
	$result = mysqli_query($con,$sql);
	
	//Return success or failure boolean value	
	echo $result;
	
	//Close database connection
	mysqli_close($con);
?>