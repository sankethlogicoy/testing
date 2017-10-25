 <?php
 include('../session.php');
    include('../database.php');
// Fetching Values From URL
$id = $_GET['id'];
 
$approval = $_GET['approval'];
 $approval;
 
 
   
//update status for checkout item
	$sql = "update checkout_item set set_status='$approval' where checkout_id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>Updated successfully</b>";
} else {
    echo "<b class='error'>Requisition id not matching</b>";
}

$con->close();
	
?>