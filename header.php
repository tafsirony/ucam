<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<header >
	
		<nav class="wrapper">
			<div class="logo">
				<a href="#">
					<img src="img/13914318.jpg" alt="logo">
				</a>
			</div>
			<?php 
				if(isset($_SESSION['id'])){
					echo '<div class="menu">
					<ul>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="enroll.php">Enroll New Courses</a></li>
						<li><a href="history.php">History</a></li>
						<form action="includes/logout.inc.php">
					<button type="submit" name="logout-submit">Logout</button>
					</form>
					</ul>
				</div>';
				}
				else{
					echo '<div class="menu">
					<ul>
						<p> Course Registration System</p>
						
					</ul>
				</div>';
				}
			?>
			
			
		</nav>
	</header>

