 <?php
 include('../session.php');
// Fetching Values From URL
$id = $_GET['id'];
 
$approval = $_GET['approval'];
 
	//update requisition item status
	$sql = "update requisition_item set approval='$approval' where requisition_id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>Requisition Item Request Updated successfully</b>";
} else {
    echo "<b class='error'>Requisition id not matching</b>";
}

$con->close();
	
?>