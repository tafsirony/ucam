<?php 
    require "header.php";
    
    if(isset($_SESSION['id'])){
       
				echo " yes";
    }
    else{
        header("Location:index.php?error=pleaselogin");
        exit();
       	
    }
 ?>
