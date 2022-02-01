<?php

$multiRequest=[];
$research=FALSE;

if(isset($_POST['orderNum'])&&(!empty($_POST['orderNum']))){
    $orderNum = $_POST['orderNum'];
    $queryOrderNum = "OHR_ORDERNUMBER = '$orderNum'";
    array_push($multiRequest, $queryOrderNum);  
    $research=TRUE;  
}

if(isset($_POST['adrDenomination'])&&(!empty($_POST['adrDenomination']))){
    $adrDenomination = $_POST['adrDenomination'];
    $queryAdrDenomination = "ADR_DENOMINATION = '$adrDenomination'";
    array_push($multiRequest, $queryAdrDenomination);    
    $research=TRUE;
}

if(isset($_POST['adrCity'])&&(!empty($_POST['adrCity']))){
    $adrCity = $_POST['adrCity'];
    $queryAdrCity = "ADR_CITY = '$adrCity'";
    array_push($multiRequest, $queryAdrCity);  
    $research=TRUE;  
}

if(isset($_POST['adrZip'])&&(!empty($_POST['adrZip']))){
    $adrZip = $_POST['adrZip'];
    $queryAdrZip = "ADR_ZIPCODE = '$adrZip'";
    array_push($multiRequest, $queryAdrZip);   
    $research=TRUE; 
}

if(isset($_POST['adrCountry'])&&(!empty($_POST['adrCountry']))){
    $adrCountry = $_POST['adrCountry'];
    $queryAdrCountry = "ADR_COUNTRY = '$adrCountry'";
    array_push($multiRequest, $queryAdrCountry);   
    $research=TRUE; 
}

if(isset($_POST['adrState'])&&(!empty($_POST['adrState']))){
    $adrState = $_POST['adrState'];
    $queryAdrState = "ADR_STATE = '$adrState'";
    array_push($multiRequest, $queryAdrState); 
    $research=TRUE;   
}

if($research){
    $requestWhere = " WHERE ".implode(' AND ', $multiRequest);
}else{
    $requestWhere="";
}



function showTable($pTable){
    echo <<<FOLDER_TABLE_HEADER
            <table class="table table-bordered table-striped table-hover">
                <tr><th>N° de commande</th>
                    <th>Nom du client</th>
                    <th>Statut</th>
                </tr>
    FOLDER_TABLE_HEADER;
    foreach ($pTable as $pRow) {
        $ordernumber = $pRow->getOrdernumber();
        $denomination = $pRow->getDenomination();
        $status = $pRow->getStatus();
        $id = $pRow->getId();
        
        echo <<<FOLDER_TABLE
            <tr class="table-row" data-href="../pages/visualisationdossier.php?folid=$id">
                <td>$ordernumber</td>
                <td>$denomination</td>
                <td>$status</td>
            </tr> 
        FOLDER_TABLE;
    } 
    echo "</table>";
}

$arrOrder = OrderRepository::findAll($requestWhere);
showtable($arrOrder);
?>