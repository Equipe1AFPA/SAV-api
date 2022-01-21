<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Acceuil</title>

      <!-- Lien de connexion bootstrap, php, jquery. -->

<link rel="stylesheet" type="text/css" href='css/login.css'>
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

<div class="container objContainer ">
      <a class="btn btn-primary btn-block btn-lg" href="pages/ticket.php" role="button">Création de Ticket</a>
</div>

 <div class="container objContainer">
      <h1>Les dossiers en cours</h1>
      <div class="row-inline">
            <div class="col-md-3 mx-auto p-2">
                  <form action="#" method="get">
                        <div class="input-group">
                        <input class="form-control" id="system-search" name="q" placeholder="Rechercher un dossier" required>
                              <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="bi bi-search"></i></button>
                              </span>
                        </div>
                  </form>
            </div>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Dossier N°</th>
            <th>Nom du client</th>
            <th>Statut</th>
            <th>Visualiser</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ma2019-12</td>
            <td>Giraud</td>
            <td>Attente de reception du/des produit(s)</td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
          <tr  class="table-primary">
            <td>Av2019-1</td>
            <td>Durand</td>
            <td> Produit(s) receptionné(s</td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
          <tr class="table-danger">
            <td>Jt2019-36</td>
            <td>Joly</td>
            <td>Diagnostique du/des produit(s)</td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
          <tr class="table-warning">
            <td>Ju2019-36</td>
            <td>Dupont</td>
            <td>Expédition partielle du/des produit (s)</td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
          <tr class="table-success">
            <td>Au2019-6</td>
            <td>Amar</td>
            <td>Cloturé </td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
          <tr class="table-dark">
            <td>No2019-9</td>
            <td>Shuber</td>
            <td>Annulé</td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
          <tr>
            <td>De2019-13</td>
            <td>Wald</td>
            <td>Attente de reception du/des produit(s)</td>
            <td><a class="btn btn-secondary" href="../pages/visualisationdossier.php" role="button">Details</a></td>
          </tr>
        </tbody>
      </table>
</div>
</body>
</html>