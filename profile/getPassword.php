<?php

include('../session.php');
include('../logger.php');
include('../database.php');
$num = $_POST['num'];
$module_name="Profile";

switch ($num) {
    case "1":
        $password = $_POST['password'];
        $encoded = encryptIt($password);
// Create conection

        
        
        $sql = "UPDATE register SET emp_password='$encoded' WHERE emp_id='$login_emp_id'";

        if ($con->query($sql) === TRUE) {
            echo "<b class='success'>password changed successfully</b>";
        } else {
            echo "Error updating record: " . $con->error;
        }

        $con->close();
        break;
    case "2":
        $password = $_POST['password'];
        $cpass=encryptIt($password);
        $getpassword = "";

         

        $result = mysqli_query($con, "SELECT emp_password FROM `register` where emp_password='$cpass' and emp_id='$login_emp_id'");
        if (!$result) {
            echo 'Could not run query: ';
            exit;
        }

        $row = mysqli_fetch_row($result);

        $getpassword = $row[0];
        $encoded = decryptIt($getpassword);
        echo $encoded;
        $con->close();
        break;
         case "3":
        $subject = $_POST['subject'];
        $message = $_POST['message'];
       $today=date("Y/m/d h:i:sa");
        $sql = "INSERT INTO hr_message (msg_id,subject,message,send_by,emp_id,date)
VALUES ('','$subject','$message','$login_session','$login_emp_id','$today')";
        if ($con->query($sql) === TRUE) {
            // echo "<b class='success'>Message send successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " account  added by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            echo "error";
            //echo "<b class='error'>Could not send plz check your database</b>";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not message] \r\n";
            logToFile("../app-error.log", $str);
        }

        $con->close();
        break;
         case "4":
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
array_map('unlink', glob($directoryName."/*"));

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
    
        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "profile changed successfully  " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
         header('Location:index.php');
    } else {
        //echo "<b class='error'>Your vote already had submitted.</b>";
    
        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][not uploaded] \r\n";
        logToFile("../app-error.log", $str);
         header('Location:index.php');
    }
}
$con->close();
        break;
        case "5":
    
                                $result = mysqli_query($con, "SELECT userImage_path,emp_id FROM `profile_upload` WHERE emp_id='$login_emp_id'");
                              $result1 = mysqli_query($con, "SELECT emp_ranking,date_of_birth,emp_mob,emp_personal_mailid,emp_dept from `register` WHERE emp_id='$login_emp_id'");
                                if (!$result) {
                                    echo 'Could not run query: ';
                                    exit;
                                }
                                   $emp_name=$login_session;
                                   $emp_desig=$login_emp_desig;
								  

                                $row = mysqli_fetch_row($result);
                                $row1 = mysqli_fetch_row($result1);
                                $emp_ranking=$row1[0];
								$date_of_birth=$row1[1];
								$emp_mob=$row1[2];
								$emp_personal_mailid=$row1[3];
								$emp_dept=$row1[4];
								 
								
                                $userImage_path = $row[0];
                                if($userImage_path=="")
                                {
                                    $userImage_path="../images/profile/profile.png";
                                }
                                $emp_id = $row[1];
    

                                $users_arr[] = array(
                                    "path" => $userImage_path,
                                    "emp_id" => $emp_id,
                                    "emp_desig" => $emp_desig,
                                        "emp_name" => $emp_name,
                                      "emp_ranking" => $emp_ranking,
									   "date_of_birth" => $date_of_birth,
									   "emp_mob" => $emp_mob,
									    "emp_personal_mailid" => $emp_personal_mailid,
										"emp_dept" => $emp_dept,
                                );
                                echo json_encode($users_arr);

                                break;
								 case "6":
        $result = mysqli_query($con, "SELECT * FROM `register` WHERE emp_id='$login_emp_id'");
                                if (!$result) {
                                    echo 'Could not run query: ';
                                    exit;
                                }

                                $row = mysqli_fetch_row($result);
                                
                                $users_arr[] = array(
                                    "first_name" => $row[1],
                                    "last_name" => $row[2],
                                    "date_of_birth" => $row[3],
									"emp_gender" => $row[4],
									"emp_mob" => $row[5],
									"emp_desig" => $row[6],
									"emp_personal_mailid" => $row[7],
									"emp_username" => $row[8],
									"emp_type" => $row[10],
									"emp_dept" => $row[11],
									"emp_id" => $row[12],
									"emp_address" => $row[13],
									"emp_access_type" => $row[19],
									"emp_ranking" => $row[20],
									"emp_city" => $row[14],
									"emp_state" => $row[15],
									"emp_pincode" => $row[16],
									"emp_blood_group" => $row[17],
									"emp_joining_date" => $row[18],
									 
                                );
                                echo json_encode($users_arr);
        break;
		case "7":
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $emp_mob = $_POST['emp_mob'];
        $emp_desig = $_POST['emp_desig'];
        $emp_personal_mailid = $_POST['emp_personal_mailid'];
        $emp_username = $_POST['emp_office_mailid'];

        $emp_gender = $_POST['emp_gender'];
        $emp_type = $_POST['emp_type'];
        $emp_dept = $_POST['emp_dept'];
        $emp_access_type = $_POST['emp_access_type'];
        $emp_id = $_POST['emp_id'];
        $emp_address = $_POST['emp_address'];
        $emp_city = $_POST['emp_city'];
        $emp_state = $_POST['emp_state'];
        $emp_pincode = $_POST['emp_pincode'];
        $emp_blood_group = $_POST['emp_blood_group'];
        $emp_joining_date = $_POST['emp_joining_date'];
        $emp_ranking = $_POST['emp_ranking'];
        
        $sql = "update register set first_name='$first_name',last_name='$last_name',date_of_birth='$date_of_birth',emp_gender='$emp_gender'
 ,emp_mob='$emp_mob',emp_desig='$emp_desig',emp_personal_mailid='$emp_personal_mailid',emp_username='$emp_username',emp_type='$emp_type',
emp_dept='$emp_dept',emp_id='$emp_id',emp_address='$emp_address',emp_city='$emp_city',emp_state='$emp_state',emp_pincode='$emp_pincode'
,emp_blood_group='$emp_blood_group',emp_joining_date='$emp_joining_date',emp_access_type='$emp_access_type',emp_ranking='$emp_ranking' where emp_id='$login_emp_id'";
        if ($con->query($sql) === TRUE) {
            //echo "<b class='success'>Employee update successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " account updated by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            //echo "<b class='error'>please check your emp id</b>";
            echo "error";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not update account] \r\n";
            logToFile("../app-error.log", $str);
        }

        break;

    default:
        echo "you went wrong";
}
?>