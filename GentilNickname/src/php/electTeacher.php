<?php
    
    //Get a database object
    include('../php/database.php');
    $database = new Database();

    //If a single teacher is elected
    if(isset($_GET['id']) && intval($_GET['id'])){
        extract($_POST);
        //Elect the teacher
        $database->electTeacher($_GET['id']);
        //Redirect the user to the home page
        header('Location:../html/home.php');

    //If some teachers are elected
    }else{
        //Check if the submit button have been checked
        if(isset($_POST['bnSubmitElectTeacher'])){
            extract($_POST);

            //Set all the teachers one by one
            foreach ($electUser as $key => $value) {
                //Call the method for one teacher
                $database->electTeacher($electUser[$key]);
            }
            //When all the users have been elected, redirect to the home page
            header('Location:../html/home.php');
        }else{
            echo "Vous ne pouvez pas visualiser cette page";
        }
    }

?>