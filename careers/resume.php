<?php

 
include('../database.php');
 
// Define $username and $password
        $username = $_POST['username'];
        $mobile_no = $_POST['mobile_no'];
        $personal_mailid = $_POST['personal_mailid'];
	    $exp_year = $_POST['exp_year'];
		$exp_month = $_POST['exp_month'];
		$portfolio_link = $_POST['portfolio_link'];
		$file_name = $_FILES['file1']['name'];
$file_size = $_FILES['file1']['size'];
$file_tmp = $_FILES['file1']['tmp_name'];
$file_type = $_FILES['file1']['type'];


$expensions = array(
    "jpeg",
    "jpg",
    "png",
	 "doc",
    "pdf"
);
$today = date("Y-m-d");
$today_time = date("h:i:sa");
$file_namee = $username . "-" . $today . "-" . $file_name;
if (!is_dir("../images/resume/")) {
    //Directory does not exist, so lets create it.
    mkdir("../images/resume/", 0755, true);
}
if ($file_size > 2097152) {
    $errors[] = 'File size must be excately 2 MB';
}

if (empty($errors) == true) {

    move_uploaded_file($file_tmp, "../images/resume/" . $file_namee);
}
$sql = "INSERT INTO candiate_resume (res_id,username,mobile_no,personal_mailid,exp_year,exp_month,portfolio_link,file_path)
					VALUES ('','$username', '$mobile_no','$personal_mailid','$exp_year','$exp_month','$portfolio_link','../images/resume/$file_namee')";

    if ($con->query($sql) === TRUE) {
      
	  ?>
	  <script>
	  alert("resume uploaded sucessfully");
	  window.location="index.php";
	  </script>
	  <?php
    } else {
		
          ?>
	  <script>
	  alert("please try again");
	  window.location="index.php";
	  </script>
	  <?php
    }
	mysqli_close($con); // Closing Connection
 

?>