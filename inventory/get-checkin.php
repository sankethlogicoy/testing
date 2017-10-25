 <?php
   include('../session.php');
   include('../database.php');
   
   $task = $_GET['num'];

switch ($task) {
    case "25":
    ?>
 <div style="overflow-x: auto;">
                  <br>
                  <center>
                  <div id="checkinrequest"></div>
                  <center>
                  <table class="table">
                  <thead>
                     <tr class="th_clr">
                        <th>checkout id</th>
                        <th>Item name</th>
                        <th>Item type</th>
                        <th>Item description</th>
                        <th>Sent By</th>
                        <th>Status</th>
                        <th>Approval</th>
                        <th>Update</th>
                  </thead>
                  </tr>
                  <?php
                  $start_from = $_GET['st'];
                  $limit = $_GET['end'];
                  $num = 0;                                                                                                  
                                                                    
                     $sql2 = "select * from checkout_item where  set_status <> 'returned' LIMIT $start_from, $limit";
                       
                     
                     if($result1 = mysqli_query($con, $sql2)){
                       if(mysqli_num_rows($result1) > 0){
                        $num = mysqli_num_rows($result1);
                           
                        $n=1;  
                          
                     
                     while($row = mysqli_fetch_array($result1)){
                     
                                   echo "<tbody>";
                                   echo "<tr class=''>";
                                  
                                  echo "<td>" . $row['checkout_id'] . "</td>";
                                  echo "<td>" . $row['item_name'] . "</td>";
                                  echo "<td>" . $row['item_type'] . "</td>";
                               
                         echo "<td>" . $row['item_desc'] . "</td>";
                     echo ' <input type="hidden" class="border" id="checkout_idd'.$n.'" value='.$row['checkout_id'].' readonly>'; 
                         echo "<td>" . $row['req_sent_by'] . "</td>";
                         echo "<td>" . $row['approval'] . "</td>";
                         echo '<td><select id="set_status'.$n.'"></option><option>Checkin </option></option><option>Checkout</option></select></td>';
                         echo "<td><input type='button' onclick = 'setStatus(checkout_idd".$n.".value,set_status".$n.".value);'  value='Update'></td>";
                                    
                     $n++;
                     }
                     echo "</tr></tbody></table></center>";
                     
                           
                       } else{
                           echo "No items you have taken.";
                       } 
                     }
                   $a = 5;

            $one = $start_from + $a;
            $two = $start_from - $a;
            if ($two < 0) {
            $two = 0;
           }

          if ($num >= 5) {


      echo "<td><button onclick = 'checkin_pagi(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

    echo "<td><button onclick = 'checkin_pagi(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";


    echo "<td><button onclick = 'checkin_pagi(" . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
        } 
      else {
    echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
      echo "<td><button onclick = 'checkin_pagi(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

echo "<td><button onclick = 'checkin_pagi(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
  } 
  break;
 case "26":
 ?>
  <?php
                     $n = strcmp($user_type,"employee");
                     if($n==0)
                     {
                     ?> 

                  <div id="addcheckout" class="succ_fail_margin"></div>
                  <div>
                     <form method="post" id="checkoutform" class="addemp">
                        <table class="table">
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email">Item Name</label></td>
                                 <td><input type="text" class="form-control" id="checkout_item_name" name="checkout_item_name" placeholder="Please Enter Item name" required></td>
                              </tr>
                           </div>
                           <BR>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email">Item Type</label></td>
                                 <td>
                                    <select class="form-control"   id="checkout_item_type" name="checkout_item_type" onchange="getNames_Qrcode(this.value);">
                                       <option value="0">Select item name</option>
                                       <?php 
                                          $sql = mysqli_query($con, "SELECT distinct item_name FROM inventory");
                                          while ($row = $sql->fetch_assoc()){
                                          echo "<option>" . $row['item_name'] . "</option>";
                                          }
                                          ?>
                                    </select>
                                 </td>
                              </tr>
                           </div>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="name">select the qrcode</label></td>
                                 <td> <select class="form-control"  id="item_qrcode1" name="item_qrcode1" required readonly>
                                    </select>
                                 </td>
                              </tr>
                           </div>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email">Descrption</label></td>
                                 <td><input type="text" class="form-control" id="checkout_item_desc" name="checkout_item_desc" placeholder="Please Enter item descption" required></td>
                              </tr>
                           </div>
                           <br>
                           <br>
                           <br>
                           <tr>
                              <th colspan="2">
                                 <center><button type="button" class="btn btn-info" id="submit" onclick="checkoutRequest();">Send Request</button></center>
                              </th>
                           </tr>
                        </table>
                     </form>
                  </div>
                  <div style="overflow-x: auto;">
                  <center>

                  <table class="table">
                     <thead>
                        <tr class="th_clr">
                           <th>checkout id</th>
                           <th>Item name</th>
                           <th>Item type</th>
                           <th>Item description</th>
                           <th>Sent By</th>
                           <th>Approval</th>
                           <th>QR CODE</th>
                        </tr>
                     </thead>
                     <br>
                     <?php
                      $start_from = $_GET['st'];
                  $limit = $_GET['end'];
                  $num = 0; 

                        $sql2 = "select * from checkout_item where req_sent_by='$login_session' and set_status <> 'returned' LIMIT $start_from, $limit";
                          
                        
                        if($result1 = mysqli_query($con, $sql2)){
                          if(mysqli_num_rows($result1) > 0){
                            $num = mysqli_num_rows($result1);
                              
                           $j=1;  
                             
                        
                        while($row = mysqli_fetch_array($result1)){
                                    
                                      echo "<tbody>";
                                      echo "<tr class=''>";
                                     
                                     echo "<td>" . $row['checkout_id'] . "</td>";
                                     echo "<td>" . $row['item_name'] . "</td>";
                                     echo "<td>" . $row['item_type'] . "</td>";
                                  
                            echo "<td>" . $row['item_desc'] . "</td>";
                            echo "<td>" . $row['req_sent_by'] . "</td>";
                            echo "<td>" . $row['approval'] . "</td>";
                             echo "<td>" . $row['QR_CODE'] . "</td>";
                        
                                       
                        $j++;
                        }
                        echo "</tr></tbody></table></center>";
                        
                              
                          } else{
                              echo "No items you have taken.";
                          } 
                        }
                                           $a = 5;

            $one = $start_from + $a;
            $two = $start_from - $a;
            if ($two < 0) {
            $two = 0;
           }

          if ($num >= 5) {

echo "<center>";
      echo "<td><button onclick = 'checkout_pagi(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

    echo "<td><button onclick = 'checkout_pagi(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";


    echo "<td><button onclick = 'checkout_pagi(" . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
    echo "</center>";
        } 
      else {
   echo "<center>";
      echo "<td><button onclick = 'checkout_pagi(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

echo "<td><button onclick = 'checkout_pagi(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

  } 
  echo "</center>";
    break;
                        ?> 
                     <?php } ?>
                  </table>
                  <?php
                     $n = strcmp($user_type,"admin");
                     if($n==0)
                     {
                     ?>
                  <div id="checkoutrequest1"></div>
                  <div id="delete_request"></div>
                  <br>
                  <div style="overflow-x: auto;">
                  <center>
                  <table class="table">
                  <thead>
                     <tr class="th_clr">
                        <th>checkout id</th>
                        <th>Item name</th>
                        <th>Item type</th>
                        <th>qr code</th>
                        <th>Item description</th>
                        <th>Sent By</th>
                        <th>Status</th>
                        <th>Approval</th>
                        <th>Update</th>
                  </thead>
                  </tr>
                  <br>
                  <?php
                     $start_from = $_GET['st'];
                  $limit = $_GET['end'];
                  $num = 0;
                     $sql2 = "select * from checkout_item where  set_status <> 'returned' LIMIT $start_from, $limit";
                       
                     
                     if($result1 = mysqli_query($con, $sql2)){
                       if(mysqli_num_rows($result1) > 0){
                            $num = mysqli_num_rows($result1);
                           
                           
                        $m=1;  
                          
                     
                     while($row = mysqli_fetch_array($result1)){
                     
                                   echo "<tbody>";
                                   echo "<tr class=''>";
                                  
                                  echo "<td>" . $row['checkout_id'] . "</td>";
                                  echo "<td>" . $row['item_name'] . "</td>";
                                  echo "<td>" . $row['item_type'] . "</td>";
                                    echo "<td>" . $row['QR_CODE'] . "</td>";
                               
                         echo "<td>" . $row['item_desc'] . "</td>";
                     echo ' <input type="hidden" class="border" id="checkout_id'.$m.'" value='.$row['checkout_id'].' readonly>'; 
                         echo "<td>" . $row['req_sent_by'] . "</td>";
                     
                         echo "<td>" . $row['approval'] . "</td>";
                         echo '<td><select id="approval1'.$m.'"></option><option>Checkin</option></option><option>Checkout</option></select></td>';
                         echo "<td><input type='button' onclick = 'setApproval1(checkout_id".$m.".value,approval1".$m.".value);'  value='Update'></td>";
                           
                     $m++;
                     }
                     echo "</tr></tbody></table></center>";
                     
                           
                       } else{
                           echo "No items you have taken.";
                       } 
                     }
                      $a = 5;

            $one = $start_from + $a;
            $two = $start_from - $a;
            if ($two < 0) {
            $two = 0;
           }

          if ($num >= 5) {

   echo "<center>";
      echo "<td><button onclick = 'checkout_pagi(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

    echo "<td><button onclick = 'checkout_pagi(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";


    echo "<td><button onclick = 'checkout_pagi(" . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
      echo "</center>";
        } 
         
      else {
  echo "<center>";
      echo "<td><button onclick = 'checkout_pagi(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

echo "<td><button onclick = 'checkout_pagi(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
echo "</center>";
  } 
  break;
                     ?> 
                  <?php } ?>
              





<?php


     default:
                   echo "you went wrong";
                                                                                           
                            }   
                     ?> 

                     </div>
