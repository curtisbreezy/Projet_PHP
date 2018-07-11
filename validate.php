<?php  
// récupération des informations
session_start();

// connexion à la base de données et affichage des articles

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");


$comments = $bdd->query('SELECT * FROM commentaire ASC LIMIT 0, 10');


if(isset($_GET['id']) AND !empty($_GET['id'])) {
    
	$get_id = htmlentities($_GET['id']);
	
	$comm = $bdd->prepare('SELECT * FROM commentaire WHERE validate = 0');
	$comm->execute(array($get_id));
	
	
}

if(isset($_POST['pseudo'],$_POST['commentairedate'],$_POST['commentairetexte'],$_POST['validate']))
	if (!empty($_POST['pseudo']) && !empty ($_POST['commentairedate']) && !empty ($_POST['commentairetexte']) && !empty ($_POST['validate']))
	echo "<script> alert('test 1'); </script>"; 
	{
		
		// sécurisation des informations
		
				$pseudo = htmlspecialchars ($_POST['pseudo']);
				$commentairedate = htmlspecialchars($_POST['commentairedate']);
				$commentairetexte = htmlspecialchars($_POST['commentairetexte']);
				$validate = htmlspecialchars ($_POST['validate']);
				echo "<script> alert('test 2'); </script>"; 
		// requête de mise à jour
		

        //TODO : Ajouter les autres champs, car j'ai juste mis textepost
        
        $sql = "UPDATE commentaire SET validate = 1";
		echo "<script> alert('mise à jour bdd'); </script>"; 
        $statement = $bdd->prepare($sql);     
        $statement->execute(array($_POST['validate']));
		echo "<script> alert('commentaire validé'); </script>"; 
		
       
                    
		// redirection vers la page article une fois modifié
		
	
	}


?>