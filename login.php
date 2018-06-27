<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet_5', 'root', '');


if(isset($_POST['connexion'])) // si la variable connexion existe
{			
		//protection des données
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdpconnect = sha1($_POST['mdpconnect']); // encodage du mot de passe
		
		
		
		if(!empty($pseudo) AND !empty($mdpconnect))
		{ // si ok le code continue
			$requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?"); // on récupère les informations dans la  BDD
			$requser->execute(array($pseudo,$mdpconnect));
			$userexist = $requser->rowCount(); // on verifie si l'information existe
			
			if($userexist == 1)
			{
				
			 $userinfo = $requser->fetch();
			 $_SESSION['pseudo'] = $userinfo['pseudo'];
			 $_SESSION['mdpconnect'] = $userinfo['mdpconnect'];
			 header("Location: admin\admin.php?id=".$_SESSION['pseudo']);
			 $erreur = "vous êtes connecté";
			
			}
			
			else  //sinon afficher ce message d'erreur
			
		
			{
			$erreur = "Mauvais mot de passe ou email";
			}
		
		
		}	
		else  //sinon afficher ce message d'erreur
			
		
			{
			$erreur = "Merci de tout compléter";
			}
		
		
		
		
}
		
					 




?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog PHP Connexion</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
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
  
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>