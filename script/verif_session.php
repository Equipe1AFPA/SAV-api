<?php session_start(); ?>


<?php 
$username = 'Menuiz';
$userpsw = 'menuiz';

// Validation du formulaire

if (isset($_POST['login']) && isset($_POST['password'])){
    if ($_POST['login'] === $username  && $_POST['password'] === $userpsw ){
            $_SESSION['loggedUser'] = $username;
     } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identiifer : (%s/%s)',
            $_POST['login'],
            $_POST['password']
            
        );
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/login.css" />
    <title>Accueil_Auth</title>
</head>
<body>
    
</body>
</html>

<!-- Lien de connexion bootstrap, php, jquery. -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Si utilisateur non identifié on lui demande de s'identifier -->

<?php if(!isset($_SESSION['loggedUser'])): ?>
<div class="wrapper fadeInDown">
    
<form action="" method="POST">
 
<!-- Si message d'erreur on l'affiche
 -->
    <?php if(isset($errorMessage)): ?> 
        <div class ="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
 
  <div id="formContent">

    <!-- Logo de l'entreprise -->
    <div class="fadeIn first">
      <img src="../images/Menuiz_Man.png" id="icon" alt="User Icon" />
    </div>

    <!-- Formulaire d'identification -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Mot de passe oublié -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>


<!-- Si utilisateur identifié on l'envoit sur la page voulu -->

<?php else: 
    header('location: ../pages/index.php');
endif;?>
    
    <style><?php include_once('../css/login.css');?></style>
  