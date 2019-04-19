<?php 
	require "header.php";
 ?>
 <main>
 	<div class="wrapper-form">

 			<div class="signup-form" >
				<h1>Signup</h1>
				<?php
					if(isset($_GET['error'])){
						if($_GET['error'] == "emptyfield"){
							echo '<p>Fill in all fields!</p>';
						}
					}
				?>
				<form action="includes/signup.inc.php" method="post">
					<input type="text" name="sid" placeholder="student id"><br><br>
					<input type="text" name="sname" placeholder="full name"><br><br>
					<div class="dept-gender">
						<input type="text" name="dept" placeholder="Department">
						<select name="gender" id=""><br>
	              			<option value="0">Male</option>
	            			<option value="1">Female</option>
	        		    </select><br>
        		    </div><br>
					<input type="email" name="email" placeholder="email"><br><br>
					<input type="password" name="pwd" placeholder="password"><br><br>
					<input type="password" name="cpwd" placeholder="confirm password"><br><br>
					<button type="submit" name="signup-submit">Signup</button><br>
				</form>
				<p>Already Have an Account?  <a href="index.php">Login</a></p>
				
			</div>
	</div>
 </main>
 <?php 
 require "footer.php";
  ?>