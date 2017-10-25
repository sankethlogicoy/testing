<?php

include('logger.php');
include('database.php');
date_default_timezone_set('Asia/Kolkata');
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "<br/>Username or Password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encoded = encryptIt($password);

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        
// To protect MySQL injection for Security purpose
// Selecting Database
        
        $module_name = "login module";
// SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($con, "select * from register where (emp_password='$encoded' AND emp_username='$username') and  flag=0");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
           //unset($_COOKIE['loggedout']);
            $str = "[" . $username . "][" . $module_name . "]successfully login by  " . $username . "\r\n";
            logToFile("app-success.log", $str);
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: profile"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
            $str = "[" . $username . "][" . $module_name . "][could not connect to database] login by  " . $username . "\r\n";
            logToFile("app-error.log", $str);
        }


        mysqli_close($con); // Closing Connection
    }
}
?>