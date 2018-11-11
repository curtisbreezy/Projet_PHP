<?php

setcookie('pseudo','',time(), null, null, false, true); 


$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC LIMIT 0, 1');
$comm = $bdd->query('SELECT * FROM commentaire ORDER BY id_commentaire LIMIT 0, 10');
$reponse_comm = $bdd->query('SELECT * FROM reponse_commentaire ORDER BY id_reponse LIMIT 0, 5');
$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));

if(isset($_GET['pseudo']))
		if(!empty($_GET['pseudo'])){
			
		}
		else
		{	
	
	header("Location: login.php");
		}
?>