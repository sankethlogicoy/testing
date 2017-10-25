<?php
 include('../database.php');
 
 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
		
 
		 if($_FILES["file"]["size"] > 0)
		 {
			  $file = file($filename);
		 
		unset($file[(count($file)-1)]);
		 
      $file = implode("\n", $file);
		  	$file = fopen($filename, "r");
			 $con->query('TRUNCATE employeeinfo;');
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
              
			  
	           $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date,salary1,quarter1,salary2,quarter2,salary3,quarter3,salary4,quarter4) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."'
				   ,'".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."')";
                   $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	
function get_all_records(){
    
    $Sql = "SELECT * FROM employeeinfo";
    $result = mysqli_query($con, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Registration Date</th>
						  <th>Salary Date</th>
                        </tr></thead><tbody>";
 
 
     while($row = mysqli_fetch_assoc($result)) {
 
         echo "<tr><td>" . $row['emp_id']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td>
                   <td>" . $row['email']."</td>
                   <td>" . $row['reg_date']."</td>
				   <td>" . $row['salary']."</td>
				   </tr>";  
				   
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}	
 
 
 ?>