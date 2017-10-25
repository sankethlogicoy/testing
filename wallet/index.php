<?php include( '../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wallet</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet" href="../css/it-request.css">
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
    <style>
            #wallet_receipt
            {
                display:none;
            }

        </style>

</head>

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
					 <li class="active">
                        <a href=""><i class="fa fa-fw fa fa-money"></i> Wallet</a>
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
            <div class="page-header">


            </div>
            <div id="itrequest"></div>
            <div class="row">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="it-font-text">Your Wallet Balance is 
                        <i class="fa fa-inr rupee" aria-hidden="true"><?php echo $total ?></i> </p>
                </div>

            </div>

            <?php
            $n = strcmp($user_type, "admin");
            if ($n == 0) {
                ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p class="it-font-text"><br><br>
                            <strong>Deduct Money</strong><br><i class="fa fa-minus-circle it-font" aria-hidden="true" data-toggle="modal" data-target="#myModal3"></i></p>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p class="it-font-text"><br><br>
                            <strong>Add Money</strong><br><i class="fa fa-plus-circle it-font" aria-hidden="true" data-toggle="modal" data-target="#myModal2"></i></p>

                    </div>
                </div><hr>
				<div class="col-lg-12">
                        <center><br><br><br><br>
                            <div id="getchart"></div>
                            <?php
                            include('getchart.php');
                            ?>

                        </center>
                    </div>
 <div class="container">

                <br><br><br><input type="text" name="search" class="search_form_text" placeholder="Search by names" onkeyup="getWalletHistory(this.value);">     <center>
                <?php
                } else {
                    ?>
                     
                        <div class="col-lg-12">
                            <center>
    <?php
    include('getLinechart.php');
    ?></center>
                        </div>
                            <?php } ?>
                     
                     </div>
         
                    <div id="autofetch"></div>
               


         
        <div class="container">

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Receipt Details</h4>
                            <div id="updateuser" class="succ_fail_margin"></div>
                        </div>
                        <div class="modal-body">

                            <img src="cinqueterre.jpg" class="img-responsive" alt="Cinque Terre" id="src1">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Money</h4>
                            <form method="post" id="addmoneyform" class="addemp" enctype="multipart/form-data" action="addwallet.php" onsubmit="return addMoney();">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="name">select the name</label></td>  <td> <select class="form-control"  id="username" name="username" required>
                                                    <option value="0">Select</option>
<?php
$sql = mysqli_query($con, "SELECT distinct first_name FROM register");
while ($row = $sql->fetch_assoc()) {
    echo "<option>" . $row['first_name'] . "</option>";
}
?>
                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">amount to be add</label></td>
                                            <td><input type="text" class="form-control" name="amount" id="amount" onkeypress="return isNumberKey(event)"></td></tr>
                                    </div>

                                    <input type="hidden" class="form-control" placeholder="sign"  name="sign" id="sign" value="1"   required>
                                    <input type="file" class="form-control myfile" placeholder="file1"  name="file1" id="wallet_receipt" value=""></td></tr>
                                    </div>
                                    <br>

                                    <br>





                                    <br>
                                    <tr><th colspan="2"> <center><button type="submit" class="btn btn-info" id="submit">Send Request</button></center></th></tr></table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        

        <div class="container">

            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Deduct Money</h4>
                            <div id="diductmoey" class="succ_fail_margin"></div>

                            <form method="post" id="diductmoneyform" class="addemp" enctype="multipart/form-data" action="addwallet.php" onsubmit="return updateMoney();">

                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="name">select the name</label></td>  <td> <select class="form-control"  id="username1" name="username" required onchange="getMoney(this.value);">
                                                    <option value="0">Select</option>
<?php
$sql = mysqli_query($con, "SELECT distinct first_name FROM register");
while ($row = $sql->fetch_assoc()) {
    echo "<option>" . $row['first_name'] . "</option>";
}
?>
                                                </select></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">current balance is</label></td>
                                            <td><input type="text" class="form-control" required name="user_amount" id="user_amount" onkeypress="return isNumberKey(event)" readonly></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="email">amount to be deduct</label></td>
                                            <td><input type="text" class="form-control" placeholder="amount"  name="amount" id="amount1" onkeypress="return isNumberKey(event)">
                                                <input type="hidden" class="form-control" placeholder="sign"  name="sign" id="sign" value="-1"></td></tr>
                                    </div>
                                    <div class="form-group">
                                        <tr><td>  <label for="email">Receipt Upload</label></td>
                                            <td><input type="file" class="form-control" placeholder="file1"  name="file1" id="wallet_receipt1"></td></tr>
                                    </div>


                                    <br>
                                    <tr><th colspan="2"> <center><button type="submit" class="btn btn-info" id="update_but">Deduct Money</button></center></th></tr></table>
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
	</div>
	 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/wallet.js"></script> 
 

</body>

</html>
