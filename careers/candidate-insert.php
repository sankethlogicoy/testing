<?php

include('../session.php');

include('../logger.php');
include('../database.php');
 
$task = $_POST['num'];

switch ($task) {
    case "1":
        $inter_username = $_POST['inter_username'];
        $inter_mode = $_POST['inter_mode'];
        $candidate_id = $_POST['candidate_id'];
        $inter_feedback = $_POST['inter_feedback'];
        $inter_result = $_POST['inter_result'];
        
        $sql = "INSERT INTO `candidate_interview` (`candidate_id`, `inter_username`, `inter_mode`, `inter_feedback`, `inter_result`,
		`test_mode`, `test_total_marks`, `test_obtained_marks`, `test_result`, `test_feedback`, `hr_mode`,
		`hr_result`, `hr_feedback`) VALUES ('$candidate_id', '$inter_username', '$inter_mode', '$inter_feedback', '$inter_result', '', '', '', '', '', '', '', '')";
        if ($con->query($sql) === TRUE) {
      
	  ?>
	  <script>
	  alert("First round interview updated successfully");
	  window.location="admin.php";
	  </script>
	  <?php
    } else {
		
          ?>
	  <script>
	  alert("please try again");
	  window.location="admin.php";
	  </script>
	  <?php
    }

        $con->close();

        break;
		case "2":
        $test_mode = $_POST['test_mode'];
        $test_total_marks = $_POST['test_total_marks'];
        $test_obtained_marks = $_POST['test_obtained_marks'];
        $test_feedback = $_POST['test_feedback'];
        $test_result = $_POST['test_result'];
		$candidate_id = $_POST['candidate_id'];
        
        $sql = "UPDATE `candidate_interview` SET `test_mode` = '$test_mode', `test_total_marks` = '$test_total_marks', 
		`test_obtained_marks` = '$test_obtained_marks', `test_result` = '$test_result', 
		`test_feedback` = '$test_feedback' WHERE `candidate_interview`.`candidate_id` = $candidate_id";
        if ($con->query($sql) === TRUE) {
      
	  ?>
	  <script>
	  alert("Second round interview updated successfully");
	  window.location="admin.php";
	  </script>
	  <?php
    } else {
		
          ?>
	  <script>
	  alert("please try again");
	  window.location="admin.php";
	  </script>
	  <?php
    }

        $con->close();

        break;
		case "3":
        $hr_mode = $_POST['hr_mode'];
        
        $hr_feedback = $_POST['hr_feedback'];
        $hr_result = $_POST['hr_result'];
		$candidate_id = $_POST['candidate_id'];
        
        $sql = "UPDATE `candidate_interview` SET `hr_mode` = '$hr_mode', `hr_result` = '$hr_result', `hr_feedback` = '$hr_feedback' 
		WHERE `candidate_interview`.`candidate_id` = candidate_id;";
        if ($con->query($sql) === TRUE) {
      
	  ?>
	  <script>
	  alert("HR round  updated successfully");
	  window.location="admin.php";
	  </script>
	  <?php
    } else {
		
          ?>
	  <script>
	  alert("please try again");
	  window.location="admin.php";
	  </script>
	  <?php
    }

        $con->close();

        break;
}
?>