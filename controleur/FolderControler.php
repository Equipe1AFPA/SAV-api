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
        echo <<<FOLDER_TABLE
            <tr class="table-row" data-href="../pages/visualisationdossier.php?folid=$id">
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