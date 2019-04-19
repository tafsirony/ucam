<?php 
if (isset($_POST['signup-submit'])) {
		require 'dbh.inc.php';
		$userid = $_POST['sid'];
		$name = $_POST['sname'];
		$dept = $_POST['dept'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$pass = $_POST['pwd'];
		$cpass = $_POST['cpwd'];
	
if (empty($userid) || empty($name)|| empty($dept) || empty($email) || empty($pass) || empty($cpass) ) {
	header("Location: ../signup.php?error=emptyfield&sid=".$userid."&name=".$name."&dept=".$dept."&email=".$email);
	exit();
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[0-9]*$/", $userid)) {
	header("Location: ../signup.php?error=invalidemailid");
	exit();
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	header("Location: ../signup.php?error=invalidemail&sid=".$userid);
	exit();
}
elseif (!preg_match("/^[0-9]*$/",$userid)) {
	header("Location: ../signup.php?error=invaliduserid&email=".$email);
	exit();
}
elseif ($pass!==$cpass) {
	header("Location: ../signup.php?error=passwordcheck&userid=".$userid."&email=".$email);
	exit();
}
else{
	$sql = "SELECT sid FROM students WHERE sid=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location: ../signup.php?error=sqlerror1");
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$userid);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if ($resultCheck>0) {
			header("Location: ../signup.php?error=usertaken&mail=".$email);
		exit();
		}
		else{
			$sql = "INSERT INTO students(sid,sname,dept,email,pwd) VALUES(?,?,?,?,?)";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location: ../signup.php?error=sqlerror2");
				exit();
			}
			else{
				$hashedpass= password_hash($pass,PASSWORD_DEFAULT);

				mysqli_stmt_bind_param($stmt,"ssssss",$userid,$name,$dept,$gender,$email,$hashedpass);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				header("Location: ../signup.php?signup=success");
				exit();
				}	
			}	
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php?");
				exit();
}