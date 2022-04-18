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
    <title>Enseignant - Modifier</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GentilNickname/GentilNickname/resources/css/style.css"/>
</head>
    <body>
        <?php
        if(isset($_SESSION['admin'])){
            if($_SESSION['admin'] == 1 && intval($_GET['id'])){

                //Get the Database object
                include('../php/database.php');
                $database = new Database();
                
                $teacher = $database->getOneTeacher($_GET['id']);
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
                                Modification d'un enseignant
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
                            <form action="../php/teacherEdit.php" method="post">
                            <?php
                                if($teacher[0]['teaGender'] == "M"){
                            ?>
                                <input type="radio" name="sex" value="M" id="men" checked>
                                <label for="men"class="radioLabelSex">Homme</label>
                                <input type="radio" name="sex" value="F" id="women">
                                <label for="women" class="radioLabelSex">Femme</label>
                                <input type="radio" name="sex" value="O" id="other">
                                <label for="other"class="radioLabelSex">Autre</label><br>
                            <?php
                                }elseif($teacher[0]['teaGender'] == "F"){
                            ?>
                                <input type="radio" name="sex" value="M" id="men">
                                <label for="men"class="radioLabelSex">Homme</label>
                                <input type="radio" name="sex" value="F" id="women" checked>
                                <label for="women" class="radioLabelSex">Femme</label>
                                <input type="radio" name="sex" value="O" id="other">
                                <label for="other"class="radioLabelSex">Autre</label><br>
                            <?php
                                }else{
                            ?>
                                <input type="radio" name="sex" value="M" id="men">
                                <label for="men"class="radioLabelSex">Homme</label>
                                <input type="radio" name="sex" value="F" id="women">
                                <label for="women" class="radioLabelSex">Femme</label>
                                <input type="radio" name="sex" value="O" id="other" checked>
                                <label for="other"class="radioLabelSex">Autre</label><br>
                            <?php
                                }
                            ?>
                                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                <label for="name">Nom : </label>
                                <input type="text" name="name" class="name" value="<?=$teacher[0]['teaName']?>"><br>
                                <label for="firstname">Prénom : </label>
                                <input type="text" name="firstname" class="firstname" value="<?=$teacher[0]['teaFirstname']?>"><br>
                                <label for="nickname">Surnom : </label>
                                <input type="text" name="nickname" class="nickname" value="<?=$teacher[0]['teaNickname']?>"><br>
                                <label for="origin">Origine : </label>
                                <Textarea name="origin" class="origin" rows="4" cols="50"><?=$teacher[0]['teaOrigine']?></Textarea><br>
                                <select name="section" class="section">
                                    <option value="0">--Section--</option>
                                    <?php 
                                    foreach ($sections as $key => $value) {
                                        if($sections[$key]['secName'] == $teacher[0]['secName']){
                                        ?>
                                        <option value="<?=$sections[$key]['idSection']?>" selected> <?=$sections[$key]['secName']?></option>  
                                        <?php
                                        }else{
                                        ?>
                                        <option value="<?=$sections[$key]['idSection']?>"> <?=$sections[$key]['secName']?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select><br>
                                <input type="submit" name="btnSubmit" value="Modifier" class="submit">
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