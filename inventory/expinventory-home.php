   <?php
include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory Allotment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/custom.css">
   <link rel="icon" type="image/x-icon" href="../images/Artifact.ico">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="mainscript.js"></script> 
  <script type="text/javascript" src="../js/inventory-val.js"></script> 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
            rel="stylesheet">
<style>
 .icon_clr{
       color: red !important;
   font-size: 1.5em !important;
  }
.add_clrs{
font-size: 1.8em !important;
  color: grey;
  
}
.modal-content{
  width:115%;
}
.histor_list{
  font-size:2em !important;
   margin: 6% 9% 8% -5%;

}
.history_style{
  color:red;
  padding: 5%;
}
.list_style{
  color:grey;
  padding: 5%;

}
.search_btn{
  border: none;
    border-bottom: 1px solid grey;
    margin: 6% 0% 0% 4%;
     width: 100%;
}
.th_clr{
  color:grey;
  font-size: 1.5em;
}

a{
  text-decoration: none !important;
}



#paginate
{
text-align:center;
border:0px green solid;
width:500px;
margin:0 auto;
}
.link{
width:800px; 
margin:0 auto; 
border:0px green solid;
}

li{ 
list-style: none; 
float: left;
margin-right: 16px; 
padding:5px; 
border:solid 1px #193d81;
color:#0063DC; 
}
li:hover
{ 
color:#FF0084; 
cursor: pointer; 
}
</style>
</head>
<body>


  
<div class="container">
<div class="page-header">
   
<h3>Inventory Allotment Form<b id="logout"><a href="../logout.php" class="logout-session">Log out</a>  </b></h3>    
  </div>

<a href="../index.php"  data-toggle="tooltip" data-placement="top" title="home"><i class="fa fa-home home-size" aria-hidden="true"></i></a><a href="index.php" data-toggle="tooltip" data-placement="top" title="Back to Inventory"><i class="fa fa-arrow-left back-size" aria-hidden="true"></i></a>

<br>
<br>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<center data-toggle="modal" data-target="#myModal2">
<a href="#"><h2 class="add_clrs">Add<br> New</h2>
<i class="fa fa-plus icon_clr" aria-hidden="true"></i></a>
</center>
</div>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<center>
<a href="#" data-toggle="modal" data-target="#myModal1"><h2 class="add_clrs">Check <br>Out</h2>
<i class="fa fa-minus icon_clr" aria-hidden="true"></i></a>
</center>
</div>
 <?php
    $n = strcmp($user_type,"admin");
    if($n==0)
    {
    ?>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<center>
<a href="#" data-toggle="modal" data-target="#myModal3"><h2 class="add_clrs">Check<br> In</h2>
<i class="fa fa-plus icon_clr" aria-hidden="true"></i></a>
</center>
</div>
<?php } ?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<center>
<a href="#" data-toggle="modal" data-target="#myModal4"><h2 class="add_clrs">Request<br> Equipment</h2>
<i class="fa fa-square icon_clr" aria-hidden="true"></i></a>
</center>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<center>
<a href="#" data-toggle="modal" data-target="#myModal5"><h2 class="add_clrs">Request<br>Allocation</h2>
<i class="fa fa-square icon_clr" aria-hidden="true"></i></a>
</center>
</div>

<br>
<br>

<nav>
  <ul class="nav nav-tabs tabs-text">
   <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2 class="histor_list"> <a class="active" data-toggle="tab" href="#history"><span class="history_style">HISTORY</span></a><span>|</span><a data-toggle="tab" href="#list" class="tabst"><span class="list_style">ALLOTMENT LIST</span></a><span>|</span> <a data-toggle="tab" href="#request_list"><span class="list_style">REQUEST LIST</span></a></h2>
</div>
</div>
  </ul>
</nav>

<div class="tab-content">

<div id="history" class="tab-pane fade in active">


<?php
   
$result3 = mysqli_query($conn,"SELECT * FROM inventory");
$num_rows = mysqli_num_rows($result3);
$pages=$num_rows/5;
$pages=ceil($pages);
    ?> 
<div id="content" ></div>
<div class="link" align="center">
            <ul id="paginate">
                <?php
                  for($i=1; $i<=$pages; $i++)
                {
                    echo '<li id="'.$i.'">'.$i.'</li>';
                }
                ?>
            </ul>   
</div>
<div style="clear:both"></div>


 </div> 
 


<div id="list" class="tab-pane fade">
<div id="updateallotrequest"></div>
<br>
<div id="delete_request1"></div> 


<?php 
 $resultall = mysqli_query($conn,"select * from inventoty_allotment,inventory where allotment_id=inventory_id");
$num_rowsall = mysqli_num_rows($resultall);
$pages_all=$num_rowsall/5;
$pages_all=ceil($pages_all);

?>
<div id="content2" ></div>
<div class="link" align="center">
            <ul id="paginate2">
                <?php
                  for($i=1; $i<=$pages_all; $i++)
                {
                    echo '<li id="'.$i.'">'.$i.'</li>';
                }
                ?>
            </ul>   
</div>


     </select></center>  
   

<div id="autofetch">
 
      </div>
</div>


<div id="request_list" class="tab-pane fade">

 <?php  
$result4 = mysqli_query($conn,"SELECT * FROM requisition_item");
$num_rows1 = mysqli_num_rows($result4);
$pages1=$num_rows1/5;
$pages1=ceil($pages1);
    ?> 
<div id="content1" ></div>
<div class="link" align="center">
            <ul id="paginate1">
                <?php
                  for($i=1; $i<=$pages1; $i++)
                {
                    echo '<li id="'.$i.'">'.$i.'</li>';
                }
                ?>
            </ul>   
</div>
<div style="clear:both"></div>

  
 </div>
   



<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">new inventory</h4>
      <div id="updateemp"></div>
        </div>
        <div class="modal-body">
         
       
<div id="addinventory" class="succ_fail_margin"></div>
    <form method="post" id="addinventoryform" class="addemp">
  <table class="table">
       
 <div class="form-group">
     <tr><td>  <label for="email">Item Name</label></td>
      <td><input type="text" class="form-control" id="item_type" name="item_type" placeholder="Please Enter item type" required></td></tr>
    </div>
<div class="form-group">
     <tr><td>  <label for="sel1">Item type</label></td>
      <td><select class="form-control"   id="item_name" name="item_name" onchange="getQRCode(this.value);">
    <option value="0">Select</option>
        <option>Monitors</option>
        <option>Flash drive</option>
        <option>HDD AND RAM</option>
        <option>Samples</option>
          <option>SD and MicrocardSD</option>
           <option>Laptops</option>
            <option>Keyboards</option>
              <option>Mice</option>
                <option>Table lamps</option>
                  <option>Multi plugs</option>
                    <option>Printers</option>
                       <option>Tablet/ipad</option>
                         <option>Camera</option>
      </select></td></tr>
      
    
    </div><BR>
      <div class="form-group">
     <tr><td>  <label for="email">QR CODE</label></td>
      <td><input type="text" class="form-control" id="item_qrcode" name="item_qrcode" placeholder="Please Enter item QR code" readonly required></td></tr>
    </div>
   
    <div class="form-group">
     <tr><td>  <label for="email"> Item Descrption</label></td>
      <td><input type="text" class="form-control" id="item_desc" name="item_desc" placeholder="Please Enter item descption" required></td></tr>
    </div>
    <br>
   
  <div class="form-group">
     <tr><td>  <label for="email">Item Price</label></td>
      <td><input type="number" class="form-control" id="item_price" name="item_price" placeholder="Please Enter item Price" required onkeypress="return isNumberKey(event)"></td></tr>
    </div>
   
  <div class="form-group">
     <tr><td>  <label for="email">Date Of Purchase</label></td>
      <td><input type="text" class="form-control" id="item_purchase_date" name="item_purchase_date" placeholder="YYYY/MM/DD" required></td></tr>
    </div>
  
    <br>
   
   
   
   
      
    <br>
    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="addNewInventoryRequest();">Add Inventory</button></center></th></tr></table>
  </form>

 
 
     </div>

 
       

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">check in</h4>
      <div id="updateemp"></div>
        </div>
        <div class="modal-body">
          
 <br>
       <center>
<div id="checkinrequest"></div> 
 <center> <table class="table">
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
    $sql2 = "select * from checkout_item";
      

  if($result1 = mysqli_query($conn, $sql2)){
      if(mysqli_num_rows($result1) > 0){
      
          
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
        echo "<td>" . $row['set_status'] . "</td>";
        echo '<td><select id="set_status'.$n.'"></option><option>not returned </option></option><option>returned</option></select></td>';
        echo "<td><input type='button' onclick = 'setStatus(checkout_idd".$n.".value,set_status".$n.".value);'  value='Update'></td>";
                   
  $n++;
  }
echo "</tr></tbody></table></center>";
   
          
      } else{
          echo "No items you have taken.";
      } 
  }

    ?> 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> CHECKOUT FORM</h4>
      <div id="updateemp"></div>
        </div>
        <div class="modal-body">
       
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
     <tr><td>  <label for="email">Item Name</label></td>
      <td><input type="text" class="form-control" id="checkout_item_name" name="checkout_item_name" placeholder="Please Enter Item name" required></td></tr>
    </div><BR>
   <div class="form-group">
     <tr><td>  <label for="email">Item Type</label></td>
      <td><select class="form-control"   id="checkout_item_type" name="checkout_item_type" onchange="getNames_Qrcode(this.value);">
    <option value="0">Select</option>
        <option>Monitors</option>
        <option>HDD AND RAM</option>
        <option>Samples</option>
           <option>Laptops</option>
            <option>Printers</option>
                     
                       
      </select></td></tr>
    </div>
 <div class="form-group">
    <tr><td>  <label for="name">select the qrcode</label></td>  <td> <select class="form-control"  id="item_qrcode1" name="item_qrcode1" required readonly>
      
        
     </select></td></tr>
    </div>
    <div class="form-group">
     <tr><td>  <label for="email">Descrption</label></td>
      <td><input type="text" class="form-control" id="checkout_item_desc" name="checkout_item_desc" placeholder="Please Enter item descption" required></td></tr>
    </div>
  
    <br>
    
    <br>
   
    <br>
    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="checkoutRequest();">Send Request</button></center></th></tr></table>
  </form>
</div>

 <center> <table class="table">
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
    $sql2 = "select * from checkout_item where req_sent_by='$login_session'";
      

  if($result1 = mysqli_query($conn, $sql2)){
      if(mysqli_num_rows($result1) > 0){
      
          
       $j=1;  
         

  while($row = mysqli_fetch_array($result1)){
                
                  echo "<tbody>";
                  echo "<tr class=''>";
                 
                 echo "<td>" . $row['checkout_id'] . "</td>";
                 echo "<td>" . $row['item_name'] . "</td>";
                 echo "<td>" . $row['item_type'] . "</td>";
              
        echo "<td>" . $row['item_desc'] . "</td>";
    echo ' <input type="hidden" class="border" id="checkout_id'.$j.'" value='.$row['checkout_id'].' readonly>'; 
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
    
 <center> <table class="table">
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
                  <th>delete</th> 
                    
                    
                  </thead>
              </tr>

        <br>
<?php
    $sql2 = "select * from checkout_item";
      

  if($result1 = mysqli_query($conn, $sql2)){
      if(mysqli_num_rows($result1) > 0){
      
          
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
        echo '<td><select id="approval1'.$m.'"></option><option>not granted </option></option><option>granted</option></select></td>';
        echo "<td><input type='button' onclick = 'setApproval1(checkout_id".$m.".value,approval1".$m.".value);'  value='Update'></td>";
            echo "<td><input type='button' onclick = 'delete_list(checkout_id".$m.".value);'  value='delete'></td>";          
  $m++;
  }
echo "</tr></tbody></table></center>";
   
          
      } else{
          echo "No items you have taken.";
      } 
  }

    ?> 
  <?php } ?>
  
</div>

     <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </div>
    </div>
  </div>




<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Request equipment</h4>
    
        </div>
        <div class="modal-body">
         
<div id="addrequisition" class="succ_fail_margin"></div>
    <form method="post" id="requisitionform" class="addemp">
  <table class="table">
       

 <div class="form-group">
     <tr><td>  <label for="email">Item Name</label></td>
      <td><input type="text" class="form-control" id="item_name_equip" name="item_name_equip" placeholder="Please Enter Item name" required></td></tr>
    </div><BR>
   <div class="form-group">
     <tr><td>  <label for="email">Item Type</label></td>
      <td><select class="form-control"   id="item_type_equip" name="item_type_equip">
    <option value="0">Select</option>
        <option>Monitors</option>
        <option>Flash drive</option>
        <option>HDD AND RAM</option>
        <option>Samples</option>
          <option>SD and MicrocardSD</option>
           <option>Laptops</option>
            <option>Keyboards</option>
              <option>Mice</option>
                <option>Table lamps</option>
                  <option>Multi plugs</option>
                    <option>Printers</option>
                       <option>Tablet/ipad</option>
                         <option>Camera</option>
      </select></td></tr>
    </div>
    <div class="form-group">
     <tr><td>  <label for="email">Descrption</label></td>
      <td><input type="text" class="form-control" id="item_desc_equip" name="item_desc_equip" placeholder="Please Enter item descption" required></td></tr>
    </div>
  
    <br>
    
    <br>
   
   
   
   
      
    <br>
    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="requisitionRequest()">Send Request</button></center></th></tr></table>
  </form>

 
 
     </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Allotment</h4>
      <div id="updateemp"></div>
        </div>
        <div class="modal-body">
         
       
<div id="inventoryallot1" class="succ_fail_margin"></div>
    <form method="post" id="inventoryallotform" class="addemp">
  <table class="table">
       
 
<div class="form-group">
    <tr><td>  <label for="name">select the item name</label></td>  <td> <select class="form-control"  id="item_name_allot" name="item_name_allot" required onchange="getNames_Qr2(this.value);">
      <option value="0">Select item name</option>
       <?php 
$sql = mysqli_query($conn, "SELECT distinct item_name FROM inventory");
while ($row = $sql->fetch_assoc()){
echo "<option>" . $row['item_name'] . "</option>";
}
?>
     </select></td></tr>
    </div>
  
    <div class="form-group">
    <tr><td>  <label for="name">select the qrcode</label></td>  <td> <select class="form-control"  id="item_qrcode2" name="item_qrcode2" required readonly>
      
        
     </select></td></tr>
    </div>
  <br>
   <div class="form-group">
    <tr><td>  <label for="name">select the name</label></td>  <td> <select class="form-control"  id="username1" name="username1" required>
       <option value="0">Select item name</option>
       <?php 
$sql = mysqli_query($conn, "SELECT first_name FROM register");
while ($row = $sql->fetch_assoc()){
echo "<option>" . $row['first_name'] . "</option>";
}
?>
     </select></td></tr>
    </div>
   
      <div class="form-group">
     <tr><td>  <label for="email">Date Of Issue</label></td>
      <td><input type="text" class="form-control" id="item_checked_date1" name="item_checked_date1" placeholder="YYYY/MM/DD" required></td></tr>
    </div>
   
   
   
   
      
    <br>
    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="inventotyAllotment()">Submit</button></center></th></tr></table>
  </form>

 
 
     </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>





 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="item_checked_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="item_purchase_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="item_checked_date1"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>


<script type="text/javascript">
    $(document).ready(function(){
    function Display_Load()
    {
        $("#load").fadeIn(1000,0);
        $("#load").html("<img src='load.gif' />");
    }
    function Hide_Load()
    {
        $("#load").fadeOut('slow');
    };
    $("#paginate li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
    Display_Load();
    $("#content").load("pagination.php?page=1", Hide_Load());
    $("#paginate li").click(function(){
        Display_Load();
        $("#paginate li")
        .css({'border' : 'solid #193d81 1px'})
        .css({'color' : '#0063DC'});
        $(this)
        .css({'color' : '#FF0084'})
        .css({'border' : 'none'});
        var pageNum = this.id;
        $("#content").load("pagination.php?page=" + pageNum, Hide_Load());
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
    function Display_Load1()
    {
        $("#load").fadeIn(1000,0);
        $("#load").html("<img src='load.gif' />");
    }
    function Hide_Load()
    {
        $("#load").fadeOut('slow');
    };
    $("#paginate1 li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
    Display_Load1();
    $("#content1").load("pagination1.php?page=1", Hide_Load());
    $("#paginate1 li").click(function(){
        Display_Load1();
        $("#paginate1 li")
        .css({'border' : 'solid #193d81 1px'})
        .css({'color' : '#0063DC'});
        $(this)
        .css({'color' : '#FF0084'})
        .css({'border' : 'none'});
        var pageNum = this.id;
        $("#content1").load("pagination1.php?page=" + pageNum, Hide_Load());
    });
});
</script>
  
<script type="text/javascript">
    $(document).ready(function(){
    function Display_Load1()
    {
        $("#load").fadeIn(1000,0);
        $("#load").html("<img src='load.gif' />");
    }
    function Hide_Load()
    {
        $("#load").fadeOut('slow');
    };
    $("#paginate2 li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
    Display_Load1();
    $("#content2").load("paginationallot.php?page=1", Hide_Load());
    $("#paginate2 li").click(function(){
        Display_Load1();
        $("#paginate2 li")
        .css({'border' : 'solid #193d81 1px'})
        .css({'color' : '#0063DC'});
        $(this)
        .css({'color' : '#FF0084'})
        .css({'border' : 'none'});
        var pageNum = this.id;
        $("#content2").load("paginationallot.php?page=" + pageNum, Hide_Load());
    });
});
</script>
<div class="modal fade" id="mymodal_edit" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">edit inventory</h4>
     
        </div>
        <div class="modal-body">

       <div id="inventory_edit" class="succ_fail_margin"></div>
    <form method="post" id="inventoryeditform" class="addemp">
 <table class="table">
       
 <div class="form-group">
     <tr><td>  <label for="email">Item Name</label></td>
      <td><input type="text" class="form-control" id="item_name_edit" name="item_name_edit" placeholder="Please Enter item type" required></td></tr>
    </div>
<div class="form-group">
     <tr><td>  <label for="sel1">Item type</label></td>
      <td><input type="text" class="form-control" id="item_type_edit" name="item_type_edit" placeholder="Please Enter item type" required></td></tr>
      
    
    </div><BR>
      <div class="form-group">
     <tr><td>  <label for="email">QR CODE</label></td>
      <td><input type="text" class="form-control" id="item_qrcode_edit" name="item_qrcode_edit" placeholder="Please Enter item QR code" required></td></tr>
    </div>
   
    <div class="form-group">
     <tr><td>  <label for="email"> Item Descrption</label></td>
      <td><input type="text" class="form-control" id="item_desc_edit" name="item_desc_edit" placeholder="Please Enter item descption" required></td></tr>
    </div>
    <br>
   <input type="hidden" name="edit_id" id="edit_id">
  <div class="form-group">
     <tr><td>  <label for="email">Item Price</label></td>
      <td><input type="number" class="form-control" id="item_price_edit" name="item_price_edit" placeholder="Please Enter item Price" required onkeypress="return isNumberKey(event)"></td></tr>
    </div>
   
  <div class="form-group">
     <tr><td>  <label for="email">Date Of Purchase</label></td>
      <td><input type="text" class="form-control" id="item_purchase_date_edit" name="item_purchase_date_edit" placeholder="YYYY/MM/DD" required></td></tr>
    </div>
  
    <br>
   
   
   
   
      
    <br>
    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="addNewInventoryedit();">Edit Inventory</button></center></th></tr></table>
  </form>
  
  
 
 
     </div>
    
 <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




</body>
</html>















