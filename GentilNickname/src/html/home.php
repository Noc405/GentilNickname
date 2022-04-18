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
    <title>GentilNickname - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GentilNickname/GentilNickname/resources/css/style.css"/>
</head>
    <body>
        <?php
        //Get the Database object
        include('../php/database.php');
        $database = new Database();

        $teachers = $database->getAllTeachers();
        ?>
        <div class="bodyDiv">
            <div class="contentDiv">
                <div class="titleHome">
                    <h1>
                        Surnom des enseignants
                    </h1>
                    <?php
                    if(!isset($_SESSION['id'])){
                    ?>
                    <div class="formConnexionContent">
                        <form action="../php/login.php" method="post" class="formConnexion">
                            <input type="text" name="Login" placeholder="Login" class="inputFormConnexion">
                            <input type="text" name="Password" placeholder="Mot de passe" class="inputFormConnexion">
                            <input type="submit" name="btnSubmit" value="Se connecter" class="submitFormConnexion">
                        </form>
                        <?php
                        if(isset($_GET['error']) && $_GET['error'] == 1){
                        ?>
                        <div class="errorMessage">
                            <p>L'email ou le mot de passe est incorecte</p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="loginInfos">
                    <?php
                        if($_SESSION['admin'] == 0){
                    ?>
                        <p class="loginName"><?=$_SESSION['login'] . " (user)"?></p>
                    <?php
                        }else{
                            ?>
                            <p class="loginName"><?=$_SESSION['login'] . " (admin)"?></p>
                            <?php
                        }
                        ?>
                        <button class="logoutButton" onclick="window.location.href='../php/logout.php';">Se déconnecter</button>
                    </div>
                        <?php
                    }
                    ?>
                </div>
                <nav class="menu">
                    <p class="titleMenu">
                        Zone pour le menu
                    </p>
                </nav>
                <div class="teachers">
                    <div class="titleTeachers">
                        <h2>
                            Liste des enseignants
                        </h2>
                    </div>
                    <form action="/GentilNickname/GentilNickname/src/php/electTeacher.php" method="post" class="formElectTeacher">
                        <?php
                        if(isset($_SESSION['id'])){
                        ?>
                        <input type="submit" name="bnSubmitElectTeacher" value="élire plusieurs" class="submitElectManyTeachers">
                        <?php
                        }
                        ?>
                        <table class="arrayTeacher">
                            <tr class="titleArray">
                                <th></th>
                                <th>Nom</th>
                                <th>Surnom</th>
                                <th>Options</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach ($teachers as $key => $values){
                                    echo "<tr>";
                                    if(isset($_SESSION['id'])){
                                        echo"
                                        <td class=\"checkBoxTd\">
                                            <input type=\"checkbox\" name=\"electUser[]\" value=" . $teachers[$key]['idTeacher'] . ">
                                        </td>";
                                    }else{
                                        echo "<td></td>";
                                    }
                                    echo "                       
                                        <td>" . $teachers[$key]["teaFirstname"] . " " . $teachers[$key]["teaName"] . "</td>
                                        <td>" . $teachers[$key]["teaNickname"] . "</td>
                                    ";

                                    if(isset($_SESSION['id']) && $_SESSION['admin'] == 1){
                                        echo "
                                        <td>
                                            <a href=\"/GentilNickname/GentilNickname/src/html/editTeacher.php?id=" . $teachers[$key]['idTeacher'] . "\"><img src=\"/GentilNickname/GentilNickname/resources/images/edit.png\" alt=\"Edit\" class=\"menuPicture\"></a>
                                            <img src=\"/GentilNickname/GentilNickname/resources/images/delete.jpg\" alt=\"Delete\" class=\"menuPicture deleteButton\" onclick=\"confirmDelete(" . $teachers[$key]['idTeacher'] . ")\">
                                            <a href=\"/GentilNickname/GentilNickname/src/html/details.php?id=" . $teachers[$key]['idTeacher'] . "\"><img src=\"/GentilNickname/GentilNickname/resources/images/details.png\" alt=\"Details\" class=\"menuPicture\"></a>
                                        </td>";
                                    }else if(isset($_SESSION['id']) && $_SESSION['admin'] == 0){
                                        echo "
                                        <td>
                                            <a href=\"/GentilNickname/GentilNickname/src/html/details.php?id=" . $teachers[$key]['idTeacher'] . "\"><img src=\"/GentilNickname/GentilNickname/resources/images/details.png\" alt=\"Details\" class=\"menuPicture\"></a>
                                        </td>";
                                    }else{
                                        echo "<td></td>";
                                    }

                                    if(isset($_SESSION['id'])){
                                        if($teachers[$key]['teaVoix'] > 0)
                                        {
                                            if($key == 0){
                                                echo "
                                                <td>
                                                    <a href=\"/GentilNickname/GentilNickname/src/php/electTeacher.php?id=" . $teachers[$key]['idTeacher'] . "\">J'élis</a> " 
                                                    . $teachers[$key]['teaVoix'] . " Surnom le plus populaire " .
                                                "</td>";
                                            }else{
                                                echo "
                                                <td>
                                                    <a href=\"/GentilNickname/GentilNickname/src/php/electTeacher.php?id=" . $teachers[$key]['idTeacher'] . "\">J'élis</a> " 
                                                    . $teachers[$key]['teaVoix'] .
                                                "</td>";
                                            }
                                        }else{
                                            echo "
                                            <td>
                                                <a href=\"/GentilNickname/GentilNickname/src/php/electTeacher.php?id=" . $teachers[$key]['idTeacher'] . "\">J'élis</a>" 
                                                . " Allez élisez-moi" .
                                            "</td>";
                                        }
                                    }else{
                                        if($teachers[$key]['teaVoix'] > 0)
                                        {
                                            if($key == 0){
                                                echo "
                                                <td>"
                                                    . $teachers[$key]['teaVoix'] . " Surnom le plus populaire " .
                                                "</td>";
                                            }else{
                                                echo "
                                                <td>"
                                                    . $teachers[$key]['teaVoix'] .
                                                "</td>";
                                            }
                                        }else{
                                            echo "
                                            <td>"
                                                . "Aucun votes" .
                                            "</td>";
                                        }
                                    }

                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </form>
                    <?php
                    if(isset($_SESSION['admin'])){
                        if($_SESSION['admin'] == 1)
                        {
                    ?>
                    <div class="insertUser">
                        <p><a href="insertTeacher.php">Insérer un utilisateur</a></p>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <footer class="footer">
                    <p>&copy; Charpié Emilien - 2022</p>
                </footer>
            </div>
        </div>
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