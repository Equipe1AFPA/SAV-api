<?php


class Login {

    private $userName;
    private $password;
    private $connectorDB;

    // Constructeur

    public function __construct($userName,$password){
        
        //Appel de la fonction setData pour donner des valeur à nos variables.
        $this->setData($userName,$password);
    }

    // Fonction setData qui a pour but de donner des valeurs aux variables de la classe.

    private function setData($userName,$password){
        $this->userName=$userName;
        $this->password=$password;
    }

    // Fonction pour vérifier si notre userName et notre password existent et sont bien lié l'un a l'autre, et retourne en fonction du resultat TRUE si c'est vrai ou un message d'erreur si c'est faux.

    public function getLogged(){
        $connectorDB = Connect::getInstance();
        $connectorDB->query("SELECT * FROM `t_d_user_usr` WHERE `USR_NAME` = :userName AND `USR_PSW` = :userPassword");
        $connectorDB->bind('userName', $this->userName, PDO::PARAM_STR);
        $connectorDB->bind('userPassword', $this->password);
        $sqlResult= count($connectorDB->resultset());
        if ($sqlResult !== 0){

            // Création d'un objet user pour utiliser les valeur de l'utilisateur connecté via la session (comme son identifiant ou son type).
            
            $userData = $connectorDB->single();
            if (count($userData) !== 0) {
                $user= new User();
                $user->setId($userData['USR_ID']);
                $user->setIdentifiant($userData['USR_NAME']);
                $user->setPassword($userData['USR_PSW']);
                $user->setType($userData['UTP_ID']);
            }

        return $user;

        }else{
            throw new Exception("Nom d'utilisateur et mot de passe invalide");
        }        
    }
}

?>