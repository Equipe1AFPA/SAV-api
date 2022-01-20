
<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Historique</title>

      <link rel="stylesheet" type="text/css" href='login.css'>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"/>
<!-- MDB -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>

 <?php include ('header.php');?>

 <div class="container objContainer">
      <h1>Historique de gestion de dossier</h1>
      <div class="row-inline">
        <div class="row justify-content-start col-md-12 p-2">
                  <div class="input-group">
                    <div class="col-md-4 offset-md-1  p-2">
                      <h5 class="select-title">N° dossier : MYDOSNUM </h5>
                    </div>
                    <div class="col-md-4 offset-md-1 p-2">
                      <h5 class="select-title">Client : MONSIEURLECLIENT </h5>
                    </div>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="col-md-2 p-2">Date/heure</th>
            <th class="col-md-3 p-2">Type de dossier</th>
            <th class="col-md-7 p-2">Opération éffectué</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ma2019-12</td>
            <td>Giraud</td>
            <td>Rome</td>
          </tr>
          <tr>
            <td>Av2019-1</td>
            <td>Durand</td>
            <td>Madrid</td>
          </tr>
          <tr>
            <td>Jt2019-36</td>
            <td>Joly</td>
            <td>Mexico</td>
          </tr>
          <tr>
            <td>Ju2019-36</td>
            <td>Expédition  (s)</td>
            <td>Moscou</td>
          </tr>
          <tr>
            <td>Ju2019-36</td>
            <td>Amar</td>
            <td>Amsterdam </td>
          </tr>
          <tr>
            <td>Ju2019-36</td>
            <td>Shuber</td>
            <td>Paris</td>
          </tr>
          <tr>
            <td>Ju2019-36</td>
            <td>Wald</td>
            <td>New York</td>
          </tr>
        </tbody>
      </table>

</body>
</html>