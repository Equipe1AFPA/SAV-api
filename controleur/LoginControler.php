<?php

/**
*
* @author Florian DE BIASI
*/

    // Vérification que le $_POST n'est pa vide pour effectuer la suite.

    if(!empty($_POST)){

        // Vérification  que les input sont bien tous rempli.

        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password']))){

            // Création de variable pour réccupérer les valeur entrées dans notre formulaire.

            $userName = trim($_POST['login']);
            $password = $_POST['password'];
            $hashed_password = hash('sha256', $password);

            // tentative de création d'un objet de la classe Login en utilisant les variables précédement créé.

            try{
                $login = new Login($userName,$hashed_password);

                // Utilisation de la fonction getLogged pour  vérifier si nos variables correspondent bien à des valeurs présentent dans la base de données, si c'est vrai ouverture d'une session et renvoit sur la page index.
                $user = $login->getLogged();
                if(!empty($user)){
                    $_SESSION['loggedUser'] = $user;
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