<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC');
$comm = $bdd->query('SELECT * FROM commentaire');
$reponse_comm = $bdd->query('SELECT * FROM reponse_commentaire ORDER BY datereponse DESC LIMIT 0, 5');

if(isset($_POST['repondre_commentaire'])){
	if(isset($_POST['auteurreponse'],$_POST['datereponse'],$_POST['textereponse']))
		if(!empty($_POST['auteurreponse']) AND !empty ($_POST['datereponse']) AND !empty ($_POST['textereponse']))
		{
		$auteurreponse = htmlspecialchars($_POST['auteurreponse']);
		$datereponse = htmlspecialchars($_POST['datereponse']);
		$textereponse = htmlspecialchars($_POST['textereponse']);
		
		$ins = $bdd->prepare('INSERT INTO reponse_commentaire (auteurreponse,datereponse,textereponse) VALUE (?,?,?)');
		$ins->execute(array($auteurreponse,$datereponse,$textereponse));
		
		$reponse_commentaire = "Réponse posté";
		header("Location: article.php?id=".$_SESSION['id_utilisateur']);
		}

		else
		{
			$reponse_commentaire = "Certaines informations sont manquantes";
		}

}

?>