<?php 
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "ucam";

	$conn = mysqli_connect($servername,$user,$pass,$dbname);

	/*if ($conn) {
		die("connection failed".mysqli_connect_error());
	}*/
	if($conn->connect_error)
	{
		die($conn->error);
	}