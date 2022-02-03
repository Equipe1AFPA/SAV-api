<?php

class OrderRepository {

    // Fonction pour donner des valeurs à nos variables dans l'objet Order que nous sommes entrain de creer. On l'utilise plusieur fois dans les fonctions suivante donc on les centralise dans une fonction.
    private static function createOrderFromMysqlRow(array $mysqlRow) : Order {
        $order = new Order();
        $order->setOrdernumber($mysqlRow['OHR_ORDERNUMBER'])
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
        return $order;
    }

    // Fonction pour se connecter à la DB, préparer la requête SQL.

    public static function findAll($requestWhere) : array {
        $connectorDB = Connect::getInstance();

        // On utilise la variable $requestWhere qui permet d'ajouter des paramètres de filtre a notre recherche.
        
        $connectorDB->query("SELECT * FROM `t_d_savfolder_fol`JOIN `t_d_ordernumber_ohr` USING (FOL_ID) JOIN `t_d_address_adr` ON `ADR_ID` LIKE `ADR_ID_BILL` $requestWhere");
        
        // On utilise la fonction resultset() présente dans ma classe Connect, qui permet d'executer et de fetchALL mes données dans un tableau.

        $sqlResult = $connectorDB->resultset();
        $arrOrder = [];

        // On crée chaque objet Order pour chaques éléments de notre tableau que nous avons fetchALL juste avant, et on set ses valeurs grace à notre fonction createOrderFromMysqlRow().
        foreach ($sqlResult as $orderData) {
           $arrOrder[] = static::createOrderFromMysqlRow($orderData);           
        }
        return $arrOrder;
    }
}
?>