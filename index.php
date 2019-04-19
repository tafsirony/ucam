<?php 
	require "header.php";
 ?>
 <main>
 	<div class="wrapper-form">

 			<div class="login-form" >
			  
				<h1>Login</h1>
				<?php
					if(isset($_GET['error'])){
						if($_GET['error'] == "wrongpassword" || $_GET['error'] == "nouser" ||$_GET['error'] == "emptyfields"){
							echo '<p>Wrong ID or Password!</p>';
						}
					}
				?>
				<form action="includes/login.inc.php" method="post">
					<input type="text" name="sid" placeholder="student id"><br><br>
					<input type="password" name="pwd" placeholder="password"><br><br>
					<button type="submit" name="login-submit">Login</button><br>
				</form>
				
				<p>Don't Have an Account?  <a href="signup.php">Signup</a></p>
				
			</div>
	</div>
 </main>
 <?php 
 require "footer.php";
  ?>