<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saloon</title>
    <link rel="stylesheet" href="css/saloon_info.css"
    ><link rel="stylesheet" href="css\gridlayout.css">
</head>
<script>
function image_hover(id){
    id='s'+id+'saloon';
    document.getElementById(id).style.opacity=1;
}
function image_out(id) {
    id='s'+id+'saloon';
    document.getElementById(id).style.opacity=0;

}

</script>
<?php
include 'includes/mysqli_connect.php';
include "includes/helper.php";
$saloonid=$_GET['s_id'];

        $query1= "SELECT*FROM saloons where saloon_id='$saloonid' ";
        $rows = mysqli_query($con,$query1);
        $row=mysqli_fetch_assoc($rows);
        $user=get_user_info($con,$row['userId'])


?>

<body>
 

    <div class="saloon_info_header">
    <div class="saloon_info_header_image">
    <img class="profileImage_saloon_info" src="<?php echo $user['profileImage']?>" alt="profile_image">
    </div>
    <div class="saloon_info">
            <div id="saloon_info_title"> <?php echo $row['saloon_title'] ?></div>
            <div id="saloon_info_owner">OwnerName: <?php echo $row['saloon_owner'] ?></div>

    </div>
    <div id="saloon_info_timing">
        <div id="avilability_home">Home:<?php echo seconds_to_time($row['time_start']).'-'.seconds_to_time($row['time_off']) ?>
    </div>
        <div id="avilability_saloon ">Salon Timing:<?php echo seconds_to_time($row['open_time']).'-'.seconds_to_time($row['close_time']) ?>
    </div>
    </div>
        <div class="saloon_info_address">Salon Address:
      <address>
        <?php echo $row['saloon_address'] ?>
        <div>

        <a href="<?php echo $row['location'] ?>">link to Google Map</a>
        </div>  
    </address>
      
      <div class="saloon_contact_info">
      <div id="saloon_info_email"> Contact Email:<?php echo $row['saloon_email'] ?></div>
      <div id="saloon_info_M_number">Contact No: <?php echo $row['saloon_number'] ?></div>
      
</div>
    
    
    </div>
    </div>

    <div>
    
    </div>
    <div class="phtos_container" id="photos_container">
    <?php 
    include 'includes/get_pictures.php';
    get_pictures_user($con,$row['userId']);
    ?>
    </div> 
    
</body>
</html>