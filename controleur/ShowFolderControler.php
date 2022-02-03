<?php

/**
*
* @author Florian DE BIASI
*/

$myID = $_GET['folid'];

$folder = FolderRepository::getByID($myID);
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
                                                            <td>Nom : $folderName</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Adresse : $adrLine1</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Complément d'adresse : $adrLine2</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Complément d'adresse : $adrLine3</td>
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
                                          <a class="button btn-block btn-lg" href="diagnostic.php?folid=$myID" role="button">Diagnostique</a>
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
