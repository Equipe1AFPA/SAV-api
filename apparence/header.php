<?php $username=$_SESSION['loggedUser']->getIdentifiant();?>

<!-- Barre de navigation -->
<Header>
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #39ace7;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                  <a class="navbar-brand" href="index.php">
                        <img src="../img\Menuiz_Man.png" width="50%" height="50%" alt="">
                  </a>
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                              <a class="nav-link" href="../pages/index.php">Accueil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link" href="../pages/stock_move.php">Mouvement de stock</a>
                        </li>

                        <!-- On regarde le type de l'utilisateur connecté via l'objet User présent dans notre variable de session pour afficher ou non le bouton de création d'un utilisateur. -->
                        <?php if ($_SESSION['loggedUser']->getType() === '1'){
                              echo <<<SIGNUP
                                    <li class="nav-item">
                                    <a class="nav-link" href="../pages/signup.php">Création d'utilisateur</a>
                                    </li>
                                    SIGNUP;
                              }
                        ?>
                  </ul>
                  <span class="navbar-text my-2 my-lg-0"><strong>
                  <?php echo <<<USERNAME
                              $username
                              USERNAME; 
                  ?>
                  </strong>
                  <a class="nav-link" href="../controleur/logoutControler.php">Deconnexion<span class="sr-only">(current)</span></a>
            </span>
            </div>
      </nav>
</Header>