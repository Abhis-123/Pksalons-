<?php
include 'mysqli_connect.php';
include 'helper.php';
 # code...
 
    $tag= mysqli_real_escape_string( $con,validate_input_text($_POST['image_tags']));



    $file = $_FILES['image_file'];
    $title=explode(" ",$tag)['0'];
    $fileName=$_FILES['image_file']['name'];
    $fileTempName=$_FILES['image_file']['tmp_name'];
    $fileSize=$_FILES['image_file']['size'];
    $fileError=$_FILES['image_file']['error'];
    $fileType=$_FILES['image_file']['type'];
    $userId= $_POST['user_id_up'];
    $fileExt=explode('.',$fileName);
    $fileExt=strtolower(end($fileExt));

    $allowed=array('jpg','jpeg','png','png','gif');
    if(in_array($fileExt,$allowed)) {
        if ($fileError===0) {
            if ($fileSize<10000000) {
                if(!empty($tag)){
              $fileNameNew=uniqid('',true).'.'.$fileExt; 
              $fileDestination='../hairstylephotos/'.$fileNameNew;
              $fileDestination2='hairstylephotos/'.$fileNameNew;

                    $query="INSERT INTO hairstyle(userID,address,title,tags) 
                    VALUES('$userId','$fileDestination2','$title','$tag')";
                    mysqli_query($con,$query);
                    if (mysqli_affected_rows($con)>0) {
                        move_uploaded_file($fileTempName,$fileDestination);
                        echo "uploaded suscessfully";
                    }else{
                        echo "there is a connection problem".mysqli_error($con);
                    }
                      
                }
                else{
                    echo 'plaese write atleast one tag' ;
                }
            }else{
                echo "your file is too big!";
            }
        }else{
            echo 'there was an error in uploading file';
        }
        # code...
    }else{
        echo 'Sorry, only PDF,JPG, JPEG, & PNG files are allowed to upload.';

    }


?>