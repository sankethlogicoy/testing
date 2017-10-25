<?php include('../database.php'); 
include('../session.php');?>
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
					 <li >
                        <a href=""><i class="fa fa-users"></i>  HR</a>
                    </li>
					 <li>
                        <a href="../task"><i class="fa fa-tasks"></i>  Task Management</a>
                    </li>
					 <li class="active">
                        <a href=""><i class="fa fa-laptop"></i>  Careers</a>
                    </li>
					 
                   
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        

 <div id="page-wrapper">
	
    <div class="container-fluid">
       
<table class="table">
   <thead>
      <tr class="th_clr">
         <th>RESUME ID</th>
         <th>CANDIDATE NAME</th>
         <th>MOBILE NO</th>
         <th>MAIL ID</th>
         <th>EXPERIENCE IN YEARS</th>
         <th>PORTFOLIO LINK</th>
         <th>RESUME DOWNLOAD</th>
		 <th>STATUS</th>
          
   </thead>
   </tr>
   <br>
   <?php
   $select_table = "select * from candiate_resume";
      if ($result1 = mysqli_query($con, $select_table)) {
          if (mysqli_num_rows($result1) > 0) {
              
              
              $i = 1;
              
              while ($row = mysqli_fetch_array($result1)) {
                  
                  echo "<tbody>";
                  echo "<tr class=''>";
                  
                  echo "<td>" . $row['res_id'] . "</td>";
                  echo "<td>" . $row['username'] . "</td>";
				   echo "<td>" . $row['mobile_no'] . "</td>";
				    echo "<td>" . $row['personal_mailid'] . "</td>";
					 echo "<td>" . $row['exp_year'] . "." . $row['exp_month'] . "</td>";
					  echo "<td><a data-toggle='modal' href='" . $row['portfolio_link'] . "' target='_blank'>" . $row['portfolio_link'] . "</a></td>";
					   echo "<td><a data-toggle='modal' href='" . $row['file_path'] . "' target='_blank'>click here download</a></td>";
                   echo "<td><a   href='candidate-res.php?id=" . $row['res_id'] . "'>click</a></td>";
                  
                  
                  
                  
                  $i++;
              }
              echo "</tr></tbody></table> ";
              
              
          } else {
              echo "No items you have taken.";
          }
      }
      ?>
       
    </div>
	</div>
	</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

</body>

</html>
