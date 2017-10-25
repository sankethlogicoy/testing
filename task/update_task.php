 <?php
 include('../session.php');
 include('../database.php');
// Fetching Values From URL
 $task = $_GET['num'];

switch ($task) {
    case "1":
$id = $_GET['id'];
 
$approval = $_GET['approval'];
 
 
 
    
	//set approval column
	$sql = "update  task set Task_Status='$approval' where TaskUID='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>task status Updated successfully</b>";
} else {
    echo "<b class='error'> id not matching</b>";
}

$con->close();
 break;
 
 case "2":
$id = $_GET['id'];
 
$approval = $_GET['approval'];

$sql1="INSERT INTO associatedemployeetask(AssociationUID,TaskUID,EmpUID)VALUES('','$id','$approval')";
if($con->query($sql1)===TRUE){
	echo "<b class='success'>employee added successfully</b>";
}else{
	echo "<b class='error'> not matching</b>";
}
$con->close();
  break;
  
  case "3":
  $approval = $_GET['approval'];
  $sql2="DELETE FROM associatedemployeetask where EmpUID='$approval'";
  if($con->query($sql2)===TRUE){
	echo "<b class='success'>employee deleted successfully</b>";
}else{
	echo "<b class='error'> not matching</b>";
}
$con->close();
  break;
  
   case "4":
  $approval = $_GET['approval'];
  $sql3="DELETE FROM task where TaskUID='$approval'";
  if($con->query($sql3)===TRUE){
	echo "<b class='success'>Task deleted successfully</b>";
}else{
	echo "<b class='error'> not matching</b>";
}
$con->close();
  break;
  
  default:
                   echo "you went wrong";
                                                                                           
                            }    
?>