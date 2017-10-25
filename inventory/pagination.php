<?php
  include('../session.php');
   
   //set the per page lenght
   $per_page = 5;
   if ($_GET) {
       $page = $_GET['page'];
   }
   $start        = ($page - 1) * $per_page;
   $username = $_GET['username'];
   //get the list from inventory according to the search and page limit
   $select_table = "select * from inventory where item_name LIKE '%$username%' and is_deleted <> '1' order by inventory_id desc limit $start,$per_page";
   
   ?>
<!--<div class="row">
   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <input type="search" name="search" class="search_btn" placeholder="search by item name" onkeyup="gethistory(this.value);">
   </div>
</div>-->
<div id="delete_request_inv"></div>
<div id="history_table">
<div style="overflow-x: auto;">
   <center>
   <table class="table">
   <thead>
      <tr class="th_clr">
         <th>INVENTORY ID</th>
         <th>ITEM TYPE</th>
         <th>ITEM NAME</th>
         <th>QR CODE</th>
         <th>DESCRIPTION</th>
         <th>DOP</th>
         <th>PRICE</th>
         <?php
            $n = strcmp($user_type, "admin");
            if ($n == 0) {
            ?>  
         
         <th>Edit</th>
         <?php
            }
            ?>
   </thead>
   </tr>
   <br>
   <?php
      if ($result1 = mysqli_query($con, $select_table)) {
          if (mysqli_num_rows($result1) > 0) {
              
              
              $i = 1;
              
              while ($row = mysqli_fetch_array($result1)) {
                  
                  echo "<tbody>";
                  echo "<tr class=''>";
                  
                  echo "<td>" . $row['inventory_id'] . "</td>";
                  echo "<td>" . $row['item_name'] . "</td>";
                  echo "<td >" . $row['item_type'] . "</td>";
                  echo ' <input type="hidden" class="border" id="inventory_id2' . $i . '" value=' . $row['inventory_id'] . ' readonly>';
                  echo ' <input type="hidden" class="border" id="item_name2' . $i . '" value=' . $row['item_name'] . ' readonly>';
                  echo ' <input type="hidden" class="border" id="item_type2' . $i . '" value=' . $row['item_type'] . ' readonly>';
                  echo ' <input type="hidden" class="border" id="item_qrcode3' . $i . '" value=' . $row['item_qrcode'] . ' readonly>';
                  echo ' <input type="hidden" class="border" id="item_desc2' . $i . '" value=' . $row['item_desc'] . ' readonly>';
                  echo ' <input type="hidden" class="border" id="item_purchase_date2' . $i . '" value=' . $row['item_purchase_date'] . ' readonly>';
                  echo ' <input type="hidden" class="border" id="item_price2' . $i . '" value=' . $row['item_price'] . ' readonly>';
                  echo "<td>" . $row['item_qrcode'] . "</td>";
                  echo "<td>" . $row['item_desc'] . "</td>";
                  echo "<td>" . $row['item_purchase_date'] . "</td>";
                  echo "<td>" . $row['item_price'] . "</td>";
                  
                  $n = strcmp($user_type, "admin");
                  if ($n == 0) {
                      
                      //echo "<td><input type='button' onclick = 'delete_list(inventory_id2" . $i . ".value);'  value='delete'></td>";
                      echo "<td><input type='button' data-toggle='modal' onclick = 'edit_list(item_name2" . $i . ".value,item_type2" . $i . ".value,item_qrcode3" . $i . ".value,item_desc2" . $i . ".value,item_price2" . $i . ".value,item_purchase_date2" . $i . ".value,inventory_id2" . $i . ".value);'  value='Edit'></td>";
                  }
                  
                  
                  $i++;
              }
              echo "</tr></tbody></table></center>";
              
              
          } else {
              echo "No items you have taken.";
          }
      }
      ?>
</div>
</div>