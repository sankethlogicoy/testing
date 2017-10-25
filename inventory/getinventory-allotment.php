<?php
include('../session.php');
include('../database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory Allotment</title>
  
  <script type="text/javascript" src="../js/inventory-val.js"></script> 
  
</head>
<body>
            <?php
// Fetching Values From URL
 


$module_name = "Inventory";
//fetching the var from javascript
$num         = $_GET['num'];

//compare and execute for matched var
$n = strcmp($num, "allot");
if ($n == 0) {
//fetching the data from url
    $item_name = $_GET['item_name'];
    
    
    
    $item_checked_date = $_GET['item_checked_date'];
    $item_qrcode       = $_GET['item_qrcode'];

    $result = mysqli_query($con, "SELECT inventory_id FROM inventory WHERE item_qrcode='$item_qrcode'");
    if (!$result) {
        echo 'Could not run query: ';
        $str = "[" . $login_session . "][" . $module_name . "][could not handle database] operation  " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
        exit;
    }
    $row = mysqli_fetch_row($result);
    
    $id = $row[0];
//inserting request into allotment table  
    
    $sql = "INSERT INTO inventoty_allotment (allotment_id,item_name,add_by,item_qrcode,item_checked_date,status)
VALUES ('$id','$item_name','$login_session','$item_qrcode','$item_checked_date','initiated request')";
    
    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>" . $item_name . "&nbsp; alloaction request sent successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "] inventory allocated  by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        echo "<b class='error'>" . $item_name . " selected inventory item already allocated to someone please select another item</b>";
        $str = "[" . $login_session . "][" . $module_name . "] inventory already allocated  request by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    }
    
    $con->close();
    
}
$n = strcmp($num, "userfetch");
if ($n == 0)
    if ($n == 0) {
        
?>
      <center> <table class="table">
              <thead> 
              <tr> 
                <th>Inventory/Allotment id</th> 
                  <th>Allocated to</th>
                  <th>item name</th>
                  <th>Item QR code</th>
                    
                  <th>Item Price</th>
                  <th>Date Of Checked</th>
                  <th>Date Of Purhase</th>
                  <th>status</th>
                  <th>approval</th>
                  <th>update</th>
    <?php
        $n = strcmp($user_type, "admin");
        if ($n == 0) {
?>
                      <th>delete</th>
                        <?php
        }
?>
                  </thead>
                </tr>

                <br>
 <?php
        
        $username = $_GET['username'];
        
        
        $sql2 = "select * from inventoty_allotment,inventory where add_by like '%$username%' and allotment_id=inventory_id order by allotment_id desc";
        
        
        if ($result1 = mysqli_query($con, $sql2)) {
            if (mysqli_num_rows($result1) > 0) {
                
                
                
                $m = 1;
                
                while ($row = mysqli_fetch_array($result1)) {
                    echo "<tbody>";
                    echo "<tr class=''>";
                    echo "<td>" . $row['allotment_id'] . "</td>";
                    echo "<td>" . $row['add_by'] . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_qrcode'] . "</td>";
                    echo ' <input type="hidden" class="border" id="allotment_id2' . $m . '" value=' . $row['allotment_id'] . ' readonly>';
                    echo "<td>" . $row['item_price'] . "</td>";
                    echo "<td>" . $row['item_checked_date'] . "</td>";
                    echo "<td>" . $row['item_purchase_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo '<td><select id="approval2' . $m . '"></option><option>Allocated By ' . $login_session . '</option></option><option>Rejected By ' . $login_session . '</option></select></td>';
                    echo "<td><input type='button' onclick = 'setAllotApproval(allotment_id2" . $m . ".value,approval2" . $m . ".value);'  value='Update'></td>";
                    
                    
                    $n = strcmp($user_type, "admin");
                    if ($n == 0) {
                        
                        echo "<td><input type='button' onclick = 'delete_list1(allotment_id2" . $m . ".value);'  value='delete'></td>";
                    }
                    $m++;
                }
                echo "</tr></tbody></table><center>";
                
                
            }
        }
    }
?>

</body>
</html>
 