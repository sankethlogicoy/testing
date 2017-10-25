<?php
//Include all user details or route to login page
include('../session.php');

$path = '../Files/Meeting/';
$filename = $_POST['meetingHeader'];

$contents = file_get_contents($path.$filename);

echo $contents;
?>