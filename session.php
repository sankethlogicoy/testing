<?php

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include('database.php');
session_start(); // Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($con, "select * from register where emp_username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['first_name'];

$login_emp_desig = $row['emp_desig'];
$_SESSION['manager'] = $row['emp_access_type'];
$_SESSION['emp_id'] = $row['emp_id'];
$user_type = $_SESSION['manager'];
$login_emp_id = $_SESSION['emp_id'];
$ses_sql = mysqli_query($con, "select total from wallet where username='$login_session' ORDER BY wallet_id DESC LIMIT 0, 1");
$row = mysqli_fetch_assoc($ses_sql);
$_SESSION['wallet'] = $row['total'];
$total = $_SESSION['wallet'];
if ($total == 0) {
    $total = 0;
}

if (!isset($login_session)) {
    mysqli_close($con); // Closing Connection
    header('Location: ../index.php'); // Redirecting To Home Page
}
if($login_session==null || $login_session=="")
{
	header("location: ../index.php");
}
?>
