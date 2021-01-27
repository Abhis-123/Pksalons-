<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update time</title>
    <link rel="shortcut icon" href="grooming.png">

    <link rel="stylesheet" href="css/book_update.css">
    <script src="js/jquery-3.3.1.js" type="text/javascript"></script>

</head>
<body>

<script> 




<?php session_start();
?>
    </script>  


<?php






require ('includes/mysqli_connect.php');
include ('includes/helper.php');




//echo $_SESSION['userID'] ;
if (isset($_SESSION['userID'])&&!is_int($_GET['bid'])) {
  
    $bid=$_GET['bid'];
    $query="SELECT* FROM hair_cut_appointment WHERE	
    appointment_id=$bid AND completed=0 OR completed=1";
    $result=mysqli_query($con,$query);
   if( mysqli_affected_rows($con)){
        $arr=mysqli_fetch_assoc($result);

        echo "<div id='b_cont_update'>The booking Details are:
            <p id='b_cont_update_email'>user email :".$arr['user_email']."</p>
            <p id='b_cont_update_contact'>user contact :".$arr['contact_no']."</p>
            <p id='b_cont_update_time'>time of booking :".$arr['time_booked']."</p>
            <p id='b_cont_update_address'>user address :".$arr['user_address']."</p> 
            <p id='b_cont_update_id'>booking ID :<span id='booking_id_to_uodate'>". $bid."</span></p>      
     
        ";

                echo '<form action="includes/send_book_data.php" method="post">
                <div id="book_update_tim"><div id="time_book">
                <label for="b_time">Enter time of appointment:</label>
                <input type="time" name="book_time" id="b_time">
                </div>
                <div id="price_book">
                <label for="b_rate">Enter Rate:</label>
                <input type="text" name="b_rate" id="b_rate">
               
                </div>
                <input style="display:none" id="booking_id_to_uodate"name="book_id" value="'. $bid.'"></p>      

                <button type="submit" class="submit_b_update" onclick="send_book_data()" id="submit_book_update">Submit</button>

                </div><p id="error"></p></form></div>

                ';


   }
   else{
       echo "this link is expired";
   }


    
}else{
    echo "login first!<a href='".$domain."login.php>link</a>";
    
}



?>  

</body>
</html>


