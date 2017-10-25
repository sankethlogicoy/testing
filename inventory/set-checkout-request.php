 <?php
 include('../session.php');
// Fetching Values From URL
$id = $_GET['id'];
 
$approval = $_GET['approval'];
 
 
 
    
	//set approval column
	$sql = "update checkout_item set approval='$approval' where checkout_id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>Check out Updated successfully</b>";
} else {
    echo "<b class='error'>Requisition id not matching</b>";
}

$con->close();
	
?>