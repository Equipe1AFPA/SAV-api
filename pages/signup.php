<?php session_start(); ?>

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
    <link rel="stylesheet" href="../css/login.css" />
    <title>Accueil_Auth</title>
</head>
<body>
    
</body>
</html>

<!-- Validation du formulaire -->

<?php 
  include ('../apparence/header.php');
spl_autoload_register(function ($class_name) {
  include '../classes/'.$class_name . '.php';
});
?>

<!-- Si utilisateur est non identifié on lui demande de s'identifier -->

<div class="wrapper2 fadeInDown2">
    
<form action="" method="POST">
 
<!-- Si message d'erreur on l'affiche
 -->
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
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="text" id="rpt_password" class="fadeIn third" name="rpt_password" placeholder="password" required>
      <select id="user_type" class="fadeIn third" name="user_type">
          <option value="Admin">Administrateur</option>
          <option value="sav">Technicien SAV</option>
          <option value="hotline">Technicien Hotline</option>
    </select>
      <input type="submit" class="fadeIn fourth" value="Sign up">
    </form>

  </div>
</div>



    
    <style><?php include_once('../css/login.css');?></style>
  