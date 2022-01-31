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
      <title>Acceuil</title>

      <!-- Lien de connexion bootstrap, php, jquery. -->

<link rel="stylesheet" type="text/css" href='../css/login.css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>

<?php 
  if(isset($_SESSION['loggedUser'])):
  include ('../apparence/header.php');
?>

<div class="container objContainer ">
      <a class="button btn-block btn-lg" href="ticket.php" role="button">Création de Ticket</a>
</div>

 <div class="container objContainer">
  <h1>Les dossiers en cours</h1>
  <div class="row-inline">
        <div class="col-md-3 mx-auto p-2">
              <form action="#" method="get">
                    <div class="input-group">
                    <input class="form-control" id="dossencourt_search" name="q" placeholder="Rechercher un dossier" required>
                          <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="bi bi-search"></i></button>
                          </span>
                    </div>
              </form>
        </div>
  </div>
<?php include ('../controleur/FolderControler.php');?>
</div>
<?php else: 
header('location: login.php');
endif;?>

<script>
  $(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});

$(document).ready(function(){
  $("#dossencourt_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dossencourt tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

</body>
</html>