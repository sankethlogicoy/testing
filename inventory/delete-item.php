 <?php
 include('../session.php');
 include('../database.php');
// Fetching Values From URL
$id = $_GET['username'];
 
 
   
//deleting the inventory item with matching allotment id
$sql= "UPDATE inventoty_allotment SET is_deleted='1' where allotment_id='$id'";//inventory
//$sql= " DELETE inventory FROM inventory t1, inventoty_allotment t2 WHERE t1.ID = t2.ID and t1.ID='$id'";
if ($con->query($sql) === TRUE) {
	$sql= "UPDATE inventory SET is_deleted='1' where inventory_id='$id'";
	if ($con->query($sql) === TRUE)
    	echo "<b class='success'>deleted successfully</b>";
    else 
    	echo $sql;
} else {
    echo $sql;
}

$con->close();
	
?>