<?php

include 'mysqli_connect.php';
include 'helper.php';
$uid=$_POST['userId'];
//$uids=' q'.$uid.'q ';
$query="SELECT key_time FROM user WHERE userID=$uid";

$result= mysqli_query($con, $query);
if (mysqli_affected_rows($con)>0) {
$row=mysqli_fetch_assoc($result);
$r=$row['key_time'];

$query="SELECT*FROM notifications where from_uid=$uid OR to_uid=$uid AND date_time>='$r'";
$result= mysqli_query($con, $query);
$i=0;$j=0;
if (mysqli_affected_rows($con)>0) {
    while ($row=mysqli_fetch_assoc($result)) {
       $i=$i+1;

    }
   
}

echo $j;

}
else {
echo "error".mysqli_error($con).$uid;
  
}


//echo $query;


?>