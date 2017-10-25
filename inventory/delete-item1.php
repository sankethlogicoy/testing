 <?php
 include('../session.php');
 include('../database.php');
// Fetching Values From URL
$id = $_GET['username'];

 
  
//deleting allotment item
	$sql = "DELETE FROM inventoty_allotment WHERE allotment_id='$id'";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>deleted successfully</b>";
} else {
    echo "error";
}

$con->close();
	
?>