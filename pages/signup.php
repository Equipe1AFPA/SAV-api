<?php 
  spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
  });
  session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="DE BIASI Florian">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Lien de connexion bootstrap, php, jquery, css. -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/signup.css" />
    <title>Accueil_Auth</title>
</head>
<body>
    
</body>
</html>

<!-- Inclusion du header et petit script pour inclure les classes. -->

<?php include ('../apparence/header.php');?>

<!-- Si utilisateur est non identifié on lui demande de s'identifier -->

<div class="wrapper2 fadeInDown2">
    
<form action="" method="POST">
 
<!-- Inclusion du controleur de création d'utilisateur. -->
    <?php 
    include '../controleur/signupcontroler.php';
    if(isset($errorMessage)): ?> 
        <div class ="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
 
  <div id="formContent">

    <!-- Logo de l'entreprise -->
    <div class="fadeIn first">
      <img src="../images/Menuiz_Man.png" id="icon" alt="User Icon" />
    </div>

    <!-- Formulaire de création -->
    <form>
      <input type="text" id="nom" class="fadeIn second" name="nom" placeholder="Nom" required>
      <input type="text" id="prenom" class="fadeIn second" name="prenom" placeholder="Prenom" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="password" id="rpt_password" class="fadeIn third" name="rpt_password" placeholder="verify-password" required>
      <select id="user_type" class="fadeIn third" name="user_type">
          <option value="Admin">Administrateur</option>
          <option value="sav">Technicien SAV</option>
          <option value="hotline">Technicien Hotline</option>
    </select>
    <div class="d-flex justify-content-evenly">
      <input type="submit" class="col-md-3 mx-auto p-2" value="Créer">
      <input type="submit" class="col-md-3 mx-auto p-2" value="Supprimer">
    </div>
    </form>

  </div>
</div>



   
  