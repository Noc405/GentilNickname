<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!--
        ETML
        Author      : Emilien Charpié
        Date        : 18.02.2022
        Description : Home page with all the teachers writed on it
    -->
    <title>Enseignant - Insérer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GentilNickname/GentilNickname/resources/css/style.css"/>
</head>
    <body>
        <?php
        if(isset($_SESSION['admin'])){
            if($_SESSION['admin'] == 1){

            //Get the Database object
            include('../php/database.php');
            $database = new Database();
            
            $sections = $database->getAllSections();
            ?>
            <div class="bodyDiv">
                <div class="contentDiv">
                    <div class="titleHome">
                        <h1>
                            Surnom des enseignants
                        </h1>
                    </div>
                    <nav class="menu">
                        <p class="titleMenu">
                            Zone pour le menu
                        </p>
                    </nav>
                    <div class="addTeacher">
                        <div class="titleAddTeachers">
                            <h2>
                                Ajout d'un enseignant
                            </h2>
                        </div>
                        <div class="formAddTeacher">
                            <?php
                            if(isset($_GET['error']) && $_GET['error'] == 1){
                            ?>
                            <div class="errorMessageInsertTeacher">
                                <p>
                                    Veuillez remplir correctement tous les champs
                                </p>
                            </div>
                            <?php
                            }
                            ?>
                            <form action="../php/createTeacher.php" method="post">
                                <input type="radio" name="Sex" value="M" id="Men">
                                <label for="Men"class="radioLabelSex">Homme</label>
                                <input type="radio" name="Sex" value="F" id="Women">
                                <label for="Women" class="radioLabelSex">Femme</label>
                                <input type="radio" name="Sex" value="O" id="Other">
                                <label for="Other"class="radioLabelSex">Autre</label><br>
                                <label for="Name">Nom : </label>
                                <input type="text" name="Name" class="name"><br>
                                <label for="Firstname">Prénom : </label>
                                <input type="text" name="Firstname" class="firstname"><br>
                                <label for="Nickname">Surnom : </label>
                                <input type="text" name="Nickname" class="nickname"><br>
                                <label for="Origin">Origine : </label>
                                <Textarea name="Origin" class="origin" rows="4" cols="50"></Textarea><br>
                                <select name="Section" class="section">
                                    <option value="0">--Section--</option>
                                    <?php 
                                    foreach ($sections as $key => $value) {
                                        ?>
                                        <option value="<?=$sections[$key]['idSection']?>"> <?=$sections[$key]['secName']?></option>  
                                        <?php
                                    }
                                    ?>
                                </select><br>
                                <input type="submit" name="btnSubmit" value="Créer" class="submit">
                                <input type="reset" name="btnDelte" value="Effacer" class="delete">
                            </form>
                        </div>
                        <div class="backHome">
                            <a href="/GentilNickname/GentilNickname/src/html/home.php">retour à la page d'acceuil</a>
                        </div>
                    </div>
                    <footer class="footer">
                        <p>&copy; Charpié Emilien - 2022</p>
                    </footer>
                </div>
            </div>
            <?php
            }else{
                ?>
                <h1>Vous devez posseder les droits administrateurs pour visualiser cette page...</h1>
                <?php
            }
        }else{
            ?>
            <h1>Vous devez vous connecter pour visualiser cette page</h1>
            <?php
        }
        ?>
    </body>
</html>