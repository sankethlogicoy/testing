<?php
	//Include all user details or route to login page
	include('../session.php');
	include('../database.php');
	
	// build a PHP variable from JSON sent using POST method
	$taskDetails = $_POST["json"];
		
	//Get the JSON
	$taskDetails = json_decode($taskDetails);
		
	//Date of activity
	$date = DateTime::createFromFormat('Y-m-d',$taskDetails->{"Date"});
	
	//Task submit time (Pause or submit)
	$submitTime= DateTime::createFromFormat('Y-m-d H:i:s', $taskDetails->{"Submit_time"});
	
	//Task start time
	$startTime= DateTime::createFromFormat('Y-m-d H:i:s', $taskDetails->{"Start_time"});
	
	//Check if start time is later than submit time
	if($submitTime->format('Y-m-d H:i:s') < $startTime->format('Y-m-d H:i:s'))
	{
		echo 'Start time cannot be later than submit time Aborting.';
		echo $startTime->format('Y-m-d H:i:s').' '.$submitTime->format('Y-m-d H:i:s');
		return;
	}
	
	//Check if the entries being made are for the same day, tasks which span over a day are most likely due to employee negligence
	if($date->format('Y-m-d') != $submitTime->format('Y-m-d') || $date->format('Y-m-d') != $startTime->format('Y-m-d'))
	{
		echo 'Only entries made on the same day are allowed. Aborting.';
		echo $date->format('Y-m-d').' '.$startTime->format('Y-m-d').' '.$submitTime->format('Y-m-d');
		return;
	}
	
	//If the date of filing is after the start or submit date then it is incorrect
	if($date->format('Y-m-d') < $startTime->format('Y-m-d') || $date->format('Y-m-d') < $submitTime->format('Y-m-d'))
	{
		echo 'Incorrect dates entered. The date of entry cannot be after the start or submit time. Aborting.';
		echo $date->format('Y-m-d').' '.$startTime->format('Y-m-d').' '.$submitTime->format('Y-m-d');
		return;
	}
	
	//Calculate date difference
	$interval = date_diff($submitTime, $startTime);
	
	//Calculate Hours spent
	$hours_spent=$interval->format('%h');

	//Insert entry 
	$sql='insert into workledger (TaskUID, EmpUID, Date, Start_time, Submit_time, Hours_spent) values ('.$taskDetails->{"TaskUID"}.',"'.$taskDetails->{"EmpUID"}.'","'.$taskDetails->{"Date"}.'","'.$taskDetails->{"Start_time"}.'","'.$taskDetails->{"Submit_time"}.'",'.$hours_spent.');';
	
	//Run query
	$result = mysqli_query($con,$sql);
	
	//Return success or failure boolean value
	echo $result;
	
	//Close database connection
	mysqli_close($con);
?>