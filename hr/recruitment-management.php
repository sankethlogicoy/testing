<?php
include('../session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HR-Recruitement management</title>
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
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         

    </head>
    <body>




    <body onload="init();">
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

        

    </div>

        <div class="container">
            <div class="page-header">

                <form>

                    <div class="row">
                        
                        <?php
                        if ($user_type == "admin" && $user_type = "manager") {
                            ?>


                            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12"><p class="it-font-text">
                                    <strong>Add Tech</strong><br><i class="fa fa-keyboard-o it-font" aria-hidden="true" data-toggle="modal" data-target="#myModal1"></i></p>

                            </div>
                        
                            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Send Requirement</strong><br><i class="fa fa-registered it-font" aria-hidden="true" aria-hidden="true" data-toggle="modal" data-target="#myModal" onclick="getRequiremetid();"></i>
                                </p>
                            </div>

                            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Upload Resume</strong><br><i class="fa fa-upload it-font" aria-hidden="true" data-toggle="modal" data-target="#uploadresume" onclick="getResumedetails();"></i></p>
                            </div>
                            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Test</strong><br><i class="fa fa-pencil-square-o it-font" aria-hidden="true" data-toggle="modal" data-target="#test_modal" onclick="getTestUpdateFun();"></i></p>
                            </div>
                            <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                    <strong>Rating</strong><br><i class="fa fa-star it-font" aria-hidden="true" data-toggle="modal" data-target="#rating_modal" onclick="getRatingFun();"></i></p>
                            </div>

                        </div>
                        <!--<div class="col-md-12">
                    <br><br><br><input type="text" name="search" class="search_form_text" placeholder="Search" onkeyup="getRecruitementHistory(this.value,0,5);">
                    
                     </div>-->

                        <?php
                    } else {
                        ?>
                        <div class="col-md-3 col-md-3 col-sm-3 col-xs-3"><p class="it-font-text">
                                <strong>Rating</strong><br><i class="fa fa-star it-font" aria-hidden="true" data-toggle="modal" data-target="#rating_modal" onclick="getRatingFun();"></i></p>
                        </div>
                    <?php } ?>

                </form>

            </div><div id="stsusupdate" class="succ_fail_margin"></div>	
            <br><br><br><br>
            <center>
        </div>
        <div class="container">

            <ul class="nav nav-pills">
                <li class="active"><span class="history_style"><a data-toggle="pill" href="#history">CANDIDATE RESULT LIST &nbsp; &nbsp; |&nbsp; &nbsp;</a></span></li>
                <li><span class="history_style"><a data-toggle="pill" href="#requirementlist" onclick="getRecruitementList(0, 5);">REQUIREMENT LIST &nbsp; &nbsp; |&nbsp; &nbsp;</span></a></li>
                <li><span class="history_style"><a data-toggle="pill" href="#resumelist" onclick="getResumetList(0, 5);">RESUME LIST</span></a></li>

            </ul>

            <div class="tab-content"><br><br>
                <div id="history" class="tab-pane fade in active">
                    <input type="text" name="search" class="search_form_text" placeholder="Search" onkeyup="getRecruitementHistory(this.value, 0, 5);">
                    <div id="autofetch"></div> 
                </div>
                <div id="requirementlist" class="tab-pane fade">

                    <div id="recruitefetch"></div> 
                </div>
                <div id="resumelist" class="tab-pane fade">

                    <div id="resumefetch"></div> 
                </div>


            </div>
        </div>

       
        <div class="container">

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
						
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Recruitment Request</h4>
                            <div id="sendrecruitmentreq"></div>

                            <form method="post" id="additrequestform" class="addemp">
                                <table class="table">
                                    <div class="form-group">
                                        <tr><td>  <label for="Department">Depatment</label></td>
                                            <td><select class="form-control"   id="dept_name" name="dept_name" onchange="getDeptList(this.value)";>
                                                    <option value='0'>Select</option>
                                                    <option>Development</option>
                                                    <option>Design</option>
                                                    <option>HR</option>
                                                    <option>office</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group" id="linktonewtech">
                                        <tr><td>  <label for="name">Select Tech name</label></td>  <td> <select class="form-control"  id="tech_name" name="tech_name">


                                                </select></td></tr>
                                    </div>
                                    <div class="form-group" id="linktonewtech">
                                        <tr><td>  <label for="name">Requirement Id</label></td>  <td> <input type="text" class="form-control"  id="requirement_id" name="requirement_id" readonly>


                                            </td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="Designation">Skill Set</label></td>
                                            <td><textarea   class="form-control" id="skill_set" name="skill_set" placeholder="Skill Set" required></textarea></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Date Of posting</label></td>
                                            <td><input type="text" class="form-control" id="date_of_posting" name="date_of_posting" placeholder="YYYY/MM/DD" required></td></tr>
                                    </div> 


                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info"  onclick="requestNewRecruitement();">Send Recruitement Request</button>
                                        &nbsp;&nbsp;<button type="reset" class="btn btn-info" >Reset</button></center></th></tr></table>
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

            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title">Add New Tech</h4>

                            <div id="addtech"></div>
                            <form method="post" id="addnewtech" class="addemp">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="Department">Select Depatment</label></td>
                                            <td><select class="form-control"   id="rec_dept" name="rec_dept">
                                                    <option value='0'>Select</option>
                                                    <option>Development</option>
                                                    <option>Design</option>
                                                    <option>HR</option>
                                                    <option>office</option>

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Enter new Tech</label></td>
                                            <td><input type="text" class="form-control" id="rec_newtech" name="rec_newtech" placeholder="Please Enter new tech" required></td></tr>
                                    </div><BR>

                                    <br>


                                    <br>
                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="addRecruitNewTech();">Add Tech</button></center></th></tr></table>
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

                            <h4 class="modal-title">Resume Upload</h4>


                            <form method="post" id="resumeform">
                                <div id="resumeups1"></div>
                                <table class="table">
                                    <p id="res"></p>

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Enter Candidate Name</label></td>
                                            <td><input type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Please Enter candidate name"></td></tr>
                                    </div><BR>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Candidate IT</label></td>
                                            <td><input type="text" class="form-control" id="candidate_id" name="candidate_id"  readonly></td></tr>
                                    </div><BR>
                                    <div class="form-group">
                                        <tr><td>  <label for="name">select requirement id</label></td>  <td> <select class="form-control"  id="requirement_id1"  name="requirement_id1" required>


                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="name">select the Refferel name</label></td>  <td> <select class="form-control"  id="reffered_by"  name="reffered_by" required>

                                                </select></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="email">Resume Upload/paste Google drive path</label></td>
                                            <td><textarea   class="form-control" id="resume" name="resume" placeholder="Google drive path" required></textarea>
                                            </td></tr>
                                    </div>

                                    <br>
                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="resumevalidate();">Submit</button></center></th></tr></table>
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

            <div class="modal fade" id="test_modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Test Update</h4>
                            <div id="testentry"></div>

                            <form method="post" id="testentryform" class="addemp">
                                <table class="table">
                                    <div class="form-group">
                                        <tr><td>  <label for="name">select candidate id</label></td>  <td> <select class="form-control"  id="candidate_id1" name="candidate_id1" onchange="getCandidateName(this.value);">

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Candidate Name</label></td>
                                            <td><input type="text" class="form-control" id="candidate_name1" name="candidate_name1" placeholder="Please Enter candidate name" readonly></td></tr>
                                    </div><BR>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Total Marks</label></td>
                                            <td><input type="text" class="form-control" id="total_marks" name="total_marks" placeholder="Please Enter total marks"></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Marks Obtained </label></td>
                                            <td><input type="text" class="form-control" id="obtained_marks" name="obtained_marks" placeholder="Please Enter obtained marks"></td></tr>
                                    </div>	



                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info"  onclick="addTestEntry();">Submit</button>
                                        &nbsp;&nbsp;<button type="reset" class="btn btn-info" >Reset</button></center></th></tr></table>
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

            <div class="modal fade" id="rating_modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Rating</h4>
                            <div id="canranking"></div>

                            <form method="post" id="canrankingform" class="addemp">
                                <table class="table">
                                    <div class="form-group">
                                        <tr><td>  <label for="name">select candidate id</label></td>  <td> <select class="form-control"  id="candidate_id2" name="candidate_id2" onchange="getCandidateNamerating(this.value);">

                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Candidate Name</label></td>
                                            <td><input type="text" class="form-control" id="candidate_name2" name="candidate_name2" placeholder="Please Enter candidate name" readonly></td></tr>
                                    </div><BR>

                                    <div class="form-group">
                                        <tr><td>  <label for="Employee ID"> Candidate Ranking</label></td>
                                            <td><select class="form-control"   id="candidate_ranking" name="candidate_ranking">

                                                    <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                    <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option  value="10">10</option>


                                                </select></td></tr>
                                    </div>



                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info"  onclick="addRating();">Vote</button>
                                        &nbsp;&nbsp;<button type="reset" class="btn btn-info" >Reset</button></center></th></tr></table>
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
                                            var date_input = $('input[name="date_of_posting"]'); //our date input has the name "date"
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
