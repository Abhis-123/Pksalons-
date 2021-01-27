 <?php
 
 if (isset($_POST['userId'])) {
   include 'mysqli_connect.php';
   echo' <div class="phtos_container" id="photos_container">';
    get_pictures_user($con, $_POST['userId']);
    echo'</div>';
 }

 function get_pictures_user($con, $userid)
 {
  $query="SELECT* FROM hairstyle WHERE userID=$userid ";
   $row= mysqli_query($con,$query);
   $d=' ';
  if(mysqli_affected_rows($con)>0){
       while($image=mysqli_fetch_assoc($row)){
          if(file_exists('assets/profile'.$image['userID'])){
              $logo_user= $image['userID'];
          }else{
               $logo_user= 'beard.png';
          }
            $d=$d.'<div class="phot_card" onmouseover="image_hover('.$image['styleID'].') " onmouseout="image_out('.$image['styleID'].')" >
            <img src="'.$image['address'].'" alt="there is a image">
            <div class="image_info_panel" id="s'.$image['styleID'].'saloon'.'">
            <p class="image_user_panel"><img class="user_image_logo" src="assets/profile/'.$logo_user.'"></p>
            <p class="image_title_panel">'.$image['title'].'</p></div></div>';
        
      }
      echo $d;
  }
  else
   echo "there are not pictures uploaded";


   
 }


 function get_pictures_query($con,$query)
 {
     
    
    $query="SELECT* FROM hairstyle WHERE tags=$query";
     $row= mysqli_query($con,$query);
     $d=' ';
    if(mysqli_affected_rows($con)>0){
         while($image=mysqli_fetch_assoc($row)){
         
          if(file_exists('assets/profile'.$image['userID'])){
               $logo_user= $image['userID'];
           }else{
                $logo_user= 'beard.png';
           }
             $d=$d.'<div class="phot_card" onmouseover="image_hover('.$image['styleID'].') " onmouseout="image_out('.$image['styleID'].')" >
             <img src="'.$image['address'].'" alt="there is a image">
             <div class="image_info_panel" id="s'.$image['styleID'].'saloon'.'">
             <p class="image_user_panel"><img class="user_image_logo" src="assets/profile/'.$logo_user.'"></p>
             <p class="image_title_panel">'.$image['title'].'</p></div></div>';         
        }
        echo $d;
    }
    else
     echo "there are not pictures uploaded";
  
  
      
 }
 
 
 ?>