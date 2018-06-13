<?php  
// récupération des informations
session_start();

// connexion à la base de données et affichage des articles

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");
$utilisateur = $bdd->query('SELECT * FROM user');


// requête pour modification du mot de passe



if(isset($_POST['modifiermdp'])) 
	

{	
echo "<script>alert('test1');<script>";
	if(isset($_POST['mdp'],
			 $_POST['mdp2'])
            
	&&!empty ($_POST['mdp']) &&!empty ($_POST['mdp2']))
	
	{
		echo "<script>alert('test2');<script>";
		// sécurisation des informations
		
				
				$mdp = htmlspecialchars($_POST['mdp']);
				$mdp2 = htmlspecialchars($_POST['mdp2']);
			
	
		// requête de mise à jour
		if($mdp == $mdp2)
		{
echo "<script>alert('test3');<script>";
       
        
        $sql = "UPDATE user SET mdp=?, WHERE id_utilisateur =?";
        $statement = $bdd->prepare($sql);     
        $statement->execute(array($_POST['mdp']));

echo "4-oui";
        header("Location: admin.php?id=".$user['id_utilisater']);
                    
		// redirection vers la page article une fois modifié
		}
		else
					{
					$erreur = "vos mots de passe ne correspondent pas";
					}
	
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
      <div class="card-header">Changement de mot de passe</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <label for="pseudo">Mot de passe 1</label>
            <input class="form-control" id="mdp" type="password" name="mdp"  placeholder="Mdoifier votre mot de passe">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe 2</label>
            <input class="form-control" id="mdp2" type="password" name="mdp2" placeholder="Confirmer votre mot de passe">
          </div>
          <input class="btn btn-primary btn-block" id="modifiermdp" name="modifiermdp" type="submit" value="Modifier son mot de passe"/>
        </form>
		
		<?php
		
		if(isset($erreur))
		{
			echo $erreur;
		}
		
		?>
		
		
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