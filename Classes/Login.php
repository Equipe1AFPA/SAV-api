<?php


class Login {

    private $userName;
    private $password;
    private $connectorDB;


    public function __construct($userName,$password){
        
        //Appel de la fonction setData pour donner des valeur à nos variables.
        $this->setData($userName,$password);
    }

    private function setData($userName,$password){
        $this->userName=$userName;
        $this->password=$password;
    }

    public function getLogged(){
        $connectorDB = Connect::getInstance();
        $connectorDB->query("SELECT * FROM `t_d_user_usr` WHERE `USR_NAME` = :userName AND `USR_PSW` = :userPassword");
        $connectorDB->bind('userName', $this->userName, PDO::PARAM_STR);
        $connectorDB->bind('userPassword', $this->password);
        $sqlResult= count($connectorDB->resultset());
        if ($sqlResult !== 0){
            return TRUE;

        }else{
            throw new Exception("Nom d'utilisateur et mot de passe invalide");
        }        
    }
}

?>