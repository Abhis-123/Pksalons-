<?php
include 'mysqli_connect.php';
include 'helper.php';
$uid=$_POST['userId'];



$query="UPDATE user SET key_time=CURRENT_TIMESTAMP() WHERE userID=$uid";


$result= mysqli_query($con, $query);
//echo "<div class='message_bo'><div class='recieved_message'>".mysqli_error($con)."</div></div>";

    $query="SELECT*FROM notifications where from_uid=$uid OR to_uid=$uid";
      $result= mysqli_query($con, $query);
echo "<div id='message_box'>";
if (mysqli_affected_rows($con)>0) {
    while ($row=mysqli_fetch_assoc($result)) {
      if ($row['to_uid']==$uid) {
        echo "<div class='message_bo'><div class='sent_message'>".$row['message']."</div></div>";
      } else {
        echo "<div class='message_bo'><div class='recieved_message'>".$row['message']."</div></div>";

      }
    }
   
}
else{
    echo "<p style='color:black; margin:30px auto'>there are no messages</p>";
}

echo '</div>';
//echo "<div class='message_bo'><div class='recieved_message'>".mysqli_error($con)."</div></div>";




?>