<?php
//Connect to database
	$con = mysqli_connect('localhost','root','','company');

	//Check connection
	if (!$con)	
	{
		echo('dead');
		die('Could not connect: ' . mysqli_error($con));
	}
?>