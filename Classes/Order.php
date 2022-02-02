<!-- GERMAIN FLORIAN : réalisation de la classe du dossier SAV (25/01)-->

<?php 

class Order {
    private $id;
    private $denomination;
    private $type;
    private $ordernumber;
    private $status;
    private $adrLine1;
    private $adrLine2;
    private $adrLine3;
    private $adrZip;
    private $adrCountry;
    private $adrState;
    private $adrCity;
    private $date;
    private $folderDetail;

    // Création des getter et setter.

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

    public function getAdrLine1(){
        return $this->adrLine1;
    }

    public function setAdrLine1($adrLine1){
        $this->adrLine1 = $adrLine1;
        return $this;
    }

    public function getAdrLine2(){
        return $this->adrLine2;
    }

    public function setAdrLine2($adrLine2){
        $this->adrLine2 = $adrLine2;
        return $this;
    }

    public function getAdrLine3(){
        return $this->adrLine3;
    }

    public function setAdrLine3($adrLine3){
        $this->adrLine3 = $adrLine3;
        return $this;
    }

    public function getAdrZip(){
        return $this->adrZip;
    }

    public function setAdrZip($adrZip){
        $this->adrZip = $adrZip;
        return $this;
    }

    public function getAdrCountry(){
        return $this->adrCountry;
    }

    public function setAdrCountry($adrCountry){
        $this->adrCountry = $adrCountry;
        return $this;
    }

    public function getAdrState(){
        return $this->adrState;
    }

    public function setAdrState($adrState){
        $this->adrState = $adrState;
        return $this;
    }

    public function getAdrCity(){
        return $this->adrCity;
    }

    public function setAdrCity($adrCity){
        $this->adrCity = $adrCity;
        return $this;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
        return $this;
    }
    
    public function getFolderDetail(){
        return $this->folderDetail;
    }

    public function setFolderDetail($folderDetail){
        $this->folderDetail = $folderDetail;
        return $this;
    }
}
?>