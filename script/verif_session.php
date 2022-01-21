<?php session_start(); ?>

<?php include('header.php');?>

<?php 
$username = 'uname@uname';
$userpsw = 'pass';

// Validation du formulaire

if (isset($_POST['uname']) && isset($_POST['psw'])){
    if ($_POST['uname'] === $username  && $_POST['psw'] === $userpsw ){
            $_SESSION['loggedUser'] = $username;
     } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identiifer : (%s/%s)',
            $_POST['uname'],
            $_POST['psw']
            
        );
    }
}

?>

<!-- Si utilisateur non identifié on lui demande de s'identifier -->

<?php if(!isset($_SESSION['loggedUser'])): ?>
    
<form action="" method="POST">
 
<!-- Si message d'erreur on l'affiche
 -->
    <?php if(isset($errorMessage)): ?> 
        <div class ="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
  <div class="imgcontainer">
    <img src="air2java.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>E-mail</b></label>
    <input type="email" placeholder="Enter your mail" id="uname" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="psw" required>

    <button type="submit" class="loginbtn">Login</button>
    <label>
      <input type="checkbox" checked="unchecked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>


<!-- Si utilisateur identifié on l'envoit sur la page voulu -->

<?php else: 
    header('location: ma_page.php');
endif;?>
    
<?php include('footer.php'); ?>

    <style><?php include_once('login.css');?></style>
  