<?php
session_start();

    if(isset($_POST['btnSubmit'])){
        extract($_POST);

        include('database.php');
        $database = new Database();

        if(isset($sex) && !empty($name) && !empty($firstname) && !empty($nickname) && !empty($origin) && $section != 0){
            $database->updateTeacher($id, htmlspecialchars($firstname), htmlspecialchars($name), $sex, htmlspecialchars($nickname), htmlspecialchars($origin), $section);
            header('Location:../html/home.php');
        }else{
            header('Location:../html/editTeacher.php?id=' . $id . '&error=1');
        }
    }
?>