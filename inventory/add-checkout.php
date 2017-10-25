 <?php
include('../session.php');
include('../database.php');
// Fetching Values From URL
$item_name = $_POST['item_name'];

$item_type = $_POST['item_type'];

$item_desc      = $_POST['item_desc'];
$qr_code        = $_POST['qr_code'];
$requested_date = date("Y-m-d");


//insert data into checkout item table
$sql = "INSERT INTO checkout_item (checkout_id,item_name, item_type,item_desc,requested_date,approval,req_sent_by,QR_CODE)
VALUES ('','$item_name','$item_type','$item_desc','$requested_date','intitiated request','$login_session','$qr_code')";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>New Requisition Item Request Send  successfully</b>";
}

else {
    echo $sql;
}

$con->close();

?>