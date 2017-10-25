<table class="table">
            <thead> 
            <tr class="th_clr"> 
               <th>INVENTORY ID</th> 
                  <th>ITEM NAME</th>
                   <th>ITEM CATEGORY</th>
                    <th>QR CODE</th>
                    <th>DESCRIPTION</th>
                    <th>DOP</th>
                    <th>PRICE</th>
                  </thead>
              </tr>
 <?php
include('../session.php');
   include('../database.php');
// Fetching Values From URL

$username = $_GET['username'];



$sql2 = "select * from inventory where item_name LIKE '%$username%'";
$name = "";
if ($result1 = mysqli_query($con, $sql2)) {
    if (mysqli_num_rows($result1) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_array($result1)) {
            
            echo "<tbody>";
            echo "<tr class=''>";
            
            echo "<td>" . $row['inventory_id'] . "</td>";
            echo "<td>" . $row['item_name'] . "</a></td>";
            echo "<td>" . $row['item_type'] . "</td>";
            echo "<td>" . $row['item_qrcode'] . "</td>";
            echo "<td>" . $row['item_desc'] . "</td>";
            echo "<td>" . $row['item_purchase_date'] . "</td>";
            echo "<td>" . $row['item_price'] . "</td>";
            $i++;
        }
        echo "</tr></tbody></table></center>";
    }
}


?>