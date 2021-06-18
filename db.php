<?php

$con = mysqli_connect("localhost", "root", "", "taskapp");
if(mysqli_connect_error())
{
	echo "connection error". mysqli_connect_error(); die("connection error");
}

?>

