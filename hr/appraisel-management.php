<?php
include('../session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HR-Appraisel Management</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/it-request.css">
		<link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../images/Artifact.ico">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/hr.js"></script> 
        <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
            rel="stylesheet">
        <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
            rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         

    </head>
    <body>




    <body onload="appraiselInit();">
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
                        <a href="../meeting"><i class="fa fa-sticky-note"></i>  Meeting Notes</a>
                    </li>
                   
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        

    </div>
        <div class="container">
            <div class="page-header">

                <form>

                   
                       
                        <?php
                        if ($user_type == "admin" && $user_type = "manager") {
                            ?>



                       
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p class="it-font-text">
                                    <strong>Self Appraisel</strong><br><i class="fa fa-sellsy it-font" aria-hidden="true" aria-hidden="true" data-toggle="modal" data-target="#myModal" onclick="getPersonlDetails();"></i>
                                </p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p class="it-font-text">
                                    <strong>Manager Appraisel</strong><br><i class="fa fa-bar-chart it-font" aria-hidden="true" data-toggle="modal" data-target="#uploadresume" onclick="getmangerDetails();" ></i></p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p class="it-font-text">
                                    <strong>360 Degree Appraisel</strong><br><i class="fa fa-circle it-font" aria-hidden="true" data-toggle="modal" data-target="#hrmodelappraisel" onclick="get360Details();"></i></p>
                            </div>


                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br><br><br><input type="text" name="search" class="search_form_text" placeholder="Search" onkeyup="getAppraiselHistory(this.value, 0, 5);">

                        </div>

                        <?php
                    } else {
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><p class="it-font-text">
                                <strong>Self Appraisel</strong><br><i class="fa fa-sellsy it-font" aria-hidden="true" aria-hidden="true" data-toggle="modal" data-target="#myModal" onclick="getPersonlDetails();"></i>
                            </p>
                        </div>
                        <?php
                    }
                    ?>

                </form>

            </div><div id="itrequest" class="succ_fail_margin"></div>	
            <br><br>
            <center>
        </div><div class="container">
            <div id="autofetch"></div> 

        </div>

        <div class="container">

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Self Appraisel</h4>
                            <div id="selfappraisel"></div>

                            <form method="post" id="additrequestform" class="addemp">
                                <table class="table">
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Name</label></td>
                                            <td><input type="text" class="form-control" id="self_emp_name" name="self_emp_name" placeholder="Employee Name" readonly></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Designation</label></td>
                                            <td><input type="text" class="form-control" id="self_emp_desig" name="self_emp_desig" placeholder="Employee Designation" readonly></td></tr>
                                    </div>  
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Department</label></td>
                                            <td><input type="text" class="form-control" id="self_emp_dept" name="self_emp_dept" placeholder="Employee Department" readonly></td></tr>
                                    </div>  

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Total Points</label></td>
                                            <td><input type="text" class="form-control" id="self_emp_total" name="self_emp_total" value="100" readonly></td></tr>
                                    </div> 
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Please Rate Yourself</label></td>
                                            <td><input type="number" class="form-control" id="self_emp_rating" name="self_emp_rating" placeholder="Employee Rating" onkeypress="return isNumberKey(event)"></td></tr>
                                    </div> 	


                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Date Of posting</label></td>
                                            <td><input type="date" class="form-control" id="self_date_of_posting" name="self_date_of_posting" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div> 


                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info"  onclick="selfRatingAppraisel();">Self Appraisel</button>
                                    </center></th></tr></table>
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
            
            <div class="modal fade" id="uploadresume" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title">Manager Appraisel</h4>

                            <div id="managerappraisel"></div>

                            <form method="post" id="additrequestform" class="addemp">
                                <table class="table">
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Id</label></td>
                                            <td> <select class="form-control"  id="ma_emp_id" name="ma_emp_id" onchange="getEmployeeName(this.value);">
                                                     
                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Name</label></td>
                                            <td><input type="text" class="form-control" id="ma_emp_name" name="ma_emp_name" placeholder="Employee Name" readonly></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Department</label></td>
                                            <td><input type="text" class="form-control" id="ma_emp_dept" name="ma_emp_dept" placeholder="Employee Department" readonly></td></tr>
                                    </div>  

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Total Points</label></td>
                                            <td><input type="text" class="form-control" id="ma_emp_total" name="ma_emp_total" value="100" readonly></td></tr>
                                    </div> 
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Please Rate Yourself</label></td>
                                            <td><input type="number" class="form-control" id="ma_emp_rating" name="ma_emp_rating" placeholder="Employee Rating" onkeypress="return isNumberKey(event)"></td></tr>
                                    </div> 	


                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Date Of posting</label></td>
                                            <td><input type="date" class="form-control" id="ma_date_of_posting" name="ma_date_of_posting" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div> 


                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info"  onclick="ManagerRatingAppraisel();">Manager Appraisel</button>
                                    </center></th></tr></table>
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
            <?php
            $result = mysqli_query($con, "SELECT emp_dept FROM `register` WHERE emp_id='$login_emp_id'");


            $row = mysqli_fetch_row($result);

            $emp_dept = $row[0];
            ?>
            <div class="modal fade" id="hrmodelappraisel" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title">360 Degree Appraisel</h4>

                            <div id="hrppraisel"></div>

                            <form method="post" id="additrequestform" class="addemp">
                                <table class="table">
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Id</label></td>
                                            <td> <select class="form-control"  id="hr_emp_id" name="hr_emp_id" onchange="getEmpData(this.value);">
                                                    
                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Name</label></td>
                                            <td><input type="text" class="form-control" id="hr_emp_name" name="hr_emp_name" placeholder="Employee Name" readonly></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Designation</label></td>
                                            <td><input type="text" class="form-control" id="hr_emp_desig" name="hr_emp_desig" placeholder="Employee Designation"  readonly></td></tr>
                                    </div> 

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Employee Department</label></td>
                                            <td><input type="text" class="form-control" id="hr_emp_dept" name="hr_emp_dept" placeholder="Employee Department" readonly></td></tr>
                                    </div>  

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Total Points</label></td>
                                            <td><input type="text" class="form-control" id="hr_emp_total" name="hr_emp_total" value="100" readonly></td></tr>
                                    </div> 
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Please Rate Yourself</label></td>
                                            <td><input type="number" class="form-control" id="hr_emp_rating" name="hr_emp_rating" placeholder="Employee Rating" onkeypress="return isNumberKey(event)"></td></tr>
                                    </div> 	


                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Date Of posting</label></td>
                                            <td><input type="date" class="form-control" id="hr_date_of_posting" name="hr_date_of_posting" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div> 


                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info"  onclick="hrRatingAppraisel();">360 Degree Appraisel</button>
                                    </center></th></tr></table>
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

            <div class="modal fade" id="chart_modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Candidate Performace Charts</h4>
                            <div id="canranking"></div>

                            <div class="col-lg-4"> 
                                <div id="piechart" style="width:400px; height: 250px;"></div> 
                            </div>

                            <div class="col-lg-4"> 
                                <div id="piechart1" style="width:400px; height: 250px;"></div> 
                            </div>

                            <div class="col-lg-4"> 
                                <div id="piechart2" style="width:400px; height: 250px;"></div> 
                            </div>


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
                                        $(document).ready(function () {
                                            var date_input = $('input[type="date"]'); //our date input has the name "date"
                                            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                                            date_input.datepicker({
                                                format: 'yyyy-mm-dd',
                                                container: container,
                                                todayHighlight: true,
                                                autoclose: true,
                                            })
                                        })
        </script>
    </body>
</html>
