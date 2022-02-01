<?php

class FolderRepository {

    private static function createFolderFromMysqlRow(array $mysqlRow) : Folder {
        $folder = new Folder();
        $folder->setFolderNumber($mysqlRow['FOL_FOLDERNUMBER'])
            ->setOrdernumber($mysqlRow['OHR_ORDERNUMBER'])
            ->setHTYID($mysqlRow['HTY_ID'])
            ->settype($mysqlRow['FOL_TYPE'])
            ->setDenomination($mysqlRow['ADR_DENOMINATION'])
            ->setStatus($mysqlRow['FOL_STATUS'])
            ->setAdrLine1($mysqlRow['ADR_LINE1'])
            ->setAdrLine2($mysqlRow['ADR_LINE2'])
            ->setAdrLine3($mysqlRow['ADR_LINE3'])
            ->setAdrZip($mysqlRow['ADR_ZIPCODE'])
            ->setAdrCountry($mysqlRow['ADR_COUNTRY'])
            ->setAdrState($mysqlRow['ADR_STATE'])
            ->setAdrCity($mysqlRow['ADR_CITY'])
            ->setCreationDate($mysqlRow['FOL_CREATIONDATE'])
            ->setReceptionDate($mysqlRow['FOL_RECEPTIONDATE'])
            ->setId($mysqlRow['FOL_ID']);            
        return $folder;
    }

    public static function findAll() : array {
        $connectorDB = Connect::getInstance();
        $connectorDB->query("SELECT *  FROM `t_d_savfolder_fol`JOIN `t_d_ordernumber_ohr` USING (FOL_ID) JOIN `t_d_address_adr` ON `ADR_ID` LIKE `ADR_ID_BILL`");
        $sqlResult = $connectorDB->resultset();
        $arrFolder = [];
        foreach ($sqlResult as $folderData) {
           $arrFolder[] = static::createFolderFromMysqlRow($folderData);           
        }
        return $arrFolder;
    }

    public static function getByID(string $id) : Folder {
        $connectorDB = Connect::getInstance();
        $connectorDB->query("SELECT *  FROM `t_d_savfolder_fol`JOIN `t_d_ordernumber_ohr` USING (FOL_ID) JOIN `t_d_address_adr` ON `ADR_ID` LIKE `ADR_ID_BILL` WHERE `FOL_ID` = :id");
        $connectorDB->bind('id', $id);
        $folderData = $connectorDB->resultset();
        if (count($folderData) !== 0) {
            return static::createFolderFromMysqlRow($folderData[0]);
        }else{
            return null;
        }
    }
}
?>