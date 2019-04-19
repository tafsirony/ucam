<?php 
    require "header.php";
    
    if(isset($_SESSION['id'])){
       
				echo " Logged in";
    }
    else{
        header("Location:index.php?error=pleaselogin");
        exit();
       	
    }
 ?>
