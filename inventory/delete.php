 <?php
 include('../session.php');
 include('../database.php');
// Fetching Values From URL
$id = $_GET['username'];
 
 

	$sql = "DELETE FROM requisition_item WHERE requisition_id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>deleted successfully</b>";
} else {
    echo "error";
}

$con->close();
	
?>