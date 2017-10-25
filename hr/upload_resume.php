<?php

include('../session.php');
include('../logger.php');
 
$module_name = "HR module";
$candidate_name = $_POST['candidate_name'];
$candidate_id = $_POST['candidate_id'];
$reffered_by = $_POST['reffered_by'];
$requirement_id = $_POST['requirement_id'];
$resume = $_POST['resume'];
$sql = "INSERT INTO resume_upload (resume_id,candidate_name,resume_path,candidate_id,reffered_by,requirement_id)
					VALUES ('','$candidate_name','$resume','$candidate_id','$reffered_by','$requirement_id')";

if ($con->query($sql) === TRUE) {
    echo "<b class='success'>Profile Submited  successfully</b>";
    
    
    $str = "[" . $login_session . "][" . $module_name . "]uploaded by " . $login_session . "\r\n";
    logToFile("../app-success.log", $str);
} else {
    echo "<b class='error'>Could not submit profile</b>";
    echo "error";
    $str = "[" . $login_session . "][" . $module_name . "][resume upload " . $login_session . "\r\n";
    logToFile("../app-error.log", $str);
}
?>

