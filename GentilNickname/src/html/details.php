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
    <title>Enseignant - Détails</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GentilNickname/GentilNickname/resources/css/style.css"/>
</head>
    <body>
        <?php
        if(isset($_SESSION['id']) && intval($_GET['id'])){

            //Get the Database object
            include('../php/database.php');
            $database = new Database();
            
            $teacher = $database->getOneTeacher($_GET['id']);
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
                    <div class="detailsContent">
                        <div class="titleDetails">
                            <h2>
                                <?php
                                    echo "Détails : " . $teacher[0]['teaFirstname'] . " " . $teacher[0]['teaName'];
                                ?>
                            </h2>
                            <?php
                                if($teacher[0]['teaGender'] == "M"){
                                    echo "<img src=\"/GentilNickname/GentilNickname/resources/images/symbolMen.png\" alt=\"Men symbole\" class=\"sexSymbol\">";
                                } elseif($teacher[0]['teaGender'] == "F"){
                                    echo "<img src=\"/GentilNickname/GentilNickname/resources/images/symbolWomen.jpg\" alt=\"Women symbole\" class=\"sexSymbol\">";
                                }else{
                                    echo "<p style=\"margin-top: 30px;\">Autre</p>";
                                }
                            ?>
                            <p class="section">
                                <?php
                                    echo $teacher[0]['secName'];
                                ?>
                            </p>
                            <?php
                            if($_SESSION['admin'] == 1){
                            ?>
                            <div class="editDelete">
                                <?php
                                    echo "
                                    <a href=\"/GentilNickname/GentilNickname/src/html/editTeacher.php?id=" . $teacher[0]['idTeacher'] . "\"><img src=\"/GentilNickname/GentilNickname/resources/images/edit.png\" alt=\"Edit\" class=\"settingsPictureDetailsPage\"></a>
                                    <img src=\"/GentilNickname/GentilNickname/resources/images/delete.jpg\" alt=\"Delete\" class=\"settingsPictureDetailsPage deleteButton\" onclick=\"confirmDelete(" . $teacher[0]['idTeacher'] . ")\">
                                    ";
                                ?>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="contentNickNameElect">
                            <div class="contentNicknameAndReason">
                                <div class="nickname">
                                    <p>
                                        <?php
                                            echo "Surnom : " . $teacher[0]['teaNickname'];
                                        ?>
                                    </p>
                                </div>
                                <div class="reasonNickname">
                                    <p>
                                        <?php
                                            echo $teacher[0]['teaOrigine'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="contentElect">
                                <a href="/GentilNickname/GentilNickname/src/php/electTeacher.php?id=<?=$_GET['id']?>">J'élis</a>
                                <p class="numberOfVoices">
                                    <?php
                                    if($teacher[0]['teaVoix'] > 0){
                                    ?>
                                    Nombre de voix : <?= $teacher[0]['teaVoix']?>
                                    <?php
                                    }else{
                                    ?>
                                    Aucun votes
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
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
            <h1>Veuillez vous connecter pour acceder à cette page...</h1>
            <?php
        }
        ?>
        <div class="backgroudDiv"></div>
        <div class="confirmDelete">
            <div class="titleConfirmDelte">
                <h4>Voulez-vous vraiment supprimer le proffesseur ?</h4>
            </div>
            <div class="buttonConfirmDelete">
                <div class="confirm">
                    <p>Confirmer</p>
                </div>
                <div class="cancel">
                    <p>Annuler</p>
                </div>
            </div>
        </div>
        <script src="../js/delete.js"></script>
    </body>
</html>