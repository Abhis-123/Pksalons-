<?php
 include 'includes/mysqli_connect.php';
 include 'includes/helper.php';
 include 'includes/mail/mail.php';
 $saloon_id=$_GET['s_id'];
 $user_id=$_GET['u_id'];
 $array=get_user_info($con,$user_id);
 $value=$_GET['type'];
 $user_email=$array['email'];
   $saloon_id= mysqli_escape_string($con,$saloon_id);
   $user_id= mysqli_escape_string($con,$user_id);
   $value= mysqli_escape_string($con,$value);
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="shortcut icon" href="grooming.png">
    <link rel="stylesheet" href="css/book.css">
</head>
<body>
    <div id="book_service_div">
        
<form action=" " method="post" id="book_service">
       <p>Enter your mobile number * or use default 
        <input type="text" name="user_mobile" class="book_input" value="<?php echo $array['mobile_number']?>"></p>
       
        <input type="text" name="extra_email" class="book_input" value="<?php echo $array['email']; ?> " placeholder="Another email id which you are using now(optional)">
        <?php
        if($value==1){
            echo '<input type="text" name="user_address" id="address_book" class="book_input" placeholder="Enter Your full address">';
        }
        ?>
        <input type="text" name="book_discription" class="book_input" id="book_discription" placeholder="discribe your service">
        <button type="submit" class="submit_book" name="submit_book" value="submit_book">Submit</button>
        <p>For time the barber will call you,</p>
        <p>To varify the book</p>
</form>
</div>
</body>
</html>
<?php

if (isset($_POST['submit_book'])) {
    $user_mobile=validate_input_number($_POST['user_mobile']);
    $user_extramail=mysqli_escape_string($con,validate_input_email($_POST['extra_email']));

    $discription=mysqli_escape_string($con,validate_input_text($_POST['book_discription']));
    $user_mobile=mysqli_escape_string($con,$user_mobile);
    if (       $value=1
    ) {
       $discription=$discription.'<p class="choice_of_booking">The booking is requested for Home</p>';
    }


    $query2= "SELECT saloon_owner,saloon_title,userId,location,saloon_number,saloon_address,saloon_email,time_start,time_off 
    From saloons 
    Where saloon_id='$saloon_id'";
    $r=mysqli_query($con,$query2);
    $rows=mysqli_fetch_assoc($r);
    if($value==1){
    $user_address=validate_input_text($_POST['user_address']);

    $query="INSERT INTO hair_cut_appointment(userID,saloon_id,time_booked,contact_no,user_address,user_email,discription) 
            VALUES('$user_id','$saloon_id',NOW(),'$user_mobile','$user_address','$user_extramail','$discription')";
        $time=date("h:i:sa");
        $row=mysqli_query($con,$query);
        $book_id=mysqli_insert_id($con);    
        if (mysqli_affected_rows($con)) {
                
            

                $message_to_user='<h3>Message on hair cut booking</h3><p>The Saloon Owner Name:'.$rows['saloon_owner'].'<br>
                The Saloon Name:'.$rows['saloon_title'].'<br>
                The Saloon Owner mobile Number:'.$rows['saloon_number'].'<br>
                The Saloon Timing:'.seconds_to_time($rows['time_start']).' to '.seconds_to_time($rows['time_off']).'<br>
                Saloon Address'.$rows['saloon_address'].'
                The time of booking:'.$time.'<br>
                The discription of service is:'.$discription.'<br>
                The booking id:'.$book_id.'<br>
                You will get to know the service time from the owner  via email or call</p>
                '; 
                $book_subject='From indiasaloons.com regrding service';
                $message_to_saloon='<h3>Message on hair cut booking</h3>';
                if($value=1){
                    $message_to_saloon=$message_to_saloon.'<h4>The  address is :'.$user_address.'</h4>';
                }                
                $message_to_saloon=$message_to_saloon.'The user name is:'.$array['firstName'].' '.$array['lastName'].'<br>
                The mobile number is:'.$user_mobile.'<br>
                The email is :'.$user_email.'<br>            
                You can make a call to give him/her information about time or BY CLICKING on <a href="'.$domain.'update_book.php?vcbvzbvcz%34ui&bid='.$book_id.'">LINK</a><br>
                '; 

                $query="SELECT userID FROM saloons where saloon_id= '$saloon_id'";
                $result=mysqli_query($con,$query);
               $user=mysqli_fetch_assoc($result);
                
                create_notification(user['userID'],$user_id,$message_to_saloon,date("Y-m-d H:i:s"),$con);
                create_notification($user_id,user['userID'],$message_to_user,date("Y-m-d H:i:s"),$con);              
                send_mail($user_extramail,$book_subject,$message_to_user);
                send_mail($rows['saloon_email'],$book_subject,$message_to_saloon);
                echo mysqli_error($con);
                echo '<script>
                    getElementByID("#book_service_div").innrHTML="<p id="success_book">Your booking is done successfully</p>"
                </script>';
        }else{
            echo '<script>
            getElementByID("#book_service_div").innrHTML="<p id="error_book">Sorry There was a connection problem</p>
            </script>';
        }
            
    }else {







    }
    }

?>











