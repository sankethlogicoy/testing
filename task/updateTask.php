<?php	
	//Include all user details or route to login page
	include('../session.php');
	include('../database.php');
	
	$taskDetails = $_POST["json"];
	
	//Get the JSON
	$taskDetails = json_decode($taskDetails);
	
	//TO DO: task content update only. Ignore status checks.
	
	
	//If the task status is set to completed or Rejected check privilege of user
	if(!strcasecmp($taskDetails->{"Task_Status"},"Completed") || !strcasecmp($taskDetails->{"Task_Status"},"Rejected"))
	{
		//Only managers and admins may set a task to Completed or Rejected
		if(strcasecmp($user_type,"Manager") && strcasecmp($user_type,"Admin"))
		{
			//Reject usage
			echo '[Restricted] Only Managers or Administrators may evaluate Task status';
			return;
		}
	}
			
	//By default hours saved is 0
	$hoursSaved=0;	
	
	//If the task is set to completed only then calculate hours saved
	if(!strcasecmp($taskDetails->{"Task_Status"},"Completed"))
	{
		//Calculate total hours spent on that task
		$sql='SELECT sum(hours_spent) as totalHours FROM `workledger` where taskUID='.$taskDetails->{"TaskUID"}.';';
		
		//Execute Query
		$result = mysqli_query($con,$sql);
		
		//Number of rows returned to check if there are matching records
		$num_rows = mysqli_num_rows($result);
		
		//If there is a record that matches
		if($num_rows>0)
		{
			$row = mysqli_fetch_array($result);
			
			$sql='select Hours_Alloted from task where TaskUID='.$taskDetails->{"TaskUID"};
			$hoursQuery = mysqli_query($con,$sql);
			$hoursQuery = mysqli_fetch_array($hoursQuery);
			
			//Fetch hours allotted from input 
			$totalHours=(float)$hoursQuery[0];
			
			//Fetch hours used from query
			$hoursUsed= (float)$row[0];
			
			//Calculate hours saved
			$hoursSaved = $totalHours - $hoursUsed;
		}
	}//Check if started is possible with design team if previous status was Completed
	else if(!strcasecmp($taskDetails->{"Task_Status"},"Started"))
	{
		//Find if this is a fresh start to an old entry
		$sql= 'select WorkLedgerUID from workledger where TaskUID='.$taskDetails->{"TaskUID"}.' AND Submit_time IS NULL';
		
		//Run Query
		$result = mysqli_query($con,$sql);		
		
		$num_rows = mysqli_num_rows($result);
		
		//If there is a record without a submit time for the same task
		if($num_rows>0)
		{
			$workLedgerUID = mysqli_fetch_array($result);
			$t=time();
			date_default_timezone_set("Asia/Kolkata");
			$d=date("Y-m-d H:i:s",$t);
			
			$sql = 'Update workLedger SET Start_time="'.$d.'" where WorkLedgerUID='.$workLedgerUID[0];
			
			echo $sql;
			
			$result = mysqli_query($con,$sql);
			
			echo $result;
		}//Create for fresh start
		else
		{
			$t=time();
			date_default_timezone_set("Asia/Kolkata");
			
			$sql = 'Insert into workLedger(TaskUID,EmpUID,Date,Start_time) values('.$taskDetails->{"TaskUID"}.',"'.$login_emp_id.
			'", "'.date("Y-m-d",$t).'", "'.date("Y-m-d H:i:s",$t).'");';
			
			echo $sql;
			
			$result = mysqli_query($con,$sql);
			
			echo $result;
		}
	}
	else if(!strcasecmp($taskDetails->{"Task_Status"},"Submitted") ||!strcasecmp($taskDetails->{"Task_Status"},"Paused"))
	{
		//Find if this is a fresh start to an old entry
		$sql= 'select WorkLedgerUID,start_time from workledger where TaskUID='.$taskDetails->{"TaskUID"}.' AND Submit_time IS NULL';
		
		//Run Query
		$result = mysqli_query($con,$sql);		
		
		$num_rows = mysqli_num_rows($result);
		
		//If there is a task entry that does not have a submit_time
		if($num_rows>0)
		{
			$workLedgerUID = mysqli_fetch_array($result);
			$t=time();
			date_default_timezone_set("Asia/Kolkata");
			$d=date("Y-m-d H:i:s",$t);
			
			$start_time = DateTime::createFromFormat('Y-m-d H:i:s',$workLedgerUID['start_time']);
			$submit_time = DateTime::createFromFormat('Y-m-d H:i:s',$d);
			
			$interval = date_diff($submit_time, $start_time);
			$hours_spent=$interval->format('%d')*24+$interval->format('%h');
			$sql = 'Update workLedger SET Submit_time="'.$d.'",Hours_spent='.$hours_spent.' where WorkLedgerUID='.$workLedgerUID[0];
			
			echo $sql;
			
			$result = mysqli_query($con,$sql);
			
			echo $result;
		}
	}
	
	//Managers and admins can alter all fields
	if(!strcasecmp($user_type,"manager") || !strcasecmp($user_type,"admin"))
	{		
		$sql = 'update task set Task_Name="'.$taskDetails->{"TaskName"}.'", `Task Description`="'.$taskDetails->{"TaskDescription"}.'",  Managers_Comments="'.$taskDetails->{"ManagersComment"}.'", Assigned_Date="'.$taskDetails->{"AssignedDate"}.'", Start_Date= "'.$taskDetails->{"StartDate"}.'", Due_Date="'.$taskDetails->{"DueDate"}.'",Hours_alloted="'.$taskDetails->{"HoursAllotted"}.'",Hours_Saved='.$hoursSaved.', Associated_manager="'.$taskDetails->{"AssociatedManager"}.'", Lead_Employee="'.$taskDetails->{"LeadEmployee"}.'", Task_Status="'.$taskDetails->{"Task_Status"}.'" where TaskUID='.$taskDetails->{"TaskUID"};
	}	
	else
	{		
		//Non-Managers and non-Admins can alter only the task status
		$sql='update task set Task_Status="'.$taskDetails->{"Task_Status"}.'" where TaskUID='.$taskDetails->{"TaskUID"};
	}
	
	$result = mysqli_query($con,$sql);	
	
	mysqli_close($con);	
?>