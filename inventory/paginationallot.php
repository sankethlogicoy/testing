<?php
   include('../session.php');
     include('../database.php');
   ?>

      <?php
        
         //set the pagination limit
         $per_page = 5;
         if ($_GET) {
             $page = $_GET['page'];
         }
         $start = ($page - 1) * $per_page;
         
         ?>
      <div style="overflow-x: auto;">
      <?php
         $n = strcmp($user_type, "employee");
         if ($n == 0) {
         ?>
       <!--
       display the allotment list
       -->
    
         <table class="table">
            <thead>
                 <tr class="th_clr"> 
                  <th>Inventory/Allotment id</th>
                  <th>sent by</th>
                  <th>item name</th>
                  <th>Item QR code</th>
                  <th>Date Of request</th>
                  <th>status</th>
                  <?php
                     $sql2 = "select * from inventoty_allotment where add_by='$login_session'  order by allotment_id desc limit $start,$per_page";
                     
                     
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
                                 echo ' <input type="hidden" class="border" id="allotment_id' . $m . '" value=' . $row['allotment_id'] . ' readonly>';
                                 
                                 echo "<td>" . $row['item_checked_date'] . "</td>";
                                 echo "<td>" . $row['status'] . "</td>";
                                 
                                 
                                 $m++;
                             }
                             echo "</tr></tbody></table><center>";
                             
                             
                         }
                     }
                     
                     ?>
         </table>
         <?php
            }
            ?>
         <?php
            $n = strcmp($user_type, "admin");
            if ($n == 0) {
            ?>
			<div class="row">
			<div class="col-lg-6">
         <select class="form-control"  id="username" name="username" required onchange="getAllocationName(this.value)">
            <option value=''>All</option>
            <?php
               $sql = mysqli_query($con, "SELECT first_name FROM register");
               while ($row = $sql->fetch_assoc()) {
                   
                   echo "<option>" . $row['first_name'] . "</option>";
               }
               ?>
         </select>
		  </div>
		 <!-- <div class="col-lg-6">
		 <a   class="btn btn-primary" href="index.php?name=sanketh" data-toggle="modal" data-target="#UserList">Click Here to see Graph</a>
		  <div id="gen-graph"></div> 
       </div>-->
		</div>
     
      <div id="allot_table">
         <center>
         <table class="table">
         <thead>
              <tr class="th_clr"> 
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
            $sql2 = "select * from inventoty_allotment,inventory where allotment_id=inventory_id order by allotment_id desc limit $start,$per_page";
            
            
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
            
            ?>
         <?php
            }
            ?>
     </div>
	