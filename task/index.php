<?php
include('../session.php');
include('../database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Task Management</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet" href="../css/it-request.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"/>
	   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.css"/ >
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
   
 <style>
         .task_plus{
         	   color: red !important;
              font-size: 4em;
         }
       .th_clr{
     
   font-size: 1.2em;
    color: grey;
       }
         .page_header{
         	    margin-top: 4%;

         }
         .tabs{
         text-decoration: none !important;
    font-size: 1em !important;
    color: #bd7676;
    margin-left: -5%;
    margin-top: 4%;
 
         
         }
         li{
         	text-decoration: none !important
         }
        
         .table1{
         	margin-top: 30%;
         }
         .homelog_cls{
         	    margin-top: 6%;
         }
         .logout-session{
         	font-size:2em;
         }
         .tab-content{
     margin-top: 24%;
         }
		 .tab_txt{
		 color: #a99a9a !important;
    /* margin-left: 4%; */
    margin: 2% 4% 2% 4%;
		 }
		 #logout{
			 margin-top:2% !important;
			 margin-right:0% !important;
		 }
		 a {
    text-decoration: none !important;
      color: grey;
}

.home-size {
    font-size: 4.5em !important;
  
}
.btn{
	color: #e4d9d9;
    background-color: brown;
    /* padding: 4% 20% 0% 2%; */
    padding: 2px 11px 2px 11px;
}
         </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand"><?php echo $login_session ?></span>
            </div>
			 <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
			 
                <ul class="nav navbar-nav side-nav">
                    
                    <li >
                        <a href="../inventory"><i class="fa fa-fw fa-stack-exchange"></i> Inventory</a>
                    </li>
					 <li>
                        <a href="../wallet"><i class="fa fa-fw fa fa-money"></i> Wallet</a>
                    </li>
					 <li>
                        <a href="../profile"><i class="fa fa-user"></i>  Profile</a>
                    </li>
					 <li>
                        <a href="../it"><i class="fa fa-desktop"></i>  IT Support</a>
                    </li>
					 <li>
                        <a href=""><i class="fa fa-users"></i>  HR</a>
                    </li>
					 <li class="active">
                        <a href=""><i class="fa fa-tasks"></i>  Task Management</a>
                    </li>
					 <li>
                        <a href="../careers/admin.php"><i class="fa fa-laptop"></i>  Careers</a>
                    </li>
					 
                   
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        

    </div>
	
     <div class="container">
 
<h3 style="color:grey !important;text-align:center;">TASK MANAGEMENT</h3>

<div class="page_header">
	
	<?php
if($user_type=='admin' || $user_type== 'manager' || $user_type=='system_admin')
{
?>
<div class="row">
					<p class="it-font-text">
                                <strong>add task</strong>&nbsp;<i class="fa fa-plus font-awesome-icon" aria-hidden="true" data-toggle="modal" data-target="#createTaskModal" onclick="initializeModal();"></i> 
                                  <strong>edit task</strong>&nbsp;<i class="fa fa-edit font-awesome-icon" aria-hidden="true" data-toggle="modal" data-target="#EditTaskModal" onclick="editTaskModalInit();"></i> 
                                 <strong>today task</strong>&nbsp;<i class="fa fa-calendar font-awesome-icon" aria-hidden="true" onclick="getTodayTask();"></i> 
                                 <strong>Completed task</strong>&nbsp;<i class="fa fa-list-alt font-awesome-icon" aria-hidden="true" onclick="getCompletedTask();"></i> 
									</p>
                       

                    </div>
	 
<?php
}
?>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="tabs">
	    <h3>
		<a class="active" data-toggle="tab" href="#history"><span class="tab_txt">TASK LIST</span></a><span>|</span>
	
		<a data-toggle="tab" href="#list"><span class="tab_txt">ASSIGNED TASKS</span></a><span>|</span>
		
		<a data-toggle="tab" href="#request_list"><span class="tab_txt">HOURS SAVED</span></a><span>|</span>
		
		<a data-toggle="tab" href="#indi_hr"><span class="tab_txt">INDIVIDUAL HOURS</span></a>
		
	
</div>
</div>	

 <div class="tab-content" style="overflow-x:auto;">
 <div id="history" class="tab-pane fade in active">
 <div id="delete_task"></div>
		<?php
			
			$sql='SELECT * from task;';
			
			$result = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($result);
			
			if($num_rows>0)
			{
				echo '<table class="table">';
					echo '<tr class="th_clr">';
						echo '<th>Task Name</th>';
						echo '<th>Task Description</th>';
						echo '<th>Due Date</th>';
						echo '<th>Point of Contact</th>';
						echo '<th>Task Status</th>';
						echo '<th>delete</th>';
					echo '</tr>';
					
					     $i = 1;

					while($row = mysqli_fetch_array($result)) 
					{
						echo '<tr class="th_clr">';
						echo ' <input type="hidden" class="border" id="taskID' . $i . '" value=' . $row['TaskUID'] . ' readonly>';
							echo '<td> <a  data-toggle="modal"  onclick = "indi_task(taskID' . $i . '.value);">' .$row['Task_Name'].'</td>';
							
							echo '<td>'.$row['Task Description'].'</td>';
							echo '<td>'.$row['Due_Date'].'</td>';
							echo '<td>'.$row['Lead_Employee'].'</td>';
							echo '<td>'.$row['Task_Status'].'</td>';
					 	   echo '<td><input type="button" class="btn" onclick = "delete_maintask(taskID' . $i . '.value);"  value="delete"></td>';
						echo '</tr>';
						$i++;
					}
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
			 
		?>
 </div>
  <div id="list" class="tab-pane fade">
  <?php
			 
			
			$sql='select r.emp_id, r.first_name, t1.task_name
			from register r left outer join
			(select t.task_name, asst.empUID
			from task t, associatedemployeetask asst where t.taskUID = asst.taskUID) t1 on r.emp_id = t1.empUID';
			
			$result = mysqli_query($con,$sql);
			if (mysqli_num_rows($result) > 0) {
				echo '<table class="table">';
					echo '<tr class="th_clr">';
						echo '<th>Employee ID</th>';
						echo '<th>First Name</th>';
						echo '<th>Task name</th>';						
					echo '</tr>';

					while($row = mysqli_fetch_array($result)) 
					{
						echo '<tr class="th_clr">';
							echo '<td>'.$row['emp_id'].'</td>';
							echo '<td>'.$row['first_name'].'</td>';
							if($row['task_name'])
								echo '<td>'.$row['task_name'].'</td>';
							else
								echo '<td>No task assigned</td>';
						echo '</tr>';
					}
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
		
		?>
  </div>
  <div id="request_list" class="tab-pane fade">
 <?php
		
			
			$sql='SELECT taskUID, sum(hours_spent) as totalHours FROM `workledger` group by taskUID';
			
			$result = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($result);
			
			if($num_rows>0)
			{
				echo '<table class="table">';
					echo '<tr class="th_clr">';
						echo '<th>Task ID</th>';
						echo '<th>Total Hours Spent</th>';
					echo '</tr>';

					while($row = mysqli_fetch_array($result)) 
					{
						echo '<tr class="th_clr">';
							echo '<td>'.$row['taskUID'].'</td>';
							echo '<td>'.$row['totalHours'].'</td>';							
						echo '</tr>';
					}
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
		
		?>
  </div>
    <div id="indi_hr" class="tab-pane fade">
		
		<?php
			
			
			$sql='SELECT taskUID, empUID, sum(hours_spent) as totalHours FROM `workledger` where taskUID in (select TaskUID from task) group by empUID;';
		
			
			$result = mysqli_query($con,$sql);
			$num_rows = mysqli_num_rows($result);
			
			if($num_rows>0)
			{
				echo '<table class="table">';
					echo '<tr class="th_clr">';
						echo '<th>Employee ID</th>';
						echo '<th>Task ID</th>';
						echo '<th>Total Hours Spent</th>';
					echo '</tr>';

					while($row = mysqli_fetch_array($result)) 
					{
						echo '<tr class="th_clr">';
							echo '<td>'.$row['empUID'].'</td>';
							echo '<td>'.$row['taskUID'].'</td>';
							echo '<td>'.$row['totalHours'].'</td>';							
						echo '</tr>';
					}
				echo '</table>';			
			}
			else
			{
				echo 'No tasks present';
			}
			
		?>
	</div>
 </div>
</div>
	<div class="modal fade" id="createTaskModal" role="dialog">
				<div class="modal-dialog modal-lg">		
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Add new Meeting Note</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="taskForm"  class="addemp">
							<table class="table">
								<div class="form-group">
								 <tr><td>  <label for="Notes">Task Name</label></td>
								  <td><input id="TaskName" form="taskForm" type ="text" name="TaskName"></tr>
								</div>	
								<div class="form-group">
								 <tr><td>  <label for="Notes">Task Description</label></td>
								  <td><input id="TaskDescription" form="taskForm" type ="text" name="TaskDescription"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Manager's Comment</label></td>
								  <td><input id="ManagersComment" form="taskForm" type ="text" name="ManagersComment"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Assigned Date</label></td>
								  <td><input id="AssignedDate" type="text" placeholder="yyyy-mm-dd"></td></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Start Date</label></td>
								  <td><input id="StartDate" form="taskForm" type ="text" name="StartDate" placeholder="yyyy-mm-dd"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Due Date</label></td>
								  <td><input id="DueDate" form="taskForm" type ="text" name="DueDate" placeholder="yyyy-mm-dd"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Hours Allotted</label></td>
								  <td><input id="HoursAllotted" form="taskForm" type ="text" name="HoursAllotted"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Associated Manager</label></td>
								  <td><input id="AssociatedManager" form="taskForm" type ="text" name="AssociatedManager"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Lead Employee</label></td>
								  <td><input id="LeadEmployee" form="taskForm" type ="text" name="LeadEmployee"></tr>
								</div>
								<tr><th colspan="2"> 
								<center>
									<button type="button" class="btn btn-info" id="submitNotes" onclick="saveNewTask();">Submit</button>
								</center></th></tr>
							</table>
							
					  </form> 
					</div>
					<div class="modal-footer">
						<span id="status"></span>
					  <button type="button" class="btn btn-default foot_close" data-dismiss="modal">Close</button>		  
					</div>
				  </div>
				</div>
			</div>
			<div class="modal fade" id="get-today" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Today Task</h4>
        </div>
        <div class="modal-body">
         <div id="get-today-data"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="get-compl" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Completd Task</h4>
        </div>
        <div class="modal-body">
         <div id="get-compl-data"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	<div class="modal fade" id="EditTaskModal" role="dialog">
				<div class="modal-dialog modal-lg">		
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Edit Meeting Note</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="taskForm"  class="addemp">
							<table class="table">
								<div class="form-group">
								 <tr>
									<td><label for="Notes">Task List</label></td>
									<td>
										<select id="taskSelect" onchange="loadTaskDetails(this)">
											
										</select>
									</td>
								  </tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Task Name</label></td>
								  <td><input id="ETTaskName" form="taskForm" type ="text" name="TaskName"></tr>
								</div>	
								<div class="form-group">
								 <tr><td>  <label for="Notes">Task Description</label></td>
								  <td><input id="ETTaskDescription" form="taskForm" type ="text" name="TaskDescription"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Manager's Comment</label></td>
								  <td><input id="ETManagersComment" form="taskForm" type ="text" name="ManagersComment"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Assigned Date</label></td>
								  <td><input id="ETAssignedDate" form="taskForm" type ="text" name="AssignedDate" placeholder="yyyy-mm-dd"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Start Date</label></td>
								  <td><input id="ETStartDate" form="taskForm" type ="text" name="StartDate" placeholder="yyyy-mm-dd"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Due Date</label></td>
								  <td><input id="ETDueDate" form="taskForm" type ="text" name="DueDate" placeholder="yyyy-mm-dd"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Hours Allotted</label></td>
								  <td><input id="ETHoursAllotted" form="taskForm" type ="text" name="HoursAllotted"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Associated Manager</label></td>
								  <td><input id="ETAssociatedManager" form="taskForm" type ="text" name="AssociatedManager"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Lead Employee</label></td>
								  <td><input id="ETLeadEmployee" form="taskForm" type ="text" name="LeadEmployee"></tr>
								</div>
								<div class="form-group">
									<tr>
										<td><label for="Notes">Task State</label></td>
										<td>
											<select id="statusSelect">
												<option>Assigned</option>
												<option>Started</option>
												<option>Paused</option>
												<option>Submitted</option>
												<option>Completed</option>
												<option>Rejected</option>
											</select>
										</td>
									</tr>
								</div>
								<tr><th colspan="2"> 
								<center>
									<button type="button" class="btn btn-info" id="submitNotes" onclick="updateTask();">Submit</button>
								</center></th></tr>
							</table>
					  </form> 
					</div>
					<div class="modal-footer">
						<span id="status"></span>
					  <button type="button" class="btn btn-default foot_close" data-dismiss="modal">Close</button>		  
					</div>
				  </div>
				</div>
			</div>
		<div class="modal fade" id="mymodal_indivi" role="dialog">
				<div class="modal-dialog modal-lg">		
				  <div class="modal-content" style="width:100%;">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Individual task details</h4>
					</div>
					<div class="modal-body">
						<div id="fetched-data"></div>
					</div>
					<div class="modal-footer">
						<span id="status"></span>
					  <button type="button" class="btn btn-default foot_close" data-dismiss="modal">Close</button>		  
					</div>
				  </div>
				</div>
			</div>			

		
			
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/meeting.js"></script>
   <script src="../js/task.js"></script>
	<script src="../js/global/mainscript.js"></script>
	  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
 <script>
	  jQuery(function () {
	jQuery('#startDatexx').datetimepicker();
	jQuery('#endDate').datetimepicker();
	jQuery("#startDatexx").on("dp.change",function (e) {
        jQuery('#endDate').data("DateTimePicker").setMinDate(e.date);
	});
	jQuery("#endDate").on("dp.change",function (e) {
        jQuery('#startDatexx').data("DateTimePicker").setMaxDate(e.date);
	});
});
</script>
<script>
jQuery('#AssignedDate').datetimepicker();
</script>
<script>
jQuery('#DueDate').datetimepicker();
</script>
<script>
jQuery('#StartDate').datetimepicker();
</script>
<script>
jQuery('#ETAssignedDate').datetimepicker();
</script>
<script>
jQuery('#ETStartDate').datetimepicker();
</script>
<script>
jQuery('#ETDueDate').datetimepicker();
</script>

</body>

</html>
