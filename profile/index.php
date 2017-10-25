<?php include( '../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/it-request.css">
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
   

</head>

<body onload="profileInit();">

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
                   
                    <li >
                        <a href="../inventory"><i class="fa fa-fw fa-stack-exchange"></i> Inventory</a>
                    </li>
					 <li>
                        <a href="../wallet"><i class="fa fa-fw fa fa-money"></i> Wallet</a>
                    </li>
					 <li class="active">
                        <a href=""><i class="fa fa-user"></i>  Profile</a>
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
 
        

 
	<div class="container-fluid">
            <div class="page-header">

                <form>
                 
                    <div class="row">
                         <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Change Profile Picture</strong><br><i class="fa fa-picture-o it-font" aria-hidden="true" data-toggle="modal" data-target="#profilechange"></i></p>

                            </div>
                       
                            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Change Password</strong><br><i class="fa fa-key it-font" aria-hidden="true" data-toggle="modal" data-target="#passwordchange"></i></p>

                            </div>
                            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Talk to HR</strong><br><i class="fa fa-user it-font" aria-hidden="true" data-toggle="modal" data-target="#talktohr"></i></p>

                            </div>
							  <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Update Profile</strong><br><i class="fa fa-pencil-square it-font" aria-hidden="true"  onclick="fetchYourData();"></i></p>

                            </div>
                        </div> 
                       

                       

                    

                </form>

            </div><div id="itrequest" class="succ_fail_margin"></div>	
            <br><br>
            <center>
                <div id="deleteuser"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><a href="javascript:void(0);" data-toggle="modal" data-target="#zoom-image">
	<img src="../images/profile/profile.png" alt="dad" class="img_responsive round_img" align="middle" id="pfc_img"></a>
	<h1 class="center_txt"><span id="emp_name"></span></h1>
	<div class="detail_txt">
            <h2 class="individ_txt">EMPLOYEE ID:<span id="emp_id"></span></h2>
             
            <h2 class="individ_txt">EMP Rank:<span id="emp_ranking"></span></h2>
            
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
 <div class="well">Date Of Birth &nbsp; : &nbsp <span id="date_of_birth"></span></div>
 <div class="well">Phone No &nbsp; : &nbsp; <span id="emp_mob"></span> </div>
   <div class="well">Personal mail  &nbsp; : &nbsp;  <span id="emp_personal_mailid"></span> </div>
  <div class="well">Designation &nbsp; : &nbsp; <span id="emp_desig"></span></div>
	<div class="well">Department &nbsp; : &nbsp; <span id="emp_dept"></span></div>
	  
</div>
        </div> 
          <div class="container">
            

            <div class="modal fade" id="profilechange" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Paasword</h4>
                          <div id="profilefetch"></div>
                        </div>
                        <div class="modal-body">

                            <form method="post"  id="uploadForm" action="getPassword.php" onsubmit="return uploadPic();" enctype="multipart/form-data">
                               <table class="table">

                                    
                                   <div class="form-group">
                                       <tr><td>  <label for="email">Profile Picture Upload</label></td>
                                           <td><input type="file" class="form-control" placeholder="Profile Picture Upload"  name="resume" id="resume"></td></tr>
                                   </div>
                            <input type="hidden" class="form-control" id="num" name="num" placeholder="Please Enter password " value="4"> 
                                   <br>
                                   <tr><th colspan="2"> <center><button type="submit" class="btn btn-info" id="submit">Upload</button></center></th></tr></table>
                           </form>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="container">
		 <div class="modal fade" id="fetchModel" role="dialog">
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
                                            <td><input type="date" class="form-control" id="date_of_birth1" name="date_of_birth1" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Mobile Number</label></td>
                                            <td><input type="number" class="form-control" id="emp_mob1" name="emp_mob1" placeholder="Mobile Number" required></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="Personal Email Id">Personal Email Id</label></td>
                                            <td><input type="text" class="form-control" id="emp_personal_mailid1" name="emp_personal_mailid1" placeholder="Personal Email Id" required ></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Office Email Id">Office Email Id<br>/Username</label></td>
                                            <td><input type="text" class="form-control" id="emp_office_mailid1" name="emp_office_mailid1" placeholder="Office Email Id" disabled></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Designation">Designation</label></td>
                                            <td><input type="text" class="form-control" id="emp_desig1" name="emp_desig1" placeholder="Designation" disabled></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Type Of Gender</label></td>
                                            <td><select class="form-control"   id="emp_gender1" name="emp_gender1">
													 <option value="0">Select</option>
                                                    <option>Male</option>
                                                    <option>Female</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Type of employee </label></td>
                                            <td><select class="form-control"   id="emp_type1" name="emp_type1" disabled>

                                                    <option>partner</option>
                                                    <option>employee</option>
                                                    <option>intern</option>
                                                    <option>consultant</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Department</label></td>
                                            <td><select class="form-control"   id="emp_dept1" name="emp_dep1" disabled>

                                                    <option>Design</option>
                                                    <option>Dev</option>
                                                    <option>HR/Ops</option>
                                                    <option>BD & M</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Employee Access Type</label></td>
                                            <td><select class="form-control"   id="emp_access_type1" name="emp_access_type1" disabled>

                                                    <option>employee</option>
                                                    <option>admin</option>
                                                    <option>manager</osption>
                                                    <option>system admin</osption>
                                                    <option>HR</osption>

                                                </select></td></tr>


                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Employee ID"> Employee ID</label></td>
                                            <td><input type="text" class="form-control" id="emp_id1" name="emp_id1" disabled></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Employee ID"> Employee Ranking</label></td>
                                            <td><select class="form-control"   id="emp_ranking1" name="emp_ranking1" disabled>

                                                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                    <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option  value="10">10</option>


                                                </select></td></tr>
                                    </div>

                                    <div class="form-group">
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
													 <option value="0">Select</option>
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
                                            <td><input type="date" class="form-control" id="emp_joining_date1" name="emp_joining_date1" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div>

                                    


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
		</div>
        <div class="container">
            

            <div class="modal fade" id="passwordchange" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change Paasword</h4>
                          <div id="passwordfetch"></div>
                        </div>
                        <div class="modal-body">

                            <form method="post" id="changepasssform"  class="addemp">
                                <table class="table">
<div class="form-group">
     <tr><td>  <label for="email">Old Password</label></td>
      <td><input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Please Enter password" required onchange="getOldpassword(this.value);"></td></tr>
    </div>
                                    <div class="form-group">
     <tr><td>  <label for="email">Password</label></td>
      <td><input type="password" class="form-control" id="password" name="password" placeholder="Please Enter password" required></td></tr>
    </div>
                                    <div class="form-group">
     <tr><td>  <label for="email">Re-Password</label></td>
      <td><input type="password" class="form-control" id="password2" name="password2" placeholder="Please Enter re-password" required></td></tr>
    </div>
                                     <input type="hidden" class="form-control" id="oldpass" name="oldpass" placeholder="Please Enter re-password" required>

                                     

                                    <div class="form-group">
                                        <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit"onclick="changePassword()">Update Password</button></center></th></tr></table>
                            </form>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="talktohr" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Talk To HR</h4>
                        <div id="messageid"></div>
                    </div>
                    <div class="modal-body">
                        
                        <form method="post" id="messageform"  class="addemp">
                            <table class="table">
  <div class="form-group">
     <tr><td>  <label for="email">Subject</label></td>
      <td><input type="text" class="form-control" id="subject" name="subject" placeholder="Please subject" required></td></tr>
    </div>
                                    <div class="form-group">
     <tr><td>  <label for="email">Message</label></td>
         <td><textarea class="form-control" id="message" name="message" placeholder="Please Enter message" required rows="5"></textarea></td></tr>
    </div>
 



                                <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="sendMessage();">Send</button></center></th></tr></table>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
	<div class="container">

            <div class="modal fade" id="zoom-image" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Profile Picture</h4>
                            <div id="updateuser" class="succ_fail_margin"></div>
                        </div>
                        <div class="modal-body">

                            <img src="../images/hr.png" class="img-responsive" id="src1">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/profile.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 

</body>

</html>
