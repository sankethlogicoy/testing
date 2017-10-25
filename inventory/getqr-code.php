<?php
include('../session.php');
include('../logger.php');
 include('../database.php');
$module_name = "Inventory module";
// Fetching Values From URL
$num         = $_GET['num'];
$item_name   = $_GET['item_name'];


$n    = strcmp($num, "getqr");

if ($n == 0) {
   
    
    
 //select the qrcode based on item name    
    $result = mysqli_query($con, "select distinct item_qrcode from inventory where item_name='$item_name' order by item_purchase_date desc");
    if (!$result) {
        echo 'Could not run query: ';
        exit;
    }
    
    $row = mysqli_fetch_row($result);
    
    $qrcode = $row[0];
	if($qrcode!="")
	{
		echo $qrcode;
	}
	else{
		echo $item_name."-0";
	}
    
    
    
}
?>
       
 <?php
$n = strcmp($num, "inventory");
if ($n == 0) {
    
    $item_type = $_GET['item_type'];
    
    $item_desc = $_GET['item_desc'];
    
    $item_price = $_GET['item_price'];
    
    
    
    $item_purchase_date = $_GET['item_purchase_date'];
    $item_qrcode        = $_GET['item_qrcode'];
  //inserting values into inventory   
    $sql = "INSERT INTO inventory (    inventory_id,item_name, item_type,item_desc,item_price,item_qrcode,item_purchase_date)
VALUES ('','$item_name', '$item_type','$item_desc',$item_price,'$item_qrcode','$item_purchase_date')";
    
    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>new Inventory item added successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "] new inventory  added by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        echo "<b class='error'>item  already exist</b>";
        $str = "[" . $login_session . "][" . $module_name . "][count not add ] new inventory  by " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }
    
    $con->close();
    
}
//qr code for adding inventory
$n = strcmp($num, "getname");
if ($n == 0) {
    $sql = mysqli_query($con, "SELECT item_qrcode FROM inventory where item_name='$item_name'");
    while ($row = $sql->fetch_assoc()) {
        
        $data = $row['item_qrcode'];
        echo '<option>' . $data . '</option>';
    }
}

//qr code for allotment
$n = strcmp($num, "getname2");
if ($n == 0) {
    $sql = mysqli_query($con, "SELECT item_qrcode FROM inventory where item_name='$item_name'");
    while ($row = $sql->fetch_assoc()) {
        
        $data = $row['item_qrcode'];
        echo '<option>' . $data . '</option>';
    }
}

//qr code for check out
$n = strcmp($num, "getname3");
if ($n == 0) {
    $sql = mysqli_query($con, "SELECT item_qrcode FROM inventory where item_name='$item_name'");
    while ($row = $sql->fetch_assoc()) {
        
        $data = $row['item_qrcode'];
        echo '<option>' . $data . '</option>';
    }
}


?>
  

