<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="DE BIASI Florian">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Lien de connexion bootstrap, php, jquery, css. -->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/login.css" />
    <title>Stock</title>
</head>
<body>
  <!-- Lien avec le css bootstrap. -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- Header commun à toutes nos pages -->

<?php include ('../apparence/header.php');?>

<div class="container objContainer">
  <h1>Visualisation des mouvements de stock</h1>
  <div class="row-inline">
    <div class="row justify-content-start col-md-10 p-2">
    <div class="input-group">
      <div class="col-md-2 offset-md-1 p-2">
        <h5 class="select-title">Référence : </h5>
        <select class="form-select form-select-sm col-10" aria-label=".form-select-lg example">
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
      </div>
      <div class="col-md-4 offset-md-1 p-2">
        <h5 class="select-title">Produit : </h5>
        <select class="form-select form-select-sm col-10" aria-label=".form-select-lg example">
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Threeeeeeeeeeeeeeeeeeeeeeeeeeeqdqsdqdqdqsfqfqfqdqdqdqdqdqdqee</option>
        </select>
      </
      <div class="col-md-2  offset-md-2 p-2">
        <h5 class="select-title">Lieu : </h5>
        <select class="form-select form-select-sm col-12" aria-label=".form-select-lg example">
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        </div>
    </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Référence produit</th>
        <th>Nom du  produit</th>
        <th>Lieu de stockage</th>
        <th>Quantité</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ma2019-12</td>
        <td>Giraud</td>
        <td>Rome</td>
        <td>3</td>
      </tr>
      <tr>
        <td>Av2019-1</td>
        <td>Durand</td>
        <td>Madrid</td>
        <td>22</td>
      </tr>
      <tr>
        <td>Jt2019-36</td>
        <td>Joly</td>
        <td>Mexico</td>
        <td>Out of stock</td>
      </tr>
      <tr>
        <td>Ju2019-36</td>
        <td>Expédition partielle du/des produit (s)</td>
        <td>Moscou</td>
        <td>27</td>
      </tr>
      <tr>
        <td>Ju2019-36</td>
        <td>Amar</td>
        <td>Amsterdam </td>
        <td>Out of stock </td>
      </tr>
      <tr>
        <td>Ju2019-36</td>
        <td>Shuber</td>
        <td>Paris</td>
        <td>100</td>
      </tr>
      <tr>
        <td>Ju2019-36</td>
        <td>Wald</td>
        <td>New York</td>
        <td>72</td>
      </tr>
    </tbody>
</table>
</body>
</html>