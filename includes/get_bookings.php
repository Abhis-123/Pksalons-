<?php

include 'mysqli_connect.php';
include 'helper.php';
session_start();
$user=$_SESSION['userID'];

if(is_numeric($user)){
   


$query="SELECT barber FROM user WHERE userID='$user'";
$result=mysqli_query($con,$query);
if (mysqli_affected_rows($con)>0) {
    $row=mysqli_fetch_assoc($result);
    if ($row['barber']=='yes') {
            $query="SELECT* FROM saloons WHERE userId=$user";
                mysqli_query($con,$query);
            if (mysqli_affected_rows($con)>0) {
                echo mysqli_error($con);
                while ( $row2=mysqli_fetch_assoc($result)) {
                        
                    if ($row2['completed']==0) {
                        $d='have not seen yet';
    
                    }elseif ($row2['completed']==1) {
    
                        $d="accepted and updated";
                        # code...
                    }elseif ($row2['completed']==2) {
    
                        $d='cancelled by user';
                    }elseif ($row2['completed']==3) {
    
                        $d='cancelled by barber';
                    }elseif ($row2['completed']==4) {
    
                        $d='completed';
                    }
                        $s='<div class="booking_salon_id_panel">';
                        $s=$s.'<div class="booking_id_time">Time Of Booking: '.seconds_to_time($row2['time_booked'])."</div>".'<div class="booking_id_discription">Discription:'.$row2['discription'].'</div>'
                        .'<div class="booking_id_bill">bill of Service:'.$row2['bill'].'</div>'. '<div class="booking_id_bill">time given:'.$row2['time_given'].'</div>'.'<div class="booking_id_status">Status:'.$d.'</div>'
                        .'<div class="book_link_panel"><a href="account_info.php?s_id='.$row2['userId'].'">User Info</a><div>';
                        
                       
                        $s=$s.'</div>';
                echo $s;
                # code... 
                }
            }
        







        
    }


        $query="SELECT* FROM hair_cut_appointment Where userID=$user"; 
        $result= mysqli_query($con,$query);

        if (mysqli_affected_rows($con)>0) {
            echo mysqli_error($con);
            while ( $row2=mysqli_fetch_assoc($result)) {
                    
                if ($row2['completed']==0) {
                    $d='have not seen yet';

                }elseif ($row2['completed']==1) {

                    $d="accepted and updated";
                    # code...
                }elseif ($row2['completed']==2) {

                    $d='cancelled by user';
                }elseif ($row2['completed']==3) {

                    $d='cancelled by barber';
                }elseif ($row2['completed']==4) {

                    $d='completed';
                }
                    $s='<div class="booking_user_id_panel">';
                    $s=$s.'<div class="booking_id_time">Time Of Booking:'.seconds_to_time($row2['time_booked'])."</div>".'<div class="booking_id_discription">Discription:'.$row2['discription'].'</div>'
                    .'<div class="booking_id_bill">bill of Service:'.$row2['bill'].'Rs</div>'. '<div class="booking_id_bill">time given:'.seconds_to_time($row2['time_given']).'</div>'.'<div class="booking_id_status">Stats:'.$d.'</div>'
                    .'<div><a href="saloon_info.php?s_id='.$row2['saloon_id'].'">Salon Info</a></div>';
                    
                   
                    $s=$s.'</div>';
            echo $s;
            # code... 
            }
        }
   
   
   
    }




}
else {
   echo "session got currepted"; 
}

?>