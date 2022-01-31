<?php 
  spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
  });
  session_start(); 
?>

<!-- GERMAIN FLORIAN: Réalisation de la page de diagnostique (18/01) -->
<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Page de diagnostique</title>

      <!-- Liens pour faire fonctionner/afficher la page -->      
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

<!-- Intégration de la page header -->
<?php include ('../apparence/header.php');?>

<!-- Container pour la recherche et l'affichage de dossier -->
      <div class="form-row form-group form-control col-12">
            <div class="container objContainer col-3">
            <h3><strong>Recherche et affichage des dossiers</strong></h3>
                  <form>
                        <div class="form-row form-group form-control">
                              <h5 class="container">Recherche</h5>
                              <div class="col-12">
                                    <form action="#" method="get">
                                          <div class="input-group">
                                          <input class="form-control" id="system-search" name="q" placeholder="Recherche par numéro de commande" required>
                                                <span class="input-group-btn">
                                                      <button type="submit" class="btn btn-default"><i class="bi bi-search"></i></button>
                                                </span>
                                          </div>
                                    </form>
                              </div>
                              <div class="col-12">
                                    <form action="#" method="get">
                                          <div class="input-group">
                                          <input class="form-control" id="system-search" name="q" placeholder="Recherche par numéro de dossier" required>
                                                <span class="input-group-btn">
                                                      <button type="submit" class="btn btn-default"><i class="bi bi-search"></i></button>
                                                </span>
                                          </div>
                                    </form>
                              </div>
                              <div class="col-12">
                                    <form action="#" method="get">
                                          <div class="input-group">
                                          <input class="form-control" id="system-search" name="q" placeholder="Recherche par nom du client" required>
                                                <span class="input-group-btn">
                                                      <button type="submit" class="btn btn-default"><i class="bi bi-search"></i></button>
                                                </span>
                                          </div>
                                    </form>
                              </div>
                              <div class="col-12">
                                    <form action="#" method="get">
                                          <div class="input-group">
                                          <input class="form-control" id="system-search" name="q" placeholder="Recherche par date de commande" required>
                                                <span class="input-group-btn">
                                                      <button type="submit" class="btn btn-default"><i class="bi bi-search"></i></button>
                                                </span>
                                          </div>
                                    </form>
                              </div>
                              <div class="form-group">
                                    <a class="btn btn-primary btn-block btn-lg" href="" role="button">Rechercher</a>   
                              </div>               
                              <div class="form-group">
                                    <a class="btn btn-primary btn-block btn-lg" href="" role="button">Réinitialiser</a>   
                              </div>               
                        </div>
                        <div class="form-row form-group form-control">
                              <div class="form-group col">
                              <label for="bio">Dossiers</label>
                              <textarea class="form-control shadow" id="bio"></textarea>
                            </div>
                        </div>
                  </form>
            </div>

            <!-- Container pour les infos du dossier -->      
            <div class="container objContainer">
            <h3><strong>Informations du dossier</strong></h3>
            <form>
                  <div class="form-row form-group form-control">
                        <form>            
                              <div class="col-6 shadow">
                                    <label for="NumeroDossier">Numéro de dossier</label>
                                    <input type="text" class="form-control" id="NumeroDossier" placeholder="">   
                              </div>            
                              <div class="col-6 shadow">
                                    <label for="TypeDossier">Type de dossier</label>
                                    <input type="text" class="form-control" id="TypeDossier" placeholder=""> 
                               </div>

                              <div class="col-6 shadow">
                                    <label for="NuméroFournisseur">Numéro de fournisseur</label>
                                    <input type="text" class="form-control" id="NuméroFournisseur" placeholder="">
                              </div>

                              <div class="col-6 shadow">
                                    <label for="NumeroCommande">Numéro de commande</label>
                                    <input type="text" class="form-control" id="NumeroCommande"> 
                              </div>
                              <div class="col-6 shadow">
                                    <label for="DenominationClient">Dénomination Client</label>
                                    <input type="text" class="form-control" id="DenominationClient"> 
                              </div>

                              <div class="custom-file shadow col-6">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choisir un fichier/photo</label>
                                    <div class="invalid-feedback">Lien invalide</div>
                              </div>

                        </form>     


                        </div>
                        <div class="form-row form-group form-control">

                              <div class="col-sm-6">
                                  <label for="bio">Détails dossier</label>
                                  <textarea class="form-control shadow" id="DetailDossier" rows="3"></textarea>
                              </div>        
                              <div class="col-sm-6">
                                  <label for="bio">Liste diagnostique</label>
                                  <textarea class="form-control shadow" id="ListeDiagnostique" rows="3"></textarea>
                              </div>         
                        </div>

                        <!-- Container pour les boutons-->
                        <div class="form-row form-group form-control">
                              <button type="button" class="btn btn-lg btn-primary">Reex client et solde dossier</button>
                              <button type="button" class="btn btn-lg btn-primary">Reex client avec décompte de stock sans solde</button>
                              <button type="button" class="btn btn-lg btn-primary">Reex client avec décompte de stock avec solde</button>
                              <button type="button" class="btn btn-lg btn-primary">Remise en stock</button>
                              <button type="button" class="btn btn-lg btn-primary">Solde du dossier</button>
                              <button type="button" class="btn btn-lg btn-primary">Quitter</button>
                        </div>      

                  </div>
            </form>
      </div>
</body>
 