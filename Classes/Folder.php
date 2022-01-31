<!-- GERMAIN FLORIAN : réalisation de la classe du dossier SAV (25/01)-->

<?php 

class Folder {
    private $id;
    private $HTY_ID;
    private $denomination;
    private $ordernumber;
    private $folderNumber;
    private $status;
    private $creationDate;
    private $receptionDate;


    public function getFolderNumber(){
        return $this->folderNumber;
    }


    public function setFolderNumber($folderNumber){
        $this->folderNumber = $folderNumber;
        return $this;
    }

    public function getHTYID(){
        return $this->HTY_ID;
    }


    public function setHTYID($HTY_ID){
        $this->HTY_ID = $HTY_ID;
        return $this;
    }

    public function getDenomination(){
        return $this->denomination;
    }


    public function setDenomination($denomination){
        $this->denomination = $denomination;
        return $this;
    }

    public function getOrdernumber(){
        return $this->ordernumber;
    }

    public function setOrdernumber($ordernumber){
        $this->ordernumber = $ordernumber;
        return $this;
    }


    public function getStatus(){
        return $this->status;
    }


    public function setStatus($status){
        $this->status = $status;
        return $this;
    }


    public function getCreationDate(){
        return $this->creationDate;
    }


    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
        return $this;
    }


    public function getReceptionDate(){
        return $this->receptionDate;
    }

    public function setReceptionDate($receptionDate){
        $this->receptionDate = $receptionDate;
        return $this;
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    
    public function save(){
        $connectorDB = Connect::getInstance();
        if($this->id === null){
            $connectorDB->query("INSERT INTO `t_d_savfolder_fol` (`FOL_ID`, `HTY_ID`, `FOL_FOLDERNUMBER`, `FOL_TYPE`, `FOL_STATUS`, `FOL_CREATIONDATE`, `FOL_RECEPTIONDATE`) VALUES (:id, :htyid, :foldernum, :foltype, :folstatus, :creationdate, :receptiondate)");
        }else{
            $connectorDB->query("UPDATE `t_d_savfolder_fol` SET `FOL_ID` = :id, `HTY_ID` = :htyid, `FOL_FOLDERNUMBER` = :foldernum, `FOL_TYPE` = :foltype,  `FOL_STATUS` = :folstatus, `FOL_CREATIONDATE` = :creationdate, `FOL_RECEPTIONDATE` = :receptiondate WHERE `FOL_ID` = :id ");
            $connectorDB->bind('id', $this->id);
        }       
        $connectorDB->bind('id', $this->id);
        $connectorDB->bind('htyid', $this->HTY_ID);
        $connectorDB->bind('foldernum', $this->foldernumber);
        $connectorDB->bind('foltype', $this->type);
        $connectorDB->bind('folstatus', $this->status);
        $connectorDB->bind('creationdate', $this->creationDate);
        $connectorDB->bind('receptiondate', $this->receptionDate);
        $connectorDB->execute();
        if($this->id === null){
            $this->setId($connectorDB->getLastInsertID());
        }
    }


}

?>