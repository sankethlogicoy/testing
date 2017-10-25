  <?php
include('../session.php');
  include('../database.php');
?>

 <?php
 
   
  //set the pagination limit
$per_page = 5; 
if($_GET)
{
$page=$_GET['page'];
}

$start = ($page-1)*$per_page;
$username = $_GET['username'];
//query to display the list of request items along with search
$select_table = "select * from requisition_item where sent_by LIKE '%$username%' order by requisition_id desc limit $start,$per_page";
  ?>



<div id="requisitionrequest"></div> 
<div id="request_delete"></div>
 
 <div id="request_table">    
  <div style="overflow-x: auto;">   
 <center> <table class="table">
            <thead> 
        
            <tr class="th_clr"> 
               <th>Requisition id</th> 
                  <th>Item name</th>
                   <th>Item type</th>
            <th>Item description</th>
            <th>Sent By</th>
            <th>Status</th>

      <?php
    $n = strcmp($user_type,"admin");
    if($n==0)
    {
    ?> 
          <th>Approval</th>
          
          
                  <th>Update</th>  
                  <th>delete</th>
                    
       <?php } ?>             
                  </thead>
              </tr>

        <br>
<?php
 
  if($result1 = mysqli_query($con, $select_table)){
      if(mysqli_num_rows($result1) > 0){
      
          
       $i=1;  
         

  while($row = mysqli_fetch_array($result1)){

                  echo "<tbody>";
                  echo "<tr class=''>";
                 
                 echo "<td>" . $row['requisition_id'] . "</td>";
                 echo "<td>" . $row['item_name'] . "</td>";
                 echo "<td>" . $row['item_type'] . "</td>";
             echo ' <input type="hidden" class="border" id="requisition_id'.$i.'" value='.$row['requisition_id'].' readonly>';           
        echo "<td>" . $row['item_desc'] . "</td>";
        echo "<td>" . $row['sent_by'] . "</td>";
        echo "<td>" . $row['approval'] . "</td>";

    $n = strcmp($user_type,"admin");
    if($n==0)
    {
   
        echo '<td><select id="approval'.$i.'"></option><option>Accept By ' . $login_session . '</option></option><option>Reject By ' . $login_session . '</option></select></td>';
        echo "<td><input type='button' onclick = 'setApproval(requisition_id".$i.".value,approval".$i.".value);'  value='Update'></td>";
          echo "<td><input type='button' onclick = 'delete_list_req(requisition_id" . $i . ".value);'  value='delete'></td>";
      }              
  $i++;
  }
echo "</tr></tbody></table></center>";
   
          
      } else{
          echo "No items you have taken.";
      } 
  }

    ?> 
</div>