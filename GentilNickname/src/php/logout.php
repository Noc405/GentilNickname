<?php
session_start();
//Destroy the session
$_SESSION = array();
session_unset();
session_destroy();
//Go to the home page
header('Location:../html/home.php');
?>