<?php
include('protect.php');
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn = new mysqli("localhost", "root", "", "company");
if ($conn->connect_error) 
{
   die("Connection failed: " . $conn->connect_error);
}
   
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn,"select * from register where emp_username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['first_name'];
$login_emp_id =$row['emp_id'];
$login_emp_desig =$row['emp_desig'];
$login_emp_access=$row['emp_access_type'];
$encoded_access =decryptIt($login_emp_access);
$_SESSION['manager']=$encoded_access;
$user_type=$_SESSION['manager'];
echo $encoded_access;
$ses_sql=mysqli_query($conn,"select total from wallet where username='$login_session' ORDER BY wallet_id DESC LIMIT 0, 1");
$row = mysqli_fetch_assoc($ses_sql);
$_SESSION['wallet']=$row['total'];
$total=$_SESSION['wallet'];
if($total==0)
{
$total=0;
}
 
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}


?>