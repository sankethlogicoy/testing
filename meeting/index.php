<?php include( '../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Meeting</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/it-request.css">
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
   

</head>

<body onload="profileInit();">

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
                    <li>
                        <a href="../home"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li >
                        <a href="../inventory"><i class="fa fa-fw fa-stack-exchange"></i> Inventory</a>
                    </li>
					 <li>
                        <a href="../wallet"><i class="fa fa-fw fa fa-money"></i> Wallet</a>
                    </li>
					 <li class="">
                        <a href="../profile"><i class="fa fa-user"></i>  Profile</a>
                    </li>
					 <li>
                        <a href="../it"><i class="fa fa-desktop"></i>  IT Support</a>
                    </li>
					 <li>
                        <a href="../hr"><i class="fa fa-users"></i>  HR</a>
                    </li>
					 <li>
                        <a href="../task"><i class="fa fa-tasks"></i>  Task Management</a>
                    </li>
					 <li class="active">
                        <a href=""><i class="fa fa-sticky-note"></i>  Meeting</a>
                    </li>
					 
                   
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
 <div id="page-wrapper">
        <div class="container-fluid">
		<div id="meetingNotesContainer">
			Search hashtags: <input id="hashtag" type="text" name="searchString"> 
			<button type="button" name="button" onclick="searchForFilesWithHashTags();">Search</button>

			<button type="button" name="button" class="btn btn-info btn_emp" data-toggle="modal" data-target="#myModal" onclick="initializeModal();">New Meeting Note</button>

			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">		
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Add new Meeting Note</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="notesform"  class="addemp">
							<table class="table">
								<div class="form-group">
								 <tr><td>  <label for="Notes">Search By keyword</label></td>
								  <td><input id="searchableMetadata" form="notesform" type ="text" name="searchableMetadata"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Subject</label></td>
								  <td><input id="meetingHeader" form="notesform" type ="text" name="meetingHeader"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Participants in Office</label></td>
								  <td><input id="participantsInOffice" form="notesform" type ="text" name="participantsInOffice"></tr>
								</div>
								<!-- <div class="form-group">
   <div class="checkbox">                                     <tr><td>  <label for="name">select the name</label></td>  <td>  
<?php
$sql = mysqli_query($con, "SELECT distinct first_name FROM register");
while ($row = $sql->fetch_assoc()) {
	?>
	
	<input type="checkbox" name="tag_1" id="tag_1" value="<?php echo $row['first_name'];?>"><?php echo $row['first_name'];?>


 <?php   
}
?> </div>
                                                </select></td></tr>
                                    </div>-->
								<div class="form-group">
								 <tr><td>  <label for="Notes">Guest</label></td>
								  <td><input id="participantsOverCall" form="notesform" type ="text" name="participantsOverCall"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Agenda</label></td>
								  <td><input id="agenda" type ="text" form="notesform" name="agenda"></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Enter Notes here</label></td>
								  <td><textarea id="notes" name="notes" form="notesform" rows="20" cols="90%"></textarea></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Urgent Action Items</label></td>
								  <td><textarea id="urgentActionItems" name="urgentActionItems" form="notesform" rows="5" cols="90%"></textarea></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Task Allocations</label></td>
								  <td><textarea id="taskAllocations" name="taskAllocations" form="notesform" rows="5" cols="90%"></textarea></tr>
								</div>
								<div class="form-group">
								 <tr><td>  <label for="Notes">Time Line of Deliverables</label></td>
								  <td><textarea id="timelineOfDeliverables" name="timelineOfDeliverables" form="notesform" rows="5" cols="90%"></textarea></tr>
								</div>
								<tr><th colspan="2"> 
								<center>
									<button type="button" class="btn btn-info" id="submitNotes" onclick="saveMeetingNotes();">Submit</button>
								</center></th></tr>
							</table>
					  </form> 
					</div>
					<div class="modal-footer">
						<span id="status"></span>
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>		  
					</div>
				  </div>
				</div>
			</div>
		</div> 
		<div id="folderContainer">
			<div id="pagework">
				<?php
					$path='../Files/Meeting';
					$files = scandir($path);
					$count=0;			
					print '<div>';
					foreach($files as $str)
					{
						if(strcmp($str,".")!=0 && strcmp($str,"..")!=0)
						{
							if(is_dir($path.'/'.$str))
							{
								$count = $count +1;
								print '<div class="mediaanchor directory floatybox" onclick="sendPOSTDataToPHPfile(\'pagework\',\'getfolder.php\',\'foldername='.$path.'/'.$str.'\')">';		
								print '<span><img src="folder.png" alt="Go to "'.$str.' width="42" height="42" border="0"><br>'.$str.'</span>';
								print '</div>';	
							}
						}
					}		
					print '</div>';
			
					print '<div>';
					foreach($files as $str)
					{
						if(strcmp($str,".")!=0 && strcmp($str,"..")!=0)
						{		
							if(!is_dir($path.'/'.$str))				
							{					
								$count = $count +1;
											
								$name=explode(".",$str);
								print '<div>';		
								$fileModfiedTime = date ("F d Y H:i:s a", filemtime($path.'/'.$str));
								print '<span class="mediaanchor" onclick="getDataFromMeetingNotes(this.innerHTML)";>'.$str.'</span><span> ('.$fileModfiedTime.')</span>';
								print '</div>';					
							}
						}
					} 
					print '</div>';

					if($count ==0)
					{
						print 'Meeting Notes repository is empty..';
					}	
				?>
			</div>
		</div>
		</div>
		</div>
        
     
	 
	 </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
	<script src="../js/meeting.js"></script>
	<script src="../js/global/mainscript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 

</body>

</html>
