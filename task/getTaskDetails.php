<?php
	
	//Class used to hold the JSON/JSON array and the status of the operation
	class taskList
	{
		//Stores status of the operation
		public $status = "";
		
		//Stores the JSON/JSON array
		public $taskArray = "";
	}

	//Include all user details or route to login page
	include('../session.php');
	include('../database.php');
	
	$taskUID = $_POST["json"];
	
	//Get the JSON
	$taskUID = json_decode($taskUID);
			
	//Select all task details based on supplied task UID
	$sql = "select * from task where TaskUID=".$taskUID->{"TaskUID"}.";";
	
	//Execute query
	$result = mysqli_query($con,$sql);
	
	//Number of rows returned to check if there are matching records.
	$num_rows = mysqli_num_rows($result);
	
	//If there is a record that matches
	if($num_rows>0)
	{
		//Create new instance of TaskList class to encapsulate the JSON response
		$taskReponse = new taskList();
		
		//Build JSON out of the row returned
		while($row = mysqli_fetch_array($result)) 
		{
			$taskArray = $row;
		}
		
		//Set status to success as the JSON building was successful
		$taskReponse->status="success";
		
		//Assign the query result to the object
		$taskReponse->taskArray=$taskArray;
		
		//Return the final JSON
		echo json_encode($taskReponse);
	}	
	
	//Close database connection
	mysqli_close($con);
?>