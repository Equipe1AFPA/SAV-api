<?php

class OrderRepository {

    private static function createFolderFromMysqlRow(array $mysqlRow) : Order {
        $folder = new Order();
        $folder->setOrdernumber($mysqlRow['OHR_ORDERNUMBER'])
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
            ->setDate($mysqlRow['FOL_CREATIONDATE'])
            ->setId($mysqlRow['OHR_ID']);            
        return $folder;
    }

    public static function findAll($requestWhere) : array {
        $connectorDB = Connect::getInstance();
        $connectorDB->query("SELECT * FROM `t_d_savfolder_fol`JOIN `t_d_ordernumber_ohr` USING (FOL_ID) JOIN `t_d_address_adr` ON `ADR_ID` LIKE `ADR_ID_BILL` $requestWhere");
        $sqlResult = $connectorDB->resultset();
        $arrOrder = [];
        foreach ($sqlResult as $orderData) {
           $arrOrder[] = static::createFolderFromMysqlRow($orderData);           
        }
        return $arrOrder;
    }
}
?>