<?php
//Include all user details or route to login page
include('../session.php');

//Write POST data to a JSON file
$contents = json_encode($_POST);

//Set target file to write data to
$target_file = fopen('../Files/Meeting/'.$_POST['meetingHeader'].'_meetingNotes.txt','w') or die('Unable to write to file');

//Write contents to user's scratchpad
fwrite($target_file,$contents);

//Close user's scratchpad file stream
fclose($target_file);

//Reply to calling method with success status
echo 'Save Successful';

//Method: Input- String containing URLs and special characters
function formatInputText($data) 
{
  //Remove all trailing and leading white spaces
  $data = trim($data);
  
  //Strip all slashes from contents
  $data = stripslashes($data);
  
  //Remove all special characters
  $data = htmlspecialchars($data);

  //Return formatted data
  return $data;
}
?>