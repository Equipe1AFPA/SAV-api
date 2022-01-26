<?php

    if(!empty($_POST)){
        if ((isset($_POST['nom']) && !empty($_POST['nom'])) && (isset($_POST['prenom']) && !empty($_POST['prenom']))&&(isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['rpt_password']) && !empty($_POST['rpt_password']))&& (isset($_POST['user_type']) && !empty($_POST['user_type']))){
            if ($_POST['password'] == $_POST['rpt_password']){

                try{
                    $newUser = new User();
                    $newUser->setIdentifiant($_POST['nom']." ".$_POST['prenom'])
                            ->setPassword(hash('sha256', $_POST['password']));

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

                    $newUser->save();
                }
                catch (Exception $exc){
                    echo $exc->getMessage();
                }
            }
        }
    }
    ?>