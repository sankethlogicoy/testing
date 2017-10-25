<?php
$conn=mysqli_connect("localhost","root","","company");
if(!$conn)
{
	echo "dead";
	echo mysqli_error($conn);
}
else
{
	echo"successfully connected";
}
$sql="insert into db values('sanketh','9591049797')";
if($conn->query($sql)===TRUE)
{
	echo "added";
}
?>