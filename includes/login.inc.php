<?php
if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';
    $sid = $_POST['sid'];
    $pass = $_POST['pwd'];

    if(empty($sid) || empty($pass)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM students WHERE sid=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$sid,$sid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $passcheck = password_verify($pass,$row['pwd']);
                if($passcheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                elseif($passcheck==true){
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['studentId'] = $row['sid'];

                    header("Location: ../dashboard.php?login=success");
                    exit();
                    
                }
                else{
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nouser");
                exit();
            }

        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}