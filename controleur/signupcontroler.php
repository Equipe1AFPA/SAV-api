<?php
    // Vérification que le $_POST n'est pa vide pour effectuer la suite.

    if(!empty($_POST)){

        // Vérification  que les input sont bien tous rempli.

        if ((isset($_POST['nom']) && !empty($_POST['nom'])) && (isset($_POST['prenom']) && !empty($_POST['prenom']))&&(isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['rpt_password']) && !empty($_POST['rpt_password']))&& (isset($_POST['user_type']) && !empty($_POST['user_type']))){

            // Vérification de la similitude du password entré et de la seconde entrée pour verifier qu'ils sont bien identique.

            if ($_POST['password'] == $_POST['rpt_password']){

                // tentative de création d'un objet de la classe User, suivit de l'insertion des attributs de ce objet.
                
                try{
                    $newUser = new User();
                    $newUser->setIdentifiant($_POST['nom']." ".$_POST['prenom'])
                            ->setPassword(hash('sha256', $_POST['password']));

                    // Switch pour inserer la valeur de l'attribut voulu en fonction de notre choix dans le menu select de notre formulaire.

                    switch ($_POST['user_type']){
                        case 'Admin':
                            $newUser->setType(1);
                            break;
                        case 'sav':
                            $newUser->setType(2);
                            break;
                        case 'hotline':
                            $newUser->setType(3);
                            break;
                    }

                    // Lancement de la fonction save pour inserer le nouvel utilisateur dans la base de données.

                    $newUser->save();
                }
                catch (Exception $exc){
                    echo $exc->getMessage();
                }
            }
        }
    }
    ?>