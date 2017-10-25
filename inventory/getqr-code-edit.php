<?php
include('../session.php');
 include('../database.php');
// Fetching Values From URL
$item_name     = $_GET['item_name'];
$item_type     = $_GET['item_type'];
$item_qr       = $_GET['item_qr'];
$item_desc     = $_GET['item_desc'];
$item_price    = $_GET['item_price'];
$item_purchase = $_GET['item_purchase'];
$id            = $_GET['edit_id'];


//updating inventory 
$sql = "update inventory set item_name='$item_name',item_type='$item_type',item_desc='$item_desc',item_qrcode='$item_qr'
 ,item_price=$item_price,item_purchase_date='$item_purchase' where inventory_id=$id";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>updated successfully</b>";
} else {
    echo "error";
}

$con->close();

?>