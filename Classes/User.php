<?php
class User {
    private $id;
    private $identifiant;
    private $password;
    private $type;


    // Création des getter et setter.

    public function getId(){
        return $this->id;
    }

    public function getIdentifiant(){
        return $this->identifiant;
    }

    public function getPassword(){
        return $this->password;
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

    // Création d'une fonction save, pour inserer ou mettre à jour un utilisateur.
   
    public function save(){
        $connectorDB = Connect::getInstance();

        // Vérification de si un utilisateur a le meme identifiant pour choisir entre update ou créer.
        
        $connectorDB->query("SELECT `USR_ID` FROM `t_d_user_usr` WHERE `USR_NAME` = :identifiant ");
        $connectorDB->bind('identifiant', $this->identifiant);
        if (!empty($connectorDB->single())){
        $idData = $connectorDB->single();
        $this->id = $idData['USR_ID'];
        }
        if($this->id === null){
            $connectorDB->query("INSERT INTO `t_d_user_usr` (`USR_NAME`, `USR_PSW`, `UTP_ID`) VALUES (:identifiant, :hashPsw, :grade)");
            echo <<<INSER_USER
                    L'utilisateur $this->identifiant a été ajouté.
                    INSER_USER;
        }else{
            $connectorDB->query("UPDATE `t_d_user_usr` SET `USR_NAME` = :identifiant, `USR_PSW` = :hashPsw, `UTP_ID` = :grade WHERE `USR_ID` = :id ");
            $connectorDB->bind('id', $this->id);
            echo <<<UPDATE_USER
                    L'utilisateur $this->identifiant a été modifié.
                    UPDATE_USER;
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