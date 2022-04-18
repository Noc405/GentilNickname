<?php
session_start();

    if(isset($_POST['btnSubmit'])){
        extract($_POST);

        include('database.php');
        $database = new Database();

        if(isset($Sex) && !empty($Name) && !empty($Firstname) && !empty($Nickname) && !empty($Origin) && $Section != 0){
            $database->addTeacher(htmlspecialchars($Firstname), htmlspecialchars($Name), $Sex, htmlspecialchars($Nickname), htmlspecialchars($Origin), $Section);
            header('Location:../html/home.php');
        }else{
            header('Location:../html/insertTeacher.php?error=1');
        }
    }
?>