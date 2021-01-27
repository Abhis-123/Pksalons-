<?php
$url=$_SERVER['PHP_SELF'];
if ($url=='/dashboard/my-things/saloon/hairstyles.php' ) {
    include ("includes/mysqli_connect.php");
    include ("includes/helper.php");
    $userID=2;
    
}
session_start();
?>
<html>

<head>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/gridlayout.css" />

      <script src="js/modernizr-custom.js"></script>
      <script src="js/script.js"></script>

      <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
      <link rel="stylesheet" href="css/main.css"> 
<script>


</script>

      </head>
<style>
</style>
   
<body>
<div class="container_hair_styles">






<div class="phtos_container">
   



</div>

<div class="header_hairstyles">
<img class="upload_icon"  id="gallery_b" src="icons/file.svg" alt="">


<input type="text" name="hairstyle_search" id="inputhairstyle_search"  placeholder="search by tags">
<button type="submit" class="hairstyle_submit btnAction" name="hairstyle_submit">Search</button>
 <div class="upload_form" id="dfasgkadsafkdhhfgadfjfldh">
    <?php 
    if ($_SESSION['userID']!='5') {
     echo '<div class="upload_form_cont">
                <div id="close_butten">+</div>
                <form id="upload_form" enctype="multipart/form-data" method="post" action="includes/upload_picture.php">
                    <div>
                        <div><label for="image_file">Please select image file</label></div>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                        <div><input type="text" name="image_tags" id="image_tag"></div>
                        <div><input type="text" name="user_id_up" value='.$_SESSION["userID"].' style="display:none"></div>

                    </div>
                    <div>
                        <input type="button" value="Upload" onclick="startUploading()" />
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize">Your file is very big. We cannot accept it. Please select more small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
                </form>
                <img id="preview" />
            </div>

      
   ';
    
    }
    else{
      echo '
      <div id="close_butten">+</div>
      <div id="align_center">
      Please Login first to upload images
    </div>';
    }  ?>
<script>
    document.getElementById("gallery_b").onclick = function() {myFunction()};
    document.getElementById("gallery_b").onmouseover= function() {myFunction()};
    document.getElementById("close_butten").onclick = function() {myFunction2()};
function myFunction() {
  document.getElementById('dfasgkadsafkdhhfgadfjfldh').id="dfasgkadsafkdhhfgadfjfldhsfjakh";
}
function myFunction2() {
  document.getElementById('dfasgkadsafkdhhfgadfjfldhsfjakh').id="dfasgkadsafkdhhfgadfjfldh";
}



</script>
</div>
</div>

</div> 

</body>
</html>