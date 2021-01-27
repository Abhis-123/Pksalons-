<?php 
///completed=0 means not seen 
///completed=1 means accepted
///completed=2 cancelled by user
///completed=3 means cancelled by barber
//completed=4 completed


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'mysqli_connect.php';
    include 'helper.php';
    session_start();
    $s_o_id = $_SESSION['userID'];
    $uid=   mysqli_escape_string($con,$_SESSION['userID']);
    $b_id=validate_input_text($_POST['book_id']);
    $time=validate_input_text($_POST['book_time']);
    $rate=validate_input_text($_POST['b_rate']);
  
    if (isset($uid)&&isset($b_id)&&isset($time)&&isset($rate)) {



        $query="SELECT* FROM hair_cut_appointment WHERE appointment_id='$b_id'";
        $result=mysqli_query($con,$query);
       
        if (mysqli_affected_rows($con)>0) {
            $row=mysqli_fetch_assoc($result);


            $query="SELECT saloon_id FROM  saloons WHERE userId='$uid'";
            $result2=mysqli_query($con,$query);
            if (mysqli_affected_rows($con)>0) {
                $row2=mysqli_fetch_assoc($result2);
                $s_o_id=$row2['saloon_id'];
               
                # code...
            }else{
                $s_o_id='-143gtagddf';
              
            }
           
            if ($row['saloon_id']==$s_o_id) {

                if ($row['completed']==0||$row['completed']==1) {

                    $time=time_to_seconds($time);
                    $sql="UPDATE hair_cut_appointment SET completed=2 ,time_given='$time',bill='$rate' WHERE appointment_id='$b_id' ";
                    $row3=mysqli_query($con,$sql);
                    if (mysqli_affected_rows($con)>0) {
                        $time=seconds_to_time($time);
                         $notify="<div>time of service is updated to:".$time."</div>
                                  <div>The charge is:".$rate."Rs</div>
                                <div>Yor Time of booking is:".$row['time_booked']."</div>";
                                 create_notification($row['userID'],$uid,$notify,date("Y-m-d H:i:s"),$con);
                       
                            echo "<scripit>window.alert('<div>time and cost is updated</div>')";
                            header("location: ./index.php");


                    }else{

                        echo "connection  error--".mysqli_error($con);
                    }



                }else {
                   echo'It is already cancelled';
                }



              
            } 
            else {
               echo "Only Saloon owner can update this";
            }
            





        }else {
           echo "error while booking";
        }


     
    }else {
            echo ' dont leave anything empty';
    }
  
}else{
    echo "request method is not correct ";
}

?>