<?php include( '../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Support</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/it-request.css">
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <?php
        $Resolved = "";
        $Accepted = "";
        $Reject = "";
        $initiated = "";
        $noreq = "";
        $n = strcmp($user_type, "admin");
        if ($n == 0) {
            $sql = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='Resolved'");
            $sql1 = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='Accept'");
            $sql2 = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='Reject'");
            $sql3 = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='request initiated'");
        } else {
            $sql = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='Resolved' and req_by='$login_session'");
            $sql1 = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='Accept' and req_by='$login_session'");
            $sql2 = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='Reject' and req_by='$login_session'");
            $sql3 = mysqli_query($con, "SELECT count(req_status)FROM `it_request` WHERE req_status='request initiated' and req_by='$login_session'");
        }


        while ($row = $sql->fetch_assoc()) {
            $Resolved = $row['count(req_status)'];
        }

        while ($row1 = $sql1->fetch_assoc()) {
            $Accepted = $row1['count(req_status)'];
        }

        while ($row2 = $sql2->fetch_assoc()) {
            $Reject = $row2['count(req_status)'];
        }

        while ($row3 = $sql3->fetch_assoc()) {
            $initiated = $row3['count(req_status)'];
        }
        if ($Resolved == "0" && $Accepted == "0" && $Reject == "0" && $initiated == "0") {
            $noreq = "1";
        } else {
            $noreq = "0";
        }
        ?>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var one = '', two = '', three = '', four = '', five = '';
                one =<?php echo $Resolved ?>;
                two =<?php echo $Reject ?>;
                three =<?php echo $Accepted ?>;
                four =<?php echo $initiated ?>;
                five =<?php echo $noreq ?>;

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Resolved', one],

                    ['Reject', two],
                    ['Accepted', three],
                    ['Initiated', four],
                    ['No Request Found', five]
                ]);

                var options = {
                    title: 'IT Request'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>

</head>

<body onload="getItData('', 0, 5)";>

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
					 <li class="active">
                        <a href=""><i class="fa fa-desktop"></i>  IT Support</a>
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
 

                <div class="row">
                     <div class="col-l-6 col-md-6 col-sm-6 col-xs-6"><p class="it-font-text">
                                <a href="../index.php">	</a></p>

                        </div>
                
<?php
$n = strcmp($user_type, "admin");
if ($n == 0) {
    ?>


                    <div class="col-md-12 col-sm-12 col-xs-12 col-sm-12"><p class="it-font-text">
                            <strong>Request Type</strong><br><i class="fa fa-keyboard-o it-font" aria-hidden="true" data-toggle="modal" data-target="#myModal1"></i></p>

                    </div>
                    <div class="col-lg-12"><center>
                            <div id="piechart" class="chart"></div></center>
                    </div>


                    <div class="row">
					<p class="it-font-text">
                                <strong>All</strong>&nbsp;<i class="fa fa-list-ul font-awesome-icon" aria-hidden="true" onclick="getItData('', 0, 5);"></i> 
                                  <strong>Urgent</strong>&nbsp;<i class="fa fa-first-order font-awesome-icon" aria-hidden="true" onclick="getItData('urgent', 0, 5);"></i> 
                                 <strong>High</strong>&nbsp;<i class="fa fa-long-arrow-up font-awesome-icon" aria-hidden="true" onclick="getItData('high', 0, 5);"></i> 
                                 <strong>Medium</strong>&nbsp;<i class="fa fa-medium font-awesome-icon" aria-hidden="true" onclick="getItData('medium', 0, 5);"></i> 
                                 <strong>Low</strong>&nbsp;<i class="fa fa-long-arrow-down font-awesome-icon" aria-hidden="true" onclick="getItData('low', 0, 5);"></i></p>
                       

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br><br><br><input type="text" name="search" class="search_form_text" placeholder="Search" onkeyup="getItData(this.value, 0, 5);">

                    </div>

    <?php
} else {
    ?>
                    <div class="row">
                        <div class="col-md-6"><p class="it-font-text">
                                <strong>User Request</strong><br><i class="fa fa-exclamation-triangle it-font" aria-hidden="true" data-toggle="modal" data-target="#myModal"></i></p>
                        </div>
                        <div class="col-lg-12"><center>
                                <div id="piechart" style="width: 900px; height: 500px;"></div></center>
                        </div>

                    </div>	
<?php } ?>

            

            <div id="itrequest" class="succ_fail_margin"></div>	
            <br><br>
            <center></div>
        </div></div>
        <div class="container">
            <div id="autofetch"></div> 
        </div>


        <div class="container">

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">User Request</h4>
                            <div id="addit"></div>

                            <form method="post" id="additrequestform" class="addemp">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Request Type</label></td>
                                            <td><select class="form-control"   id="req_type" name="req_type">
                                                    <option value="0">Select</option>
<?php
$sql = mysqli_query($con, "SELECT request_type FROM it_request_type");
while ($row = $sql->fetch_assoc()) {
    echo "<option>" . $row['request_type'] . "</option>";
}
?>
                                                </select></td></tr>


                                    </div><BR>


                                    <div class="form-group">
                                        <tr><td>  <label for="email">Request Descrption</label></td>
                                            <td><textarea   class="form-control" id="req_desc" name="req_desc" placeholder="Please Enter request descption" required></textarea></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Request Priority</label></td>
                                            <td><select class="form-control"   id="req_priority" name="req_priority">
                                                    <option value="0">Select</option>
                                                    <option>low</option>
                                                    <option>medium</option>
                                                    <option>high</option>
                                                    <option>urgent</option>
                                                </select></td></tr>


                                    </div>
                                    <br>

                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="addItRequest();">Send Request</button>&nbsp;&nbsp;<button type="reset" class="btn btn-info" >Reset</button></center></th></tr></table>
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

                            <h4 class="modal-title">Add Request Type</h4>

                            <div id="addrequisition1"></div>
                            <form method="post" id="requisitionform1" class="addemp">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="email">It request type</label></td>
                                            <td><input type="text" class="form-control" id="it_item_type" name="it_item_type" placeholder="Please Enter Item name" required></td></tr>
                                    </div><BR>

                                    <br>


                                    <br>
                                    <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="itrequisitionRequest();">Send Request</button></center></th></tr></table>
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

            <div class="modal fade" id="escalation_modal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="escalation_req"></div>
                            <ul class="nav nav-tabs">
                                <div class="row">
                                    <div class="col-md-6"><p class="it-font-text"><strong>Internal Escalation</strong><br>
                                            <a data-toggle="tab" href="#home"><i class="fa fa-sign-in it-font" aria-hidden="true"></i></a></p>
                                    </div>
                                    <div class="col-md-6"><p class="it-font-text"><strong>External Escalation</strong><br>
                                            <a data-toggle="tab" href="#menu1"><i class="fa fa-sign-out it-font" aria-hidden="true"></i></a></p>
                                    </div>
                                </div>


                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">

                                    <form method="post" id="requisitionform1" class="addemp">
                                        <table class="table">


                                            <div class="form-group">
                                                <tr><td>  <label for="email">It request type</label></td>
                                                    <td><input type="text" class="form-control" id="req_typein" name="req_typein" readonly></td></tr>
                                            </div><BR>
                                            <div class="form-group">
                                                <tr><td>  <label for="email">Send By</label></td>
                                                    <td><input type="text" class="form-control" id="send_byin" name="send_byin" readonly></td></tr>
                                            </div><BR>
                                            <div class="form-group">
                                                <tr><td>  <label for="email">Comment</label></td>
                                                    <td><textarea  class="form-control" id="escalation_commentin" name="escalation_commentin" placeholder="Please Enter Item name" required></textarea></td></tr>
                                            </div><BR>
                                            <div class="form-group">
                                                <tr><td>  <label for="email">Send to</label></td>
                                                    <td><select class="form-control"  id="send_toin" name="send_toin">
                                                            <option value="0">Select</option>
<?php
$sql = mysqli_query($con, "SELECT 	emp_username FROM register where emp_access_type='admin'");
while ($row = $sql->fetch_assoc()) {

    echo "<option>" . $row['emp_username'] . "</option>";
}
?>
                                                        </select></td></tr>
                                            </div><BR>


                                            <br>


                                            <br>
                                            <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="escalationRequest();">Send Mail</button></center></th></tr></table>
                                    </form>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <form method="post" id="requisitionform1">
                                        <table class="table">


                                            <div class="form-group">
                                                <tr><td>  <label for="email">It request type</label></td>
                                                    <td><input type="text" class="form-control" id="req_typeex" name="req_typeex" readonly></td></tr>
                                            </div><BR>
                                            <div class="form-group">
                                                <tr><td>  <label for="email">Send By</label></td>
                                                    <td><input type="text" class="form-control" id="send_byex" name="send_byex" readonly></td></tr>
                                            </div><BR>
                                            <div class="form-group">
                                                <tr><td>  <label for="email">Comment</label></td>
                                                    <td><textarea  class="form-control" id="escalation_commentex" name="escalation_commentex" placeholder="Please Enter Item name" required></textarea></td></tr>
                                            </div><BR>
                                            <div class="form-group">
                                                <tr><td>  <label for="email">Send to</label></td>
                                                    <td><input type="text" class="form-control" id="send_toex" name="send_toex"></td></tr>
                                            </div><BR>


                                            <br>


                                            <br>
                                            <tr><th colspan="2"> <center><button type="button" class="btn btn-info" id="submit" onclick="escalationRequest1();">Send Request</button></center></th></tr></table>
                                    </form>
                                </div>

                            </div>




                        </div>




                    </div>

                </div>
            </div>
        </div>
      </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../js/it-request.js"></script> 
 

</body>

</html>
