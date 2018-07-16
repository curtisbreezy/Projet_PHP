<?php

$bdd = new PDO("mysql:host=localhost;dbname=projet_5", "root", "");


if(isset($_POST['inscription']))
{	
		$email = htmlspecialchars($_POST['email']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['mdp2']);
		
		
	
	if(!empty($_POST['email']) AND  !empty($_POST['pseudo'])  AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
	{
		$pseudolength = strlen($pseudo);
		
		if($pseudolength <= 255)
		
		{
					if(filter_var($email, FILTER_VALIDATE_EMAIL))	
					{
						if($mdp == $mdp2)
					{
					 $insertmbr = $bdd->prepare('INSERT INTO user (email,pseudo,mdp) VALUES(?,?,?)');
					 $insertmbr->execute(array($email,$pseudo,$mdp));
					 $erreur = "Votre compte à bien été crée";
					 
					}
					else
					{
					$erreur = "vos mots de passe ne correspondent pas";
					}
					}

					else
					{
					$erreur ="Votre adresse email n'est pas conforme !";
					}			
			
		
		}
			
	}
		else
		{
		$erreur ="Tous les champs doivents être complétés!";
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
  <title>Blog PHP-Créer un compte</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">S'enregistrer</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
		  <div class="form-row">
              <div class="col-md-6">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="Votre email" />
          </div>
		  <div class="col-md-6">
                <label for="pseudo">Pseudo</label>
                <input class="form-control" id="pseudo" type="text" name="pseudo"  placeholder="Votre pseudo"/>
              </div>
		  </div>
		  </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="mdp">Mot de passe</label>
                <input class="form-control" id="mdp" name="mdp" type="password" placeholder="8 caractères minimum">
              </div>
              <div class="col-md-6">
                <label for="mdp2">Confirmer le mot de passe</label>
                <input class="form-control" id="mdp2" name="mdp2" type="password" placeholder="8 caractères minimum">
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-success" name ="inscription" value="Inscription"></input>
        </form>

		
		<?php
		
		if(isset($erreur))
		{
			echo $erreur;
		}
		
		?>
		
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Se connecter</a>
		  <a class="d-block small" href="http://mourad-kheloui.ovh/Accueil/">Retour au blog</a>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
