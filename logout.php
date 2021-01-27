<?php
session_start();
session_unset();
session_destroy();
$_COOKIE['userID']=null;
header("location: index.php")
?>