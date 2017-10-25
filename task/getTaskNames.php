<?php
	
	//Class used to hold the JSON array and the status of the operation
	class taskList
	{
		//Stores status of the operation
		public $status = "";
		
		//Stores the JSON array
		public $taskArray = "";
	}
	
	//Include all user details or route to login page
	include('../session.php');
	include('../database.php');
			
	//Get all TaskUIDs and Task Names
	$sql = "select TaskUID,Task_Name from task;";
	
	//Execute Query
	$result = mysqli_query($con,$sql);
	
	//Number of rows returned to check if there are matching records
	$num_rows = mysqli_num_rows($result);
		
	//If there is a record that matches
	if($num_rows>0)
	{
		//Create new instance of TaskList class to encapsulate the JSON response
		$taskReponse = new taskList();
		
		//Build array out of all the rows returned
		while($row = mysqli_fetch_array($result)) 
		{
			$taskArray[] = $row;
		}
		
		//Set status to success as the JSON array building was successful
		$taskReponse->status="success";
		
		//Assign the JSON array to the object
		$taskReponse->taskArray=$taskArray;
		
		//Return the final JSON
		echo json_encode($taskReponse);
	}	
	
	//Close database connection
	mysqli_close($con);
?>