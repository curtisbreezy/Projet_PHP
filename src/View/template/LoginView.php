<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog PHP Connexion</title>
  <link href="vendor/css/sb-admin.css" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
 
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Se connecter</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input class="form-control" id="pseudo" type="texte" name="pseudo"  placeholder="Votre pseudo">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input class="form-control" id="mdpconnect" type="password" name="mdpconnect" placeholder="Votre mot de passe">
          </div>
          <input class="btn btn-primary btn-block" id="connexion" name="connexion" type="submit" value="Se connecter"/>
        </form>
		
		<?php
		
		if(isset($erreur))
		{
			echo $erreur;
		}
		
		?>
		
		<div class="text-center">
		  <a class="d-block small mt-3" href="registrer.php">S'inscrire</a>
        </div>
		
		
        <div class="text-center">
		  <a class="d-block small mt-3" href="index.php">Retour au blog</a>
        </div>
		
      </div>
    </div>
  </div>
  
  
 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>

