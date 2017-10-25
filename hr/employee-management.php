<?php
include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HR-Employee Management</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/it-request.css">
		  <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../images/Artifact.ico">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
              rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    </head>
    <body>




    <body onload="getEmployees('', 0, 5)";>
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
                    <li>
                        <a href="../home"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li >
                        <a href="../inventory"><i class="fa fa-fw fa-stack-exchange"></i> Inventory</a>
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
					 <li class="active">
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
            <div class="page-header">

                <form>

                    <div class="row">
                       
                        <?php
                        $n = strcmp($user_type, "admin");
                        if ($n == 0) {
                            ?>


                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-6"><p class="it-font-text">
                                    <strong>Add Employee</strong><br><i class="fa fa-plus it-font" aria-hidden="true" data-toggle="modal" data-target="#myModal2" onclick="getEmpRecord();"></i></p>

                            </div>
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-6"><p class="it-font-text">
                                    <strong>History</strong><br><i class="fa fa-history it-font" aria-hidden="true" data-toggle="modal" data-target="#historyModal" onclick="getEmpHistory(0, 5);"></i></p>

                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <center>
                                <?php
                                include('getranking.php');
                                ?></center>
                        </div>

                        <div class="col-md-12">
                            <br><br><br><input type="text" name="search" class="search_form_text" placeholder="Search By Name" onkeyup="getEmployees(this.value, 0, 5);">

                        </div>

                    <?php }
                    ?>


                </form>

            </div><div id="itrequest" class="succ_fail_margin"></div>	
            <br><br>
            <center>
                <div id="deleteuser"></div>
        </div> 
        
            <div id="autofetch"></div> 

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Employee</h4>
                            <div id="updateuser" class="succ_fail_margin"></div>
                        </div>
                        <div class="modal-body">

                            <form method="post" id="update"  class="addemp">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="First Name">First Name</label></td>
                                            <td><input type="text" class="form-control" id="first_name1" name="first_name1" placeholder="First Name" required ></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Last Name">Last Name</label></td>
                                            <td><input type="text" class="form-control" id="last_name2" name="last_name2" placeholder="Last Name" required></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Date Of Birth</label></td>
                                            <td><input type="text" class="form-control" id="date_of_birth1" name="date_of_birth1" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div>
                                    <!-- <div class="form-group">
                                        <tr><td>  <label for="Mobile">Mobile Number</label></td>
                                            <td><input type="number" class="form-control" id="emp_mob1" name="emp_mob1" placeholder="Mobile Number" required></td></tr>
                                    </div> -->

                                    <div class="form-group">
                                        <tr><td>  <label for="Personal Email Id">Personal Email Id</label></td>
                                            <td><input type="text" class="form-control" id="emp_personal_mailid1" name="emp_personal_mailid1" placeholder="Personal Email Id" required ></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Office Email Id">Office Email Id<br>/Username</label></td>
                                            <td><input type="text" class="form-control" id="emp_office_mailid1" name="emp_office_mailid1" placeholder="Office Email Id" required></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Designation">Designation</label></td>
                                            <td><input type="text" class="form-control" id="emp_desig1" name="emp_desig1" placeholder="Designation" required></td></tr>
                                    </div>

                                   <!--  <div class="form-group">
                                        <tr><td>  <label for="sel1">Type Of Gender</label></td>
                                            <td><select class="form-control"   id="emp_gender1" name="emp_gender1">

                                                    <option>Male</option>
                                                    <option>Female</option>

                                                </select></td></tr>
                                    </div> -->
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Employement</label></td>
                                            <td><select class="form-control"   id="emp_type1" name="emp_type1">

                                                    <option>partner</option>
                                                    <option>employee</option>
                                                    <option>intern</option>
                                                    <option>consultant</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Department</label></td>
                                            <td><select class="form-control"   id="emp_dept1" name="emp_dep1">

                                                    <option>Design</option>
                                                    <option>Dev</option>
                                                    <option>HR/Ops</option>
                                                    <option>BD & M</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Employee Access</label></td>
                                            <td><select class="form-control"   id="emp_access_type1" name="emp_access_type1">

                                                    <option>employee</option>
                                                    <option>admin</option>
                                                    <option>manager</osption>
                                                    <option>system admin</osption>
                                                    <option>HR</osption>

                                                </select></td></tr>


                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Employee ID"> Employee ID</label></td>
                                            <td><input type="text" class="form-control" id="emp_id1" name="emp_id1" readonly></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Employee ID"> Employee Ranking</label></td>
                                            <td><select class="form-control"   id="emp_ranking1" name="emp_ranking1">

                                                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                    <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option  value="10">10</option>


                                                </select></td></tr>
                                    </div>

                                    <!-- <div class="form-group">
                                        <tr><td>  <label for="Address">Employee Address</label></td>
                                            <td><input type="textarea" class="form-control" id="emp_address1" name="emp_address1" placeholder="Employee Address" required></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="City">City</label></td>
                                            <td><input type="text" class="form-control" id="emp_city1" name="emp_city1" placeholder="City" required></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="City">State</label></td>
                                            <td><input type="text" class="form-control" id="emp_state1" name="emp_state1" placeholder="State" required></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="PIN">PIN Code</label></td>
                                            <td><input type="number" class="form-control" id="emp_pincode1" name="emp_pincode1" placeholder="PIN code" required></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Blood Group</label></td>
                                            <td><select class="form-control"   id="emp_blood_group1" name="emp_blood_group1">

                                                    <option>A Positive</option>
                                                    <option>A Negative</option>
                                                    <option>A Unknown</option>
                                                    <option>B Positive</option>
                                                    <option>B Negative</option>
                                                    <option>B Unknown</option>
                                                    <option>AB Positive</option>
                                                    <option>AB Negative</option>
                                                    <option>AB Unknown</option>
                                                    <option>O Positive</option>
                                                    <option>O Negative</option>
                                                    <option>O Unknown</option>
                                                    <option>Unknown</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Date Of Joining">Date Of Joining</label></td>
                                            <td><input type="text" class="form-control" id="emp_joining_date1" name="emp_joining_date1" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div>
 -->
                                    <input type="hidden" class="form-control" id="login_id" name="login_id">


                                    <div class="form-group">
                                        <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="updateEmployee()">Update</button></center></th></tr></table>
                            </form>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Employee</h4>
                        <div id="updateemp"></div>
                    </div>
                    <div class="modal-body">
                        <div id="adduser"></div>
                        <form method="post" id="addform"  class="addemp">
                            <table class="table">


                                <div class="form-group">
                                    <tr><td>  <label for="First Name">First Name</label></td>
                                        <td><input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required></td></tr>
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="Last Name">Last Name</label></td>
                                        <td><input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required></td></tr>
                                </div>

                                <div class="form-group">
                                    <tr><td>  <label for="Mobile">Date Of Birth</label></td>
                                        <td><input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="YYYY/MM/DD" required></td></tr>
                                </div>
                                 
                                        <input type="hidden" class="form-control" id="emp_mob" name="emp_mob" placeholder="Mobile Number" value="0"> 
                                <div class="form-group">
                                    <tr><td>  <label for="Personal Email Id">Personal Email Id</label></td>
                                        <td><input type="text" class="form-control" id="emp_personal_mailid" name="emp_personal_mailid" placeholder="Personal Email Id" required ></td></tr>
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="Office Email Id">Office Email Id<br>/Username</label></td>
                                        <td><input type="text" class="form-control" id="emp_office_mailid" name="emp_office_mailid" placeholder="Office Email Id" required onchange="getPassword(this.value)";></td></tr>
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="Designation">Designation</label></td>
                                        <td><input type="text" class="form-control" id="emp_desig" name="emp_desig" placeholder="Designation" required></td></tr>
                                </div>

                                <div class="form-group">
                                    <tr><td>  <label for="Password">Password</label></td>
                                        <td><input type="password" class="form-control" id="emp_password" name="emp_password" READONLY></td></tr>
                                </div>
                                <!--  <select class="form-control"   id="emp_gender" name="emp_gender">
                                                <option value="0">Select</option>
                                                <option>Male</option>
                                                <option>Female</option>

                                            </select>  -->
                                             <input type="hidden" class="form-control" id="emp_gender" name="emp_gender" placeholder="Mobile Number" value="0"> 
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="sel1">Employement</label></td>
                                        <td><select class="form-control"   id="emp_type" name="emp_type">
                                                <option value="0">Select</option>
                                                <option>partner</option>
                                                <option>employee</option>
                                                <option>intern</option>
                                                <option>consultant</option>

                                            </select></td></tr>
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="sel1">Department</label></td>
                                        <td><select class="form-control"   id="emp_dept" name="emp_dept">
                                                <option value="0">Select</option>
                                                <option>Design</option>
                                                <option>Dev</option>
                                                <option>HR/Ops</option>
                                                <option>BD & M</option>

                                            </select></td></tr>
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="sel1">Employee Access</label></td>
                                        <td><select class="form-control"   id="emp_access_type" name="emp_access_type">
                                                <option value="0">Select</option>
                                                <option>employee</option>
                                                <option>admin</option>
                                                <option>manager</osption>
                                                <option>system admin</osption>
                                                <option>HR</osption>

                                            </select></td></tr>


                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="Employee ID"> Employee ID</label></td>
                                        <td><input type="text" class="form-control" id="emp_id" name="emp_id" onchange="getEmpid(this.value);" readonly></td></tr>
                                </div>
                                <div class="form-group">
                                    <tr><td>  <label for="Employee ID"> Employee Ranking</label></td>
                                        <td><select class="form-control"   id="emp_ranking" name="emp_ranking">

                                                <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option selected="selected" value="10">10</option>


                                            </select></td></tr>
                                </div>
                                 <input type="hidden" class="form-control" id="emp_address" name="emp_address" value="0"> <input type="hidden" class="form-control" id="emp_city" name="emp_city" placeholder="City" value="0"> <input type="hidden" class="form-control" id="emp_state" name="emp_state" placeholder="State" value="0"> <input type="hidden" class="form-control" id="emp_pincode" name="emp_pincode" placeholder="PIN code" maxlength="6" value="0"> <input type="hidden" class="form-control" id="emp_blood_group" name="emp_blood_group" placeholder="PIN code" maxlength="6" value="0">
                                          <input type="hidden" class="form-control" id="emp_joining_date" name="emp_joining_date" placeholder="YYYY/MM/DD" value="0"> 



                                <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="addUser()">submit</button></center></th></tr></table>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="container">

        <div class="modal fade" id="historyModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">


                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Employee History</h4>
                        <div id="active-user"></div>
                        <div id="empHistory"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/hr.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


</body>
</html>