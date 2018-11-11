<?php

$bdd = new PDO("mysql:host=localhost;dbname=projet_5", "root", "");

if(isset($_POST['auteurpost'],$_POST['titrepost'],$_POST['datepost'],$_POST['textepost'])) 
	if(!empty($_POST['auteurpost']) AND !empty($_POST['datepost']) AND !empty($_POST['textepost']))
	{
	$auteurpost = htmlspecialchars($_POST['auteurpost']); 
	$titrepost = htmlspecialchars($_POST['titrepost']);
	$datepost = htmlspecialchars($_POST['datepost']);
	$textepost = htmlspecialchars_decode($_POST['textepost']);

	
	$ins = $bdd->prepare('INSERT INTO articles(auteurpost, titrepost, datepost, textepost) VALUES(?,?,?,?)'); 
	$ins->execute(array($auteurpost,$titrepost,$datepost,$textepost));	
	$message = 'Votre article a bien été posté';
	
	header("Location: /extrait.php");
	}
	else
	{
		$message = 'Veuillez remplir tous les champs'; 
	}

?>




