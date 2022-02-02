<?php 
  spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
  });
  session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Création du ticket</title>

      <!-- Lien de connexion bootstrap, php, jquery. -->


<link rel="stylesheet" type="text/css" href='../css/login.css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>
      <?php include ('../apparence/header.php');?>     
      <div class="container objContainer">
            <h3><strong>Nouveau ticket</strong></h3>
            <form method="POST">
                  <div class="form-row form-group form-control">
                        <h5 class="container">Recherche de la commande</h5>
                        <div class="col-6">
                              <div class="input-group">
                              <input class="form-control" id="system-search" name="orderNum" placeholder="Numéro de commande">
                              </div>
                        </div>
                        <div class="col-6">
                              <div class="input-group">
                              <input class="form-control" id="system-search" name="adrDenomination" placeholder="Nom du client">
                              </div>
                        </div>
                        <div class="col-6">
                              <div class="input-group">
                              <input class="form-control" id="system-search" name="adrCity" placeholder="Ville">
                              </div>
                        </div>
                        <div class="col-6">
                              <div class="input-group">
                              <input class="form-control" id="system-search" name="adrZip" placeholder="Code Postal">
                              </div>
                        </div>
                        <div class="col-6">
                              <div class="input-group">
                              <input class="form-control" id="system-search" name="adrCountry" placeholder="Pays">
                              </div>
                        </div>
                        <div class="col-6">
                              <div class="input-group">
                              <input class="form-control" id="system-search" name="adrState" placeholder="Région">
                              </div>
                        </div>
                        <button class="button btn-block btn-lg" type="submit">Rechercher</button>
                  </div>
                  <?php include('../controleur/OrderControler.php');?>
            </form>
                  <div class="form-row form-group form-control">
                        <h5 class="container">Numéro de dossier</h5>
                        <div class="col-4">
                              <label for="formSelectMois">Mois</label>
                              <select class="form-control" id="formSelectMois">
                                    <option>Janvier (01)</option>
                                    <option>Février (02)</option>
                                    <option>Mars (03)</option>
                                    <option>Avril (04)</option>
                                    <option>Mai (05)</option>
                                    <option>Juin (06)</option>
                                    <option>Juillet (07)</option>
                                    <option>Août (08)</option>
                                    <option>Septembre (09)</option>
                                    <option>Octobre (10)</option>
                                    <option>Novembre (11)</option>
                                    <option>Décembre (12)</option>
                              </select>
                        </div>
                        <div class="col-4">
                              <label for="formSelectMois">Année</label>
                              <input type="text" class="form-control" placeholder="2000">
                        </div>
                        <div class="col-4">
                              <label for="formSelectMois">Type de dossier</label>
                              <select class="form-control" id="formSelectMois">
                                    <option>N'habite pas à l'adresse indiquée (NAI)</option>
                                    <option>Nom present lors de la livraison (NP)</option>
                                    <option>Erreur client (EC)</option>
                                    <option>Erreur préparation (EP)</option>
                                    <option>Service après vente (SAV)</option>
                              </select>
                        </div>
                  </div>
                  <div class="form-row form-group form-control">
                        <h5 class="container">Nom du client</h5>            
                        <div class="col">
                              <input type="text" class="form-control" placeholder="Nom">
                        </div>
                        <div class="col">
                              <input type="text" class="form-control" placeholder="Prenom">
                        </div>
                  </div>      
                  <div class="form-group">
                        <label for="exampleFormControlTextarea1">Commentaires - Précisions</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                        <a class="button btn-block btn-lg" href="Details.php" role="button">Création de ticket</a>
                  </div>
      </div>
</body>
</html>