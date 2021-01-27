<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = array();
     require ('helper.php');
     require ('mysqli_connect.php');
 

session_start();
$error = array();
$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['pass']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    // sql query
    $query = "SELECT userID, firstName, lastName, email,pass, profileImage FROM user WHERE email=?";
       $q = mysqli_stmt_init($con);
       mysqli_stmt_prepare($q, $query);
       mysqli_stmt_bind_param($q, 's', $email);
       mysqli_stmt_execute($q);
       $result = mysqli_stmt_get_result($q);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (!empty($row)){
        // verify password
        //echo "varifynig-pass";
        if(password_verify($password."@$%^;L'-2!;+=#/5B)40/o-okOw8//3a", $row['pass'])){
         //   print "pass-varified"; 
                $_SESSION['userID'] = $row['userID'];
                setcookie('userID',$_SESSION['userID'],time()+30*24*60*60,"/");
                $user = get_user_info($con,$_SESSION['userID']);
                header("location: ../index.php");
                exit();
        }else{
            
            header("location: ../login.php");
            echo "wrong password";
        }
    }else{
        print "You are not a member please register!".mysqli_error($con);
    }

}else{
    echo "Please Fill out email and password to login!";
}

 }else{
     header('location: ../login.php');
 }

 ?>
