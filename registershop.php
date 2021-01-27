<?php
session_start();
if(!isset($_SESSION['userID'])){
   
         //  header("Location:index.php");
           echo $_SESSION['userID'];
       }
 else {
       
    require "includes/helper.php";
    require "includes/mysqli_connect.php";
       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register your Saloon</title>
</head>
<style>

body{
    width:100%;
    margin:0;
}
form{
        position: absolute;
        width:50%;
        top: 20%;
        left: 25%;
    background-color: #faf9f7;
}
input,label{
    display: block;
    width: 90%;
    height: 20px;
    margin-left: 10px;
}
input{
    margin-bottom:  10px;
    margin-left: 10px;
}
label{
    margin-bottom:5px; 
}
</style>
<body>
   <div id="welcome_text">
Let's Come Together and Serve Humanity!
</div>
    <form action="" method="post" id="saloon_registration">
        <label for="saloon-name">Title For Saloon</label>
        <input type="text" name="saloon-name" class="saloon_input "  placeholder="Enter Name Of Saloon">
        <label for="saloonowner">your name as owner</label>
        <input type="text" name="saloonowner"  class="saloon_input " placeholder="Enter your name">
        <label for="saloon-email">Email For saloon</label>
        <input type="email" name="saloon-email"  class="saloon_input " placeholder="enter email for saloon notifications">
        <label for="saloon-number">Mobile number</label>
        <input type="text" name="saloon-number"  class="saloon_input " placeholder="enter mobile number">
        <label for="opening-time">Opening Time</label>
        <input type="time" name="opening-time" class="saloon_input "  required>
        <label for="closing-time">Off Time</label>
        <input type="time" id="closing-time" class="saloon_input " name="closing-time" 
         required>
        <label for="Off-day">Day for which saloon Is closed</label>
        <Select name="off-day"  id="saloon_vacation">
        <option value="monday">MONDAY</option>
        <option value="tusday">tusday</option>
        <option value="wednesday">wednesday</option>
        <option value="thursday">thursday</option>
        <option value="friday">friday</option>
        <option value="saturday">saturday</option>
        <option value="sunday">sunday</option>
        </Select>
        <label for="saloon-address">Address Of Saloon</label>
        <input type="text" name="saloon-address"  class="saloon_input " id="saloon-address" >
        <label for="saloon-location">Add a google map location link Saloon</label>
        <input type="text" name="saloon-location"  class="saloon_input " id="saloon-location">
        <label for="select">Will you Take Home Booking</label>
        <select name="home_book" id="home_book"   placeholder="select your option">
        <option value="none">Select Your Choice</option>
        <option value="yes">YES</option>
        <option value="no">NO</option>
        </select>
        <div  id="home_timing">
        <label for="start-time">start Time</label>
        <input type="time" name="start-time" class="saloon_input " required>
        <label for="off-time">off Time</label>
        <input type="time" id="off-time" name="off-time" class="saloon_input " required>
        </div>
        <button type="submit"  value="submit" name="submit">Register</button>
    </form>
</body>



<?php
if(isset($_POST['submit'])){
 
    $_SESSION['userID'];
    $title=validate_input_text($_POST['saloon-name']);    
    $email=validate_input_email($_POST['saloon-email']);
    $owner=validate_input_text($_POST['saloonowner']);
    $number=validate_input_number($_POST['saloon-number']);
    $opentime=time_to_seconds($_POST['opening-time'].":00");
    $offtime=time_to_seconds($_POST['closing-time'].":00");
    $offDay=$_POST['off-day'];
    $time_start=time_to_seconds($_POST['start-time'].":00");
    $time_off=time_to_seconds($_POST['off-time'].":00");
    $address=validate_input_text($_POST['saloon-address']);
    $userid=$_SESSION['userID'];
    $home=$_POST['home_book'];

    $location=urldecode($_POST['saloon-location']);
    if($home='yes'){
        $home=1;
    }else{
        $home=0;
    }
if($title==''||$email==''||$number==''||$opentime==''||$offtime==''||$address==''){
        echo '<script>window.alert("Do not leave anything empty")</script>' ;
    }else{    
    $query="INSERT INTO saloons(saloon_title,saloon_owner,userId, location, open_time, close_time, off_day,saloon_number,saloon_email, saloon_address,Home_avail,time_start,time_off) VALUES 
                            ('$title','$owner','$userid','$location', '$opentime', '$offtime', '$offDay','$number', '$email', '$address','$home','$time_start','$time_off')";
    
   if (mysqli_query($con,$query)) {
        $_SESSION['saloonID']=mysqli_insert_id($con);
         echo '<script>window.alert("You Resgistered successfully")
         </script>';
        echo $_SESSION['userID']." ".$_SESSION['saloonID'];
         header("location:index.php");
         exit();
         
     }else{
        echo "     ",mysqli_error($con).$query;
        echo '<script>window.alert("THere was some connection problem $userid")
        </script>',$userid;
     }
     
        /* $q = mysqli_stmt_init($con);
       
        $stmt = mysqli_stmt_prepare($q, $query);

            if ($stmt==false){
                echo mysqli_connect_error();
                die("<pre>" .$q-> error. PHP_EOL . $query . "</pre>");
            }else {
                mysqli_stmt_bind_param($query,'sssssss',$location,$offDay,$number,$email,$address);
                mysqli_execute($q);
                if(mysqli_affected_rows($q)==1){
                    header('location: index.php');
                    $_SESSION['saloonID']= mysqli_insert_id($con);
                    echo $_SESSION['userID']." ";
                            exit();
                }else{
                    echo '<script>window.alert("mysqli error occured")</script>'.mysql_error($q) ;
                    header('location:registershop.php');
                    exit();
                }
                mysqli_stmt_close($stmt);
                mysqli_close($con);
            }*/
  
    }



}

?>
</html>