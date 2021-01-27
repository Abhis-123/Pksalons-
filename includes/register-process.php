<?php
require ('includes/helper.php');
// error variable.
$error = array();

$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName))
{
    $error[] = "You forgot to enter your first Name";
};
$lastName = validate_input_text($_POST['LastName']);
if (empty($lastName))
{
    $error[] = "You forgot to enter your Last Name";
}

$email = validate_input_email($_POST['email']);
if (empty($email))
{
    $error[] = "You forgot to enter your Email";
}
$barber = validate_input_text($_POST['barber']);
$barber=strtolower($barber);
if (empty($barber) || strlen($barber) > 3)
{
    $error[] = "please tell us are you baber or not";
}
$mnumber = '+91'.validate_input_number($_POST['m-number']);
if (empty($mnumber))
{
    $error[] = "You forgot to enter your mobile number";
}
$password = validate_input_text($_POST['password']);
if (empty($password))
{
    $error[] = "You forgot to enter your password";
};
$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd))
{
    $error[] = "You forgot to enter your Confirm Password";
}
$files = $_FILES['profileUpload'];
$profileImage ='assets/profile/beard.png';

    if (empty($error))
    {
        $query="SELECT email FROM user WHERE email='$email' ";

            mysqli_query($con,$query);
        if (!mysqli_affected_rows($con)>0) {
         
        $password = $password . "@$%^;L'-2!;+=#/5B)40/o-okOw8//3a";
        $password = password_hash($password, PASSWORD_DEFAULT);
        require ('mysqli_connect.php');
        // make a query
        $query = "INSERT INTO user (firstName, lastName, email,pass,mobile_number, profileImage,barber,registration)";
        $query .= "VALUES(?,?,?,?,?,?,?,NOW())";
        // initialize a statement
        $q = mysqli_stmt_init($con);
        // prepare sql statement
        $stmt = mysqli_stmt_prepare($q, $query);

            if ($stmt==false){
                echo mysqli_connect_error();
                die("<pre>" .$q-> error. PHP_EOL . $query . "</pre>");
            }
           else{    
            mysqli_stmt_bind_param($q,"sssssss",$firstName,$lastName,$email,$password,$mnumber,$profileImage,$barber);
                // execute statement
             $result=mysqli_stmt_execute($q);
             
            if (mysqli_stmt_affected_rows($q) == 1)
                    {
                        // start a new session
                        session_start();
                        // create session variable
                        $_SESSION['userID'] = mysqli_insert_id($con);
                        $result=upload_profile('assets/profile/', $files,'user'.$_SESSION['userID'].'image.jpg');
                        $query="UPDATE user SET profileImage='$result'";
                      $r=  mysqli_query($con,$query);
                        if ($r===TRUE) {
                           
                            setcookie("userID",$_SESSION['userID'],time()+30*24*60*60);
                            if ($barber=="yes")
                            { 
                                header('location: registershop.php');
                                exit();

                            }
                            else{                                
                                header('location: index.php');
                                exit();

                            }
                            mysqli_close($con);
                        }
                        else
                        { echo $result;
                            echo "'**********************".$query."'";
                            echo "**************('".mysqli_error($con)."')";
                        }
                       
                    }

                else
                {
                    print "<script>window.alert('Error while registration...!')</script>";
                   
                }
        }
    }else {
        echo "user with this email address is already registered";
    }
        }

    
    else
    {
        echo 'not validate';
    }

