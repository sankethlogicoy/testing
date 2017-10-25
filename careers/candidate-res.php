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
   <style>
   .file-input-wrapper {
            height: 35px;
            overflow: hidden;
            position: absolute;
            width: 123px;
            background-color: #fff;
            cursor: pointer;
        }
   </style>

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
                        <a href="admin.php"><i class="fa fa-laptop"></i>  Careers</a>
                    </li>
					
					 
                   
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        

 <div id="page-wrapper">
	
    <div class="container-fluid">
       <div class="container">
	<div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
			<?php
		 $candidate_id = $_GET['id'];
        $result = mysqli_query($con, "select inter_result,test_result,hr_result from candidate_interview where candidate_id='$candidate_id'");
			

        $row = mysqli_fetch_row($result);
        $one = $row[0];
		$two = $row[1];
		$three = $row[2];
		 
		if($one!=""&& $two!=""&& $three!="")
		{
		?>
                <li class="disabled" ><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Interaction</p>
                </a></li>
                <li  class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Test</p>
                </a></li>
                <li class="disabled" ><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">HR Round</p>
                </a></li>
                
                <li class="active" ><a href="#step-4">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Final Result</p>
                </a></li>
				<?php
		}
		else if($one!=""&& $two!="")
		{
			?>
                <li class="disabled"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Interaction</p>
                </a></li>
                <li class="disabled" ><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Test</p>
                </a></li>
                <li  class="active"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">HR Round</p>
                </a></li>
                
                <li class="disabled"  ><a href="#step-4">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Final Result</p>
                </a></li>
				<?php
		}
		 else if($one!="")
		{
			?>
                <li class="disabled"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Interaction</p>
                </a></li>
                <li  class="active" ><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Test</p>
                </a></li>
                <li class="disabled" ><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">HR Round</p>
                </a></li>
                
                <li  class="disabled"><a href="#step-4">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Final Result</p>
                </a></li>
				<?php
		}
		else
		{
			?>
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Interaction</p>
                </a></li>
                <li class="disabled" ><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Test</p>
                </a></li>
                <li  class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">HR Round</p>
                </a></li>
                
                <li class="disabled" ><a href="#step-4">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Final Result</p>
                </a></li>
				<?php
				
		}?>
			
                
            </ul>
        </div>
	</div>
 <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> Interaction</h1>
                
                
<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
		    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                           
                           
                             
                       
                        <div class="modal-body">
 
                            <form method="post" id="update" action="candidate-insert.php"  class="addemp">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="First Name">Name</label></td>
                                            <td><input type="text" class="form-control" id="inter_username" name="inter_username" placeholder="Candidate Name" required ></td></tr>
                                    </div>
                                  

                                   
                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Interaction Mode</label></td>
                                            <td>
											<div class="radio">
											  <label><input type="radio"   name="inter_mode" value="telephonic" required>Telephonic</label>
											   <label><input type="radio"   name="inter_mode" value="videocall" required>Video Call</label>
											    <label><input type="radio"  name="inter_mode" value="personal" required>Personal</label>
											</div>
											 
											</td></tr>
                                    </div>
									
									
                                    <input type="hidden" class="form-control" id="num" name="num" value="1">
									<input type="hidden" class="form-control" name="candidate_id" value="<?php echo $candidate_id; ?>">
                                    
 
                                     
                                  
                                    
                                   

                                    <div class="form-group">
                                        <tr><td>  <label for="Address">Feeedback</label></td>
                                            <td><textarea class="form-control" id="inter_feedback" name="inter_feedback" rows="5" placeholder="Feeedback"></textarea></td></tr>
                                    </div>
									
									 
                                     <div class="form-group">
                                        <tr><td>  <label for="Mobile">Result</label></td>
                                            <td>
											<div class="radio">
											  <label><input type="radio"   name="inter_result" value="reject" required>Reject</label>
											   <label><input type="radio"  name="inter_result" value="onhold" required>On Hold</label>
											    <label><input type="radio"   name="inter_result" value="good" required>Good</label>
											</div>
											 
											</td></tr>
                                    </div>
                                     
                                    

                                     
                                     
                                    


                                    <div class="form-group">
                                        <tr><th colspan="2"> <center><button type="submit" class="btn btn-info" >SUBMIT</button></center></th></tr></table>
                            </form>


                        </div>
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a> -->
</div>
 
                
                
               
            </div>
        </div>
    </div>
   <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> Test</h1>
                
                
<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
		    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                           
                           
                             
                       
                        <div class="modal-body">
 
                            <form method="post" id="update" action="candidate-insert.php"  class="addemp" enctype="multipart/form-data">
                                <table class="table">


                                   
                                  

                                   
                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Interaction Mode</label></td>
                                            <td>
											<div class="radio">
											  <label><input type="radio"   name="test_mode" value="telephonic" required>Telephonic</label>
											   <label><input type="radio"   name="test_mode" value="videocall" required>Video Call</label>
											    <label><input type="radio"   name="test_mode" value="personal" required>Personal</label>
											</div>
											 
											</td></tr>
                                    </div>
									<tr><td>  <label for="email">Total Marks</label></td>
                                            <td><input type="number" class="form-control" id="test_total_marks" name="test_total_marks" placeholder="Please Enter total marks" required></td></tr>
                                    
                                    <tr><td>  <label for="email">Marks Obtained </label></td>
                                            <td><input type="number" class="form-control" id="test_obtained_marks" name="test_obtained_marks" placeholder="Please Enter obtained marks" required></td></tr>

                                   
                                    <input type="hidden" class="form-control" id="inter_num" name="inter_num" value="2">
                                    
										<div class="form-group">
                                        <tr><td>  <label for="Mobile">Result</label></td>
                                            <td>
											<div class="radio">
											  <label><input type="radio"   name="test_result" value="good" required>Good</label>
											   <label><input type="radio"  name="test_result" value="verygood" required>Very Good</label>
											    <label><input type="radio"   name="test_result" value="average" required>Average</label>
												 <label><input type="radio"   name="test_result" value="poor" required>Poor</label>
											</div>
											 
											</td></tr>
                                    </div>
                                     
                                  <input type="hidden" class="form-control" id="num" name="num" value="2">
									<input type="hidden" class="form-control" name="candidate_id" value="<?php echo $candidate_id; ?>">
                                    
                                   

                                    <div class="form-group">
                                        <tr><td>  <label for="Address">Feeedback</label></td>
                                            <td><textarea class="form-control" id="test_feedback" name="test_feedback" rows="5" placeholder="Feeedback"></textarea></td></tr>
                                    </div>
									 
                                    
                                     
                                    

                                     
                                     
                                    


                                    <div class="form-group">
                                        <tr><th colspan="2"> <center><button type="submit" class="btn btn-info" >SUBMIT</button></center></th></tr></table>
                            </form>


                        </div>
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a> -->
</div>
 
                
                
               
            </div>
        </div>
    </div>
     <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> HR Round</h1>
                
                 
<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
		    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                           
                           
                             
                       
                        <div class="modal-body">
 
                            <form method="post" id="update" action="candidate-insert.php"  class="addemp" enctype="multipart/form-data">
                                <table class="table">

 

                                   
                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Interaction Mode</label></td>
                                            <td>
											<div class="radio">
											  <label><input type="radio"  name="hr_mode" value="telephonic" required>Telephonic</label>
											   <label><input type="radio"   name="hr_mode" value="videocall" required>Video Call</label>
											    <label><input type="radio"   name="hr_mode" value="personal" required>Personal</label>
											</div>
											 
											</td></tr>
                                    </div>
									<div class="form-group">
                                        <tr><td>  <label for="Mobile">Result</label></td>
                                            <td>
											<div class="radio">
											  <label><input type="radio"   name="hr_result" value="good" required>Good</label>
											   <label><input type="radio"  name="hr_result" value="verygood" required>Very Good</label>
											    <label><input type="radio"   name="hr_result" value="average" required>Average</label>
												 <label><input type="radio"   name="hr_result" value="poor" required>Poor</label>
											</div>
											 
											</td></tr>
                                    </div>
									 
                                   
                                   <input type="hidden" class="form-control" id="num" name="num" value="3">
									<input type="hidden" class="form-control" name="candidate_id" value="<?php echo $candidate_id; ?>">
                                    
 
                                     
                                  
                                    
                                   

                                    <div class="form-group">
                                        <tr><td>  <label for="Address">Feeedback</label></td>
                                            <td><textarea class="form-control" id="hr_feedback" name="hr_feedback" rows="5" placeholder="Feeedback"></textarea></td></tr>
                                    </div>
									 
                                    
                                     
                                    

                                     
                                     
                                    


                                    <div class="form-group">
                                        <tr><th colspan="2"> <center><button type="submit" class="btn btn-info" >SUBMIT</button></center></th></tr></table>
                      


                        </div>
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a> -->
</div>
</form>
                
                 
            </div>
        </div>
    </div>
    
    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> Result</h1>
                
               
<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
		    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                           
                           
                             
                       
                        <div class="modal-body">
 
                        
 <div class="well">First Round  &nbsp; : &nbsp <?php echo $one; ?></div>
 <div class="well">Second Round&nbsp; : &nbsp;<?php echo $two; ?> </span> </div>
   <div class="well">HR Round  &nbsp; : &nbsp; <?php echo $three; ?> </span> </div>
   
	  
 


                        </div>
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="btn btn-danger pull-right">Delete Row</a> -->
</div>
 
                
                
                
            </div>
        </div>
    </div>
    `
</div>
 
    </div>
	</div>
	</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script>
 
// Activate Next Step

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
});


// Add , Dlelete row dynamically

     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});

 </script>

</body>

</html>
