<?php
class User {
    private $id;
    private $identifiant;
    private $password;
    private $type;

    public function getId(){
        return $this->id;
    }

    public function getIdentifiant(){
        return $this->identifiant;
    }

    public function getPassword(){
        return $this->getPassword;
    }

    public function getType(){
        return $this->type;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function setIdentifiant($identifiant){
        $this->identifiant = $identifiant;
        return $this;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function setType($type){
        $this->type = $type;
        return $this;
    }
   
    public function save(){
        $connectorDB = Connect::getInstance();
        if($this->identifiant === null){
            $connectorDB->query("INSERT INTO `t_d_user_usr` (`USR_NAME`, `USR_PSW`, `UTP_ID`) VALUES (:identifiant, :hashPsw, :grade)");
        }else{
            $connectorDB->query("UPDATE `t_d_user_usr` SET `USR_NAME` = :identifiant, `USR_PSW` = :hashPsw, `UTP_ID` = :grade WHERE `USR_NAME` = :identifiant ");
        }       
        $connectorDB->bind('identifiant', $this->identifiant);
        $connectorDB->bind('hashPsw', $this->password);
        $connectorDB->bind('grade', $this->type);
        $connectorDB->execute();
        if($this->id ===null){
            $this->setId($connectorDB->getLastInsertID());
        }
    }
}

?>