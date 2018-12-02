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
		
		<div class="text-center">
          <a class="d-block small mt-3" href="login.php">Se connecter</a>
		  <a class="d-block small" href="http://mourad-kheloui.ovh/Accueil/">Retour au blog</a>
        </div>
		
		<!-- controle des erreurs -->
		
		<?php
		
		if(isset($erreur))
		{
			echo $erreur;
		}
		
		?>
		


