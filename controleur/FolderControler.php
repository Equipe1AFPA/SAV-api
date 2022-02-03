<?php

// Fonction qui permet de générer le tableuau d'affichage des dossiers.
function showTable($pTable){
    echo <<<FOLDER_TABLE_HEADER
            <table class="table table-bordered table-striped table-hover">
                <tr><th>Dossier N°</th>
                    <th>N° de commande</th>
                    <th>Nom du client</th>
                    <th>Statut</th>
                </tr>
    FOLDER_TABLE_HEADER;
    foreach ($pTable as $pRow) {
        $folderNumber = $pRow->getFolderNumber();
        $ordernumber = $pRow->getOrdernumber();
        $denomination = $pRow->getDenomination();
        $status = $pRow->getStatus();
        $id = $pRow->getId();

        // Switch pour assigner un ID en fonction du statut du dossier.

        switch ($status) {
            case 'Attente de reception du/des produit(s)':
                $colorId = 'colorID1';
                break;
            case 'Produit(s) réceptionné(s)':
                $colorId = 'colorID2';
                break;
            case 'En attente de diagnostique':
                $colorId = 'colorID3';
                break;
            case 'En attente de clôture':
                $colorId = 'colorID4';
                break;
            case 'Clôturé':
                $colorId = 'colorID5';
                break;
            case 'Annulé':
                $colorId = 'colorID6';
                break;
        }
        echo <<<FOLDER_TABLE
            <tr id="$colorId" class="table-row" data-href="../pages/visualisationdossier.php?folid=$id">
                <td>$folderNumber</td>
                <td>$ordernumber</td>
                <td>$denomination</td>
                <td>$status</td>
            </tr> 
        FOLDER_TABLE;
    } 
    echo "</table>";
}

// Connexion à la classe FolderRepository qui permet la création de chaque objet Folder pour les affichezr dans mon tableau.
$arrFolder = FolderRepository::findAll();
showTable($arrFolder)

?>