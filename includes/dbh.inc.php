<?php 
	$servername = "loaclhost";
	$user = "root";
	$pass = "";
	$dbname = "ucam";

	$conn = mysqli_connect($servername,$user,$pass,$dbname);

	if ($conn) {
		die("connection failed".mysqli_connect_error());
	}