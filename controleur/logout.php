<?php session_start(); 

// petit script pour se deconnecter de la session en cours

session_destroy();
header('location: ../pages/index.php');
exit();
?>
