<?php include( '../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/custom.css">
  
      <link rel="stylesheet" href="../css/inventory.css">
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
   

</head>

<body  onload="init();">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand"><?php echo $login_session ?></span>
            </div>
			 <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
			 
                <ul class="nav navbar-nav side-nav">
                    
                    <li class="active">
                        <a href=""><i class="fa fa-fw fa-stack-exchange"></i> Inventory</a>
                    </li>
					 <li>
                        <a href="../wallet"><i class="fa fa-fw fa fa-money"></i> Wallet</a>
                    </li>
					 <li>
                        <a href="../profile"><i class="fa fa-user"></i>  Profile</a>
                    </li>
					 <li>
                        <a href="../it"><i class="fa fa-desktop"></i>  IT Support</a>
                    </li>
					 <li>
                        <a href="../hr"><i class="fa fa-users"></i>  HR</a>
                    </li>
					 <li>
                        <a href="../task"><i class="fa fa-tasks"></i>  Task Management</a>
                    </li>
					  <li>
                        <a href="../careers/admin.php"><i class="fa fa-laptop"></i>  Careers</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        


	  <div id="page-wrapper">

            <div class="container-fluid">
 
    <div class="container">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow:auto;overflow-y: hidden;">
           <center>
                <?php
                include('getchart.php');
                ?>
           </center>
      </div>
     
         <br>
         <br>
   <!--
   add new inventory,only for admin or system admin
   --> 
         <?php
        if($user_type=='admin' ||  $user_type== 'system admin')
        {
        ?>
         <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <center data-toggle="modal" data-target="#myModal2">
               <a href="#">
                  <h2 class="add_clrs">Add<br> New</h2>
                  <i class="fa fa-plus icon_clr" aria-hidden="true"></i>
               </a>
            </center>
         </div>
        <?php
         }
         ?>
    <!--
   check out modal,only for admin or system admin
   --> 
             <?php
        if($user_type=='admin' ||  $user_type== 'system admin')
        {
        ?>
         <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <center>
               <a href="#" data-toggle="modal" data-target="#myModal1">
                  <h2 class="add_clrs">Check <br>Out</h2>
                  <i class="fa fa-minus icon_clr" aria-hidden="true"></i>
               </a>
            </center>
         </div>
          <?php
         }
         ?>
     <!--
   check in modal,only for admin or system admin
   --> 

          <?php
        if($user_type=='admin' ||  $user_type== 'system admin')
        {
        ?>
         <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <center>
               <a href="#" data-toggle="modal" data-target="#myModal3">
                  <h2 class="add_clrs">Check<br> In</h2>
                  <i class="fa fa-plus icon_clr" aria-hidden="true"></i>
               </a>
            </center>
         </div>
           <?php
         }
         ?>
      <!--
   request equipment modal for all
   -->

          <?php
        if($user_type=='admin' ||  $user_type== 'system admin' || $user_type=='employee' || $user_type=='manager')
        {
        ?>
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <center>
               <a href="#" data-toggle="modal" data-target="#myModal4">
                  <h2 class="add_clrs">Request<br> Equipment</h2>
                  <i class="fa fa-square icon_clr" aria-hidden="true"></i>
               </a>
            </center>
         </div>
          <?php
         }
         ?>
        <!--
   check out modal for employee or manager
   -->
          <?php
        if($user_type=='employee' || $user_type=='manager')
        {
        ?>
         
         <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <center>
               <a href="#" data-toggle="modal" data-target="#myModal1">
                  <h2 class="add_clrs">Check <br>Out</h2>
                  <i class="fa fa-minus icon_clr" aria-hidden="true"></i>
               </a>
            </center>
         </div>
         <?php
         }
         ?>
        <!--
   request allocation modal for only employee or manager
   -->
         <?php
        if($user_type=='employee' || $user_type=='manager')
        {
        ?>
         
         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <center>
               <a href="#" data-toggle="modal" data-target="#myModal5">
                  <h2 class="add_clrs">Request<br>Allocation</h2>
                  <i class="fa fa-square icon_clr" aria-hidden="true"></i>
               </a>
            </center>
         </div>
         <?php
         }
         ?>
         <br>
         <br>
         <!--
         tabs in a row
         -->
         <nav>
            <ul class="nav nav-tabs tabs-text">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2 class="histor_list">
                     <a class="active" data-toggle="tab" href="#history">
                        <span class="history_style">
                           INVENTORY LIST
                        </span>
                     </a>
                     <span>|</span><a data-toggle="tab" href="#list" class="tabst"><span class="list_style">ALLOTMENT LIST</span></a><span>|</span> <a data-toggle="tab" href="#request_list"><span class="list_style">REQUEST LIST</span></a>
                  </h2>
                  </div>
            </ul>

         </nav>
        <!--
        tab content starts here
        -->
         <div class="tab-content">
         <!--
         history tab for inventory items
         -->
            <div id="history" class="tab-pane fade in active">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <input type="search" name="search" class="search_btn" id="mysearch" placeholder="search by item type" onkeyup="dash(this.value);">
                  </div>
               </div>
               <?php
                  $result3 = mysqli_query($con,"SELECT * FROM inventory");
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
            <!--
            allotment list
            -->
            <div id="list" class="tab-pane fade">
               <div id="updateallotrequest"></div>
               <br>
               <div id="delete_request1"></div>
               <?php
                  $n = strcmp($user_type, "admin");
                                if ($n == 0) {
                  $resultall = mysqli_query($con,"select * from inventoty_allotment,inventory where allotment_id=inventory_id");
                  $num_rowsall = mysqli_num_rows($resultall);
                  $pages_all=$num_rowsall/5;
                  $pages_all=ceil($pages_all);
                  }
                  ?>
               <?php
                  $n = strcmp($user_type, "employee");
                  if ($n == 0) {
                                      $resultall = mysqli_query($con,"select * from inventoty_allotment,inventory where add_by='$login_session' and allotment_id=inventory_id");
                  $num_rowsall = mysqli_num_rows($resultall);
                  $pages_all=$num_rowsall/5;
                  $pages_all=ceil($pages_all);
                  }
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
            </div>
            <!--
            new equipment list 
            -->
            <div id="request_list" class="tab-pane fade">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     <input type="search" name="search1" class="search_btn" placeholder="search by sent by names" id="mylistsearch" onkeyup="dash1(this.value);">
                  </div>
               </div>
               <?php  
                  $result4 = mysqli_query($con,"SELECT * FROM requisition_item");
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
         </div>
         <!--
         tabs content ends here
         -->
         <!--
         adding new inventory modal for admin
         -->
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
                              <tr>
                                 <td>  <label for="email">Item Name</label></td>
                                 <td><input type="text" class="form-control" id="item_type" name="item_type" placeholder="Please Enter item type" required></td>
                              </tr>
                           </div>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="sel1">Item type</label></td>
                                 <td>
                                    <select class="form-control"   id="item_name" name="item_name" onchange="getQRCode(this.value);">
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
                                    </select>
                                 </td>
                              </tr>
                           </div>
                           <BR>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email">QR CODE</label></td>
                                 <td><input type="text" class="form-control" id="item_qrcode" name="item_qrcode" placeholder="Please Enter item QR code" readonly required></td>
                              </tr>
                           </div>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email"> Item Descrption</label></td>
                                 <td><input type="text" class="form-control" id="item_desc" name="item_desc" placeholder="Please Enter item descption" required></td>
                              </tr>
                           </div>
                           <br>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email">Item Price</label></td>
                                 <td><input type="number" class="form-control" id="item_price" name="item_price" placeholder="Please Enter item Price" required onkeypress="return isNumberKey(event)"></td>
                              </tr>
                           </div>
                           <div class="form-group">
                              <tr>
                                 <td>  <label for="email">Date Of Purchase</label></td>
                                 <td><input type="text" class="form-control" id="item_purchase_date" name="item_purchase_date" placeholder="YYYY/MM/DD" required></td>
                              </tr>
                           </div>
                           <br>
                           <br>
                           <tr>
                              <th colspan="2">
                                 <center><button type="button" class="btn btn-info" id="submit" onclick="addNewInventoryRequest();">Add Inventory</button></center>
                              </th>
                           </tr>
                        </table>
                     </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
<!--
check in modal for admin
-->
      <div class="modal fade" id="myModal3" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">check in</h4>
                  <div id="updateemp"></div>
               </div>
               <div class="modal-body">
               <div id="recruitefetch"></div>
             
                     </div>

                 

                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
		 
      </div>
	   <div class="modal fade" id="UserList" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">User Graph</h4>
                  <div id="updateemp"></div>
               </div>
               <div class="modal-body">
              
             hello
                     </div>

                 

                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
      <!--
      check out modal both for admin and employee
      -->
      <div class="modal fade" id="myModal1" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> CHECKOUT FORM</h4>
                  <div id="updateemp"></div>
               </div>
               <div class="modal-body">
               <div id="checkout_pagi"></div>
                </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
 <!--
 request equipment modal for all
 -->
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
                           <tr>
                              <td>  <label for="email">Item Name</label></td>
                              <td><input type="text" class="form-control" id="item_name_equip" name="item_name_equip" placeholder="Please Enter Item name" required></td>
                           </tr>
                        </div>
                        <BR>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email">Item Type</label></td>
                              <td>
                                 <select class="form-control"   id="item_type_equip" name="item_type_equip">
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
                                 </select>
                              </td>
                           </tr>
                        </div>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email">Descrption</label></td>
                              <td><input type="text" class="form-control" id="item_desc_equip" name="item_desc_equip" placeholder="Please Enter item descption" required></td>
                           </tr>
                        </div>
                        <br>
                        <br>
                        <br>
                        <tr>
                           <th colspan="2">
                              <center><button type="button" class="btn btn-info" id="submit" onclick="requisitionRequest()">Send Request</button></center>
                           </th>
                        </tr>
                     </table>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
     <!--
     allotment request
     -->
      <div class="modal fade" id="myModal5" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Allotment</h4>
                  <div id="updateemp"></div>
               </div>
               <div class="modal-body">
                  <div id="delete_request2"></div>
                  <div id="inventoryallot1" class="succ_fail_margin"></div>
                  <form method="post" id="inventoryallotform" class="addemp">
                     <table class="table">
                        <div class="form-group">
                           <tr>
                              <td>  <label for="name">select the item name</label></td>
                              <td>
                                 <select class="form-control"  id="item_name_allot" name="item_name_allot" required onchange="getNames_Qr2(this.value);">
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
                              <td> <select class="form-control"  id="item_qrcode2" name="item_qrcode2" required readonly>
                                 </select>
                              </td>
                           </tr>
                        </div>
                        <br>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email">Date Of request</label></td>
                              <td><input type="text" class="form-control" id="item_checked_date1" name="item_checked_date1" placeholder="YYYY/MM/DD" required></td>
                           </tr>
                        </div>
                        <br>
                        <tr>
                           <th colspan="2">
                              <center><button type="button" class="btn btn-info" id="submit" onclick="inventotyAllotment()">Submit</button></center>
                           </th>
                        </tr>
                     </table>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!--
      inventory edition modal
      -->
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
                           <tr>
                              <td>  <label for="email">Item Name</label></td>
                              <td><input type="text" class="form-control" id="item_name_edit" name="item_name_edit" placeholder="Please Enter item type" required></td>
                           </tr>
                        </div>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="sel1">Item type</label></td>
                              <td><input type="text" class="form-control" id="item_type_edit" name="item_type_edit" placeholder="Please Enter item type" required></td>
                           </tr>
                        </div>
                        <BR>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email">QR CODE</label></td>
                              <td><input type="text" class="form-control" id="item_qrcode_edit" name="item_qrcode_edit" placeholder="Please Enter item QR code" required></td>
                           </tr>
                        </div>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email"> Item Descrption</label></td>
                              <td><input type="text" class="form-control" id="item_desc_edit" name="item_desc_edit" placeholder="Please Enter item descption" required></td>
                           </tr>
                        </div>
                        <br>
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email">Item Price</label></td>
                              <td><input type="number" class="form-control" id="item_price_edit" name="item_price_edit" placeholder="Please Enter item Price" required onkeypress="return isNumberKey(event)"></td>
                           </tr>
                        </div>
                        <div class="form-group">
                           <tr>
                              <td>  <label for="email">Date Of Purchase</label></td>
                              <td><input type="text" class="form-control" id="item_purchase_date_edit" name="item_purchase_date_edit" placeholder="YYYY/MM/DD" required></td>
                           </tr>
                        </div>
                        <br>
                        <br>
                        <tr>
                           <th colspan="2">
                              <center><button type="button" class="btn btn-info" id="submit" onclick="addNewInventoryedit();">Edit Inventory</button></center>
                           </th>
                        </tr>
                     </table>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
 
	      </div>
	   <div id="gen-graph"></div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
      <script type="text/javascript" src="../js/inventory-val.js"></script> 
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      <!--
      javascript date picker
      -->
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
      <script type="text/javascript" src="jquery.min.js"></script>
      <!--
      pagination for history tab along with search
      -->
      <script type="text/javascript">
         function dash(username)
         {
         
         
         if(username=='')
         {
          username='';
         }
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
          $("#content").load("pagination.php?page=1&username="+username, Hide_Load());
          $("#paginate li").click(function(){
              Display_Load();
              $("#paginate li")
              .css({'border' : 'solid #193d81 1px'})
              .css({'color' : '#0063DC'});
              $(this)
              .css({'color' : '#FF0084'})
              .css({'border' : 'none'});
              var pageNum = this.id;
              $("#content").load("pagination.php?page=" + pageNum+"&username="+username, Hide_Load());
          });
         }
      </script>
       <!--
      pagination for equipment request  tab along with search
      -->
      <script type="text/javascript">

         function dash1(username)
          {
           
           
           if(username=='')
           {
             username='';
           }
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
          $("#content1").load("pagination1.php?page=1&username="+username, Hide_Load());
          $("#paginate1 li").click(function(){
              Display_Load1();
              $("#paginate1 li")
              .css({'border' : 'solid #193d81 1px'})
              .css({'color' : '#0063DC'});
              $(this)
              .css({'color' : '#FF0084'})
              .css({'border' : 'none'});
              var pageNum = this.id;
              $("#content1").load("pagination1.php?page=" + pageNum+"&username="+username, Hide_Load());
          });
         }
      </script> 
         <!--
      pagination for allotment request  tab along with search
      --> 
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
 

</body>

</html>
