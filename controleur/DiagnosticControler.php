<!-- GERMAIN Florian: création d'un controleur pour se servir de la classe diagnostif et l'afficher sur la page -->

<?php

    // Controleur pour prendre ce que l'on va afficher ensuite sur la page
    $diagnostic = DiagnosticRepository::getByID($_GET['folid']);
    
    $folderNum = $diagnostic->getFolderNumber();
    $clientName = $diagnostic->getDenomination();
    $folderCreation = $diagnostic->getCreationDate();
    $folderType = $diagnostic->getType();
    $orderNum = $diagnostic->getOrdernumber();
    $supplierName = $diagnostic->getSupplier();
    $folderDetail = $diagnostic->getDetailDossier();
    $folderCommentary = $diagnostic->getCommentaire();

    echo<<<SHOW_INFOS

      <div class="form-row form-group form-control">          
            <!-- Container pour les infos du dossier -->      
            <div class="container objContainer">
            <h3><strong>Informations du dossier</strong></h3>
                  <form>
                        <div class="form-row form-group form-control">
                              <form>            
                                    <div class="col-6 shadow">
                                          <label for="NumeroDossier">Numéro de dossier</label>
                                          <input type="text" class="form-control" id="NumeroDossier" value="$folderNum">
                                    </div>            
                                    <div class="col-6 shadow">
                                          <label for="TypeDossier">Type de dossier</label>
                                          <input type="text" class="form-control" id="TypeDossier" value="$folderType"> 
                                    </div>
  
                                    <div class="col-6 shadow">
                                          <label for="NomFournisseur">Nom du fournisseur</label>
                                          <input type="text" class="form-control" id="NomFournisseur" value="$supplierName">
                                    </div>
  
                                    <div class="col-6 shadow">
                                          <label for="NumeroCommande">Numéro de commande</label>
                                          <input type="text" class="form-control" id="NumeroCommande" value="$orderNum"> 
                                    </div>
                                    <div class="col-6 shadow">
                                          <label for="DenominationClient">Dénomination Client</label>
                                          <input type="text" class="form-control" id="DenominationClient" value="$clientName"> 
                                    </div> 
                                    <div class="col-6 shadow">
                                          <label for="DateCreation">Date de création du dossier</label>
                                          <input type="text" class="form-control" id="DateCreation" value="$folderCreation"> 
                                    </div> 
                                    <div class="col-6 file-field align-self-end">
                                          <div class="button btn-sm">
                                          <input type="file">
                                    </div>
                              </form> 
                        </div>
  
                                       
                        </div>
                        <div class="form-row form-group form-control">
  
                              <div class="col-sm-6">
                                    <label for="bio">Détails dossier</label>
                                    <textarea class="form-control shadow" id="DetailDossier" rows="3">$folderCommentary</textarea>
                              </div>        
                              <div class="col-sm-6">
                                    <label for="bio">Liste diagnostique</label>
                                    <textarea class="form-control shadow" id="ListeDiagnostique" rows="3"></textarea>
                              </div>         
                        </div>
  
                        <!-- Container pour les boutons-->
                        <div class="form-row form-group form-control d-grid gap-3">
                              <a class="button mx-3 mb-3 btn-lg" href="#" role="button">Remise en stock</a>
                              <a class="button mx-3 mb-3 btn-lg" href="#" role="button">Solde du dossier</a>
                              <a class="button mx-3 mb-3 btn-lg" href="index.php" role="button">Quitter</a>
  
                        </div>      
                  </form>
            </div>     
      </div>
      SHOW_INFOS

?>
