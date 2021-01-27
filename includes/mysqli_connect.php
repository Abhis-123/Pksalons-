<?php

// define constant variables
define('DB_NAME', 'Saloon');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
$domain='http://localhost/dashboard/my-things/saloon/';
try{

    // connection variable
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // encoded language
   // mysqli_set_charset($con, 'utf8');


}

catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}