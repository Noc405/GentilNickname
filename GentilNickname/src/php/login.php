<?php
session_start();

    if(isset($_POST['btnSubmit'])){
        //Get the database object
        include('database.php');
        $database = new Database();

        extract($_POST);

        $userFound = $database->getAUser(htmlspecialchars($Login));

        //If user exists
        if(!empty($userFound)){
            //Get the hash password
            $hashPass = $userFound[0]['usePassword'];
            //Check if the user has the good password
            if(password_verify($Password, $hashPass)){
                $_SESSION['id'] = $userFound[0]['idUser'];
                $_SESSION['login'] = $userFound[0]['useLogin'];
                $_SESSION['admin'] = $userFound[0]['useAdministrator'];
                header('Location:../html/home.php');
            }else{
                header('Location:../html/home.php?error=1');
            }
        }else{
            header('Location:../html/home.php?error=1');
        }
    }
?>