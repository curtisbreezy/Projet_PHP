<?php session_start(); ?>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet_5', 'root', '');


if(isset($_POST['connexion'])) 
{			
		
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdpconnect = sha1($_POST['mdpconnect']);
		
		
		
		if(!empty($pseudo) AND !empty($mdpconnect))
		{ 
			$requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?"); 
			$requser->execute(array($pseudo,$mdpconnect));
			$userexist = $requser->rowCount(); 
			
			if($userexist == 1)
			{
				
			 $userinfo = $requser->fetch();
			 $_SESSION['pseudo'] = $userinfo['pseudo'];
			 $_SESSION['mdpconnect'] = $userinfo['mdpconnect'];
			 header("Location: ../../index.php?id=".$_SESSION['pseudo']);
			 $erreur = "vous êtes connecté";
			
			}
			
			else  
			
		
			{
			$erreur = "Mauvais mot de passe ou email";
			}
		
		
		}	
		else 
			
		
			{
			$erreur = "Merci de tout compléter";
			}
		
		
		
		
}
		
			 




?>



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
		  <a class="d-block small mt-3" href="../../index.php">Retour au blog</a>
        </div>
		
      </div>
    </div>
  </div>
  
 
<?php


$content = ob_get_clean();

require('/template/LoginView.php');
?>
