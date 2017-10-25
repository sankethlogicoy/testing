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
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
   

</head>

<body>

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
                        <a href=""><i class="fa fa-users"></i>  HR</a>
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
        <br><br><br>

        <div class="row">
            <a href="employee-management.php" class="menu">
                <div class="col-sm-4">
                    <center> <img class="img-responsive myimage" src="../images/hr/employee.png" alt="Chania">
                        <h3 class="sub_txt">Employee Management</h3>
                    </center>
            </a>
            </div>
            <a href="https://ess.paybooks.in " class="menu" target="_blank">
                <div class="col-sm-4">
                    <center> <img class="img-responsive myimage" src="../images/hr/payroll.png" alt="Chania">
                        <h3 class="sub_txt">Payroll Management</h3>
                    </center>
            </a>
            </div>
            <a href="https://ess.paybooks.in " class="menu" target="_blank">
                <div class="col-sm-4">
                    <center> <img class="img-responsive myimage" src="../images/hr/attendence.png" alt="Chania">
                        <h3 class="sub_txt">Attendance Management</h3>
                    </center>
            </a>
            </div>
            <a href="recruitment-management.php" class="menu">
                <div class="col-sm-4">
                    <br>
                    <br>
                    <br>
                    <center> <img class="img-responsive myimage" src="../images/hr/recruitment.png" alt="Chania">
                        <h3 class="sub_txt">Recruitment Management</h3>
                    </center>
            </a>
            </div>
            <a href="https://ess.paybooks.in " class="menu" target="_blank">
                <div class="col-sm-4">
                    <br>
                    <br>
                    <br>
                    <center> <img class="img-responsive myimage" src="../images/hr/leave.png" alt="Chania">
                        <h3 class="sub_txt">Leave Management</h3>
                    </center>
            </a>
            </div>
            <a href="appraisel-management.php" class="menu">
                <div class="col-sm-4">
                    <br>
                    <br>
                    <br>
                    <center> <img class="img-responsive myimage" src="../images/hr/appraisel.png" alt="Chania">
                        <h3 class="sub_txt">Appraisel Management</h3>
                    </center>
            </a>
            </div>

        </div>
    </div>
	</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

</body>

</html>
