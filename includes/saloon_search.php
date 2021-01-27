<?php
session_start();
include 'mysqli_connect.php';
include 'helper.php';
function validate($txt){    
    $txt=trim($txt);
  //  $txt=mysqli_real_escape_string($con,$txt);
    return $txt;
}
$state=' '.validate($_POST['address_h']).' ';


if(!empty($state)){
        $query= "SELECT saloon_id,saloon_owner,saloon_title,userId,location,saloon_number,saloon_address,open_time,close_time 
        From saloons 
        Where saloon_address LIKE '%{$state}%'";
       
        $rows=mysqli_query($con,$query);
        //echo '<pre>'. $rows.'</pre>';
        if(mysqli_affected_rows($con)>0){
        while ($row=mysqli_fetch_assoc($rows)) {
          echo '<div class="saloon_card" id='.$row['saloon_id'].'>
            <div> 
               <p class="Saloon_name-search"><a class="Saloon_name-search" href="saloon_info.php?s_id='.$row['saloon_id'].'">'.$row['saloon_title'].'</a></p>
               <p class="Saloon_owner-search">Master:'.$row['saloon_owner'].'</p>
               <p class="Saloon_owner-search">Mobile:'.$row['saloon_number'].'</p>
               <img src="images/3.jpg" alt="No image Uploaded" class="Saloon-image">  
            </div>
               <p class="Saloon_Address-search"> address:'.$row['saloon_address'].'</p>
               <p Class="Saloon_timing-search">Avilability:'.seconds_to_time($row['open_time']).'-'.seconds_to_time($row['close_time']).' </p>
               <button type="submit" class="btnAction_search"><a href="book.php?s_id='.$row['saloon_id'].'&u_id='.$_SESSION['userID'].'&type=0"
               
               > Book</a></button>
         </div>'; 
        
        }
        
        
    }else{
        echo 'no search result are avilable for address'.$state;
        
    }
}
else{
    echo '<p>Enter a search query</p>';
}


?>
