<?php

    include('database.php');
    $database = new Database();

    $database->deleteTeacher($_GET['id']);
    header('Location:../html/home.php');

?>