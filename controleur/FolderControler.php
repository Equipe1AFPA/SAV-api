<?php


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
        switch ($status) {
            case 'Attente de reception du/des produit(s)':
                $colorId = 1;
                break;
            case 'Produit(s) réceptionné(s)':
                $colorId = 2;
                break;
            case 'En attente de diagnostique':
                $colorId = 3;
                break;
            case 'En attente de clôture':
                $colorId = 4;
                break;
            case 'Clôturé':
                $colorId = 5;
                break;
            case 'Annulé':
                $colorId = 6;
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

$arrFolder = FolderRepository::findAll();
showTable($arrFolder)

?>