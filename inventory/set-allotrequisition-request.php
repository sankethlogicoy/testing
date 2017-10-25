 <?php
 include('../session.php');
    include('../database.php');
// Fetching Values From URL
$id = $_GET['id'];
 
$approval = $_GET['approval'];
 
 
 
   
	//update the status in inventory allotment
	$sql = "update inventoty_allotment set status='$approval' where allotment_id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>Requisition Item Request Updated successfully</b>";
} else {
    echo "<b class='error'>Requisition id not matching</b>";
}

$con->close();
	
?>