 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atifact Careers</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/sb-admin.css" rel="stylesheet">
 <link rel="stylesheet" href="../css/custom.css">
     
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
         rel="stylesheet">
		 <style>
		 .sel1{
			 width: 50%;
			 display: inline;
		 }
   </style>

</head>

<body>

    <div id="wrapper">

        


	
    <div class="container-fluid">
       
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                           
                            <h4 class="modal-title">Atifact Careers</h4>
                             
                       
                        <div class="modal-body">
 
                            <form method="post" id="update" action="resume.php"  class="addemp" enctype="multipart/form-data">
                                <table class="table">


                                    <div class="form-group">
                                        <tr><td>  <label for="First Name">Name</label></td>
                                            <td><input type="text" class="form-control" id="username" name="username" placeholder="Name" required ></td></tr>
                                    </div>
                                  

                                   
                                    <div class="form-group">
                                        <tr><td>  <label for="Mobile">Mobile Number</label></td>
                                            <td><input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number" maxlength="10" required></td></tr>
                                    </div>

                                    <div class="form-group">
                                        <tr><td>  <label for="Personal Email Id">Personal Email Id</label></td>
                                            <td><input type="email" class="form-control" id="personal_mailid" name="personal_mailid" placeholder="Personal Email Id" required ></td></tr>
                                    </div>
                                    
                                    
 
                                    <div class="form-group">
                                        <tr><td>  <label for="sel1">Exp In year and month</label></td>
                                            <td><select class="form-control sel1"   id="exp_year" name="exp_year" required>
 <option value="">None</option> <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                    <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option  value="10">10</option>


                                                </select><select class="form-control sel1"   id="exp_month" name="exp_month" required>
 <option value="">None</option> <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                 <option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option  value="10">10</option>
												 <option  value="11">11</option>

                                                </select></td></tr>
                                    </div>
                                  
                                    
                                   

                                    <div class="form-group">
                                        <tr><td>  <label for="Address">Portfolio Link</label></td>
                                            <td><textarea class="form-control" id="portfolio_link" name="portfolio_link" rows="5" placeholder="Employee Address" required></textarea></td></tr>
                                    </div>
									 <div class="form-group">
                                        <tr><td>  <label for="email">Resume Upload</label></td>
                                            <td><input type="file" class="form-control" placeholder="file1"  name="file1" id="file1" required></td></tr>
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
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

</body>

</html>
