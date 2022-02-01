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
      <title>Visualisation dossier</title>

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

      <?php 
      include ('../apparence/header.php');
      include ('../controleur/ShowFolderControler.php');
      
      echo<<<SHOW_FOLDER
                  <div class="container objContainer">
                        <div class="container row">
                              <h3 class="col"><strong>Dossier N° $folderNum</strong></h3>
                              <h3 class="col"><strong>Client : $folderName</strong></h3>
                        </div>
                        <div class="container form-group form-control ">
                              <div class="container row">
                                    <div class="container row">
                                          <h5 class="col">Détails</h5>
                                    </div>
                                    <div class="container row">
                                          <p class="col">Date de création : $folderCreation</p>
                                          <p class="col">Type de dossier : $folderType</p>
                                    </div>
                                    <div class="container justify-content-start">
                                          <p class="col">Bordereau de commande : $orderNum</p>
                                    </div>
                                          <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                      <th>Adresse de commande :</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                      <tr>
                                                            <td>$folderName</td>
                                                      </tr>
                                                      <tr>
                                                            <td>$adrLine1</td>
                                                      </tr>
                                                      <tr>
                                                            <td>$adrLine2</td>
                                                      </tr>
                                                      <tr>
                                                            <td>$adrLine3</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Code Postal : $adrZip</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Pays : $adrCountry</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Région : $adrState</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Ville : $adrCity</td>
                                                      </tr>
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                              <div class="form-group form-control form-row align-items-center justify-content-around">
                                    <div class="col-4">
                                          <p class="col">Date de création : <br> $status</p>
                                    </div>
                                    <div class="col-3">
                                          <a class="button btn-block btn-lg" href="diagnostic.php" role="button">Diagnostique</a>
                                    </div>
                                    <div class="col-3">
                                          <a class="button btn-block btn-lg" href="historique_dossier.php?folid=$myID" role="button">Historique du dossier</a>
                                    </div>
                              </div>
                              <div class="form-group form-control">
                                    <label for="exampleFormControlTextarea1">Commentaires - Précisions</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                        </div>
                  </div>
            SHOW_FOLDER
      ?>
</body>
 