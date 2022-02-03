<?php

/**
*
* @author Florian DE BIASI
*/

    // On teste si une valeur est entrée dans un des POST sinon ne se charge pas.
    if($_POST){

        // On crée une variable pour faire un tableau par la suite et on fais une varible set sur false pour charger ou non le complément de requete SQL.

        $multiRequest=[];
        $research=FALSE;

        // On teste si des valeurs sont entré dans les champs de recherche, puis on les sock dans le tableau précédement créé.

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

        // Si la variable booléenne est devenue TRUE, alors on "implode" le tableau contenant les divers paramètres de recherche et on les sépare d'un " AND " pour completer la requete SQL.

        if($research){
            $requestWhere = " WHERE ".implode(' AND ', $multiRequest);
        }else{
            $requestWhere="";
        }


        //  Fonction pour générer le tableau d'affichage des dossier disponnible une fois filtré par la recherche.
        function showTable($pTable){
            echo <<<FOLDER_TABLE_HEADER
                <div class="form-row form-group form-control">
                    <h5 class="container">Recherche de la commande</h5>
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
                    <tr id="$colorId" class="table-row table-hover" data-href="#">
                        <td>$ordernumber</td>
                        <td>$denomination</td>
                        <td>$status</td>
                    </tr> 
                FOLDER_TABLE;
            } 
            echo "</table></div>";
        }
        // On se connecte à la classe OrderRepository qui permet de générer un bobjet pour chaque dossier.
        $arrOrder = OrderRepository::findAll($requestWhere);
        showtable($arrOrder);
    }
?>