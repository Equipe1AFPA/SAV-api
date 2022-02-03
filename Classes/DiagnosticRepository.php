<!-- GERMAIN Florian : controller pour le diagnostic -->

<?php

class DiagnosticRepository {

    // Création de la fonction pour donner des valeurs aux variables de Diagnostic
    private static function createDiagnosticFromMysqlRow(array $mysqlRow) : Diagnostic {
        $Diag = new Diagnostic();
        $Diag->setFolderNumber($mysqlRow['FOL_FOLDERNUMBER'])
            ->setOrdernumber($mysqlRow['OHR_ORDERNUMBER'])
            ->settype($mysqlRow['FOL_TYPE'])
            ->setDenomination($mysqlRow['ADR_DENOMINATION'])
            ->setCreationDate($mysqlRow['FOL_CREATIONDATE'])
            ->setImageDiagnostic($mysqlRow['DNC_IMG'])
            ->setDetailDossier($mysqlRow['PRD_REFERENCE'])
            ->setCommentaire($mysqlRow['DNC_COMMENTAIRE'])
            ->setSupplier($mysqlRow['PRD_SUPPLIER'])      
            ->setId($mysqlRow['FOL_ID']);            
        return $Diag;
    }

    // Création de la fonction pour se connecter a la BDD et sélectionne ce qui nous intéresse
    public static function getByID(string $id) : Diagnostic {
        $connectorDB = Connect::getInstance();
        $connectorDB->query("SELECT * FROM `t_d_savfolder_fol` AS fol JOIN `t_d_ordernumber_ohr` AS ohr USING (FOL_ID) JOIN `t_d_address_adr` ON `ADR_ID` LIKE `ADR_ID_BILL` JOIN `t_d_orderdetail_odt` od ON ohr.ohr_id LIKE od.ohr_id JOIN `t_d_product_prd` prd ON od.prd_id like prd.prd_id JOIN `t_d_folderdetail_dtl` dtl ON prd.prd_id LIKE dtl.prd_id JOIN `t_d_diagnostic_dnc` dnc on dtl.dtl_id LIKE dnc.dtl_id WHERE fol.FOL_ID = :id");
        $connectorDB->bind('id', $id);
        $DiagData = $connectorDB->resultset();
        if (count($DiagData) !== 0) {
            return static::createDiagnosticFromMysqlRow($DiagData[0]);
        }else{
            return null;
        }
    }
}
?>