<?php

include('../session.php');
include('../logger.php');
include('../database.php');
$module_name = "profile";

$file_name = $_FILES['resume']['name'];
$file_size = $_FILES['resume']['size'];
$file_tmp = $_FILES['resume']['tmp_name'];
$file_type = $_FILES['resume']['type'];


$expensions = array(
    "jpeg",
    "jpg",
    "png"
);
$filepath = "../images/profile/" . $login_session . "/" . $file_name;

$directoryName = "../images/profile/" . $login_session;

//Check if the directory already exists.
if (!is_dir($directoryName)) {
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755, true);
}

if ($file_size > 2097152) {
    $errors[] = 'File size must be excately 2 MB';
}


if (empty($errors) == true) {

    move_uploaded_file($file_tmp, $directoryName . "/" . $file_name);
}
$result = mysqli_query($con, "select emp_id from profile_upload where emp_id='$login_emp_id'");


$row = mysqli_fetch_row($result);

$data = $row[0];


if ($data == "") {

    $sql = "INSERT INTO profile_upload (profile_id,emp_id,userImage_path)
                    VALUES ('','$login_emp_id','$filepath')";

    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>Uploaded successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "]uploaded by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
        header('Location:index.php');
    } else {
        echo "<b class='error'>not uploaded</b>";
        $str = "[" . $login_session . "][" . $module_name . "][userImage upload " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }
} else {
    $sql1 = "update profile_upload set userImage_path='$filepath' where emp_id='$login_emp_id'";
    if ($con->query($sql1) === TRUE) {

        //echo "<b class='success'>Your vote has been updated successfully</b>";
        echo "update";
        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "profile changed successfully  " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        //echo "<b class='error'>Your vote already had submitted.</b>";
        echo "updated";
        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][not uploaded] \r\n";
        logToFile("../app-error.log", $str);
    }
}
$con->close();
?>