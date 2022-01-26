<?php

    if(!empty($_POST)){
        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password']))){
            $userName = trim($_POST['login']);
            $password = $_POST['password'];
            $hashed_password = hash('sha256', $password);
            try{
                $login = new Login($userName,$hashed_password);
                if($login->getLogged() === TRUE){
                    session_start();
                    $_SESSION['loggedUser'] = $userName;
                    header('location: index.php');
                }
            }
            catch (Exception $exc){
                echo $exc->getMessage();
            }
        } else {
            $errorMessage = sprintf('Les informations ne permettent pas de vous identifier');
        }
    }
    ?>