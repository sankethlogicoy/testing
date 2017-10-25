    <?php
include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventory allocation list </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
   <link rel="icon" type="image/x-icon" href="../images/Artifact.ico">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../js/inventory-val.js"></script> 
       <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
            rel="stylesheet">
</head>
<body onload="getAllocationName('')";>

<div class="container">
<div class="page-header">
   
<h3>Employee update <b id="logout"><a href="../logout.php" class="logout-session">Log out</a>  </b></h3>    
  </div>

<a href="../index.php"><button type="button" class="btn btn-info button">Home</button></a><a href="index.php"><button type="button" class="btn btn-info button">Task Management</button></a>
 
     <br /><br /><br />
   
<form>
  <input type="text" name="search" class="search_form" placeholder="Search by employee id or by employee name" onkeyup="getAllocationName(this.value);"><button type="button" name="button" class="btn btn-info btn_emp" data-toggle="modal" data-target="#myModal2">Add Employee</button>
</form>
  
 </center>
<div id="autofetch">
 
      </div>
</div>

 

</body>
</html>
