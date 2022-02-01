<?php
$folder = FolderRepository::getByID($_GET['folid']);

$folderNum = $folder->getFolderNumber();
$folderName = $folder->getDenomination();
$folderCreation = $folder->getCreationDate();
$folderType = $folder->getType();
$orderNum = $folder->getOrdernumber();
$adrLine1 = $folder->getAdrLine1();
$adrLine2 = $folder->getAdrLine2();
$adrLine3 = $folder->getAdrLine3();
$adrZip = $folder->getAdrZip();
$adrCountry = $folder->getAdrCountry();
$adrState = $folder->getAdrState();
$adrCity = $folder->getAdrCity();
$status = $folder->getStatus();
?>
