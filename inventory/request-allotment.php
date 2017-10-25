 <?php
 include('../session.php');
    include('../database.php');
// Fetching Values From URL
$item_name = $_POST['item_name'];
 
$item_type = $_POST['item_type'];
 
$item_desc = $_POST['item_desc'];
$requested_date = date("Y-m-d");
 
 
   
	//insert allotment request
	$sql = "INSERT INTO request_allotment (request_id,item_name, item_type,item_desc,requested_date,sent_by)
VALUES ('','$item_name', '$item_type','$item_desc','$requested_date','$login_session')";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>New Requisition Item Request Send  successfully</b>";
} else {
    echo "<b class='error'>Requisition id already exist</b>";
}

$con->close();
	
?>