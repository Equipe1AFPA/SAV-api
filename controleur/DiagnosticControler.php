<?php
$diagnostic = DiagnosticRepository::getByID($_GET['folid']);

$folderNum = $diagnostic->getFolderNumber();
$clientName = $diagnostic->getDenomination();
$folderCreation = $diagnostic->getCreationDate();
$folderType = $diagnostic->getType();
$orderNum = $diagnostic->getOrdernumber();
$supplierName = $diagnostic->getSupplier();
$folderDetail = $diagnostic->getDetailDossier();
$folderCommentary = $diagnostic->getCommentaire();

?>
