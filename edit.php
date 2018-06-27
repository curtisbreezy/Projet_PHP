<?php session_start();

$bdd = new PDO("mysql:host=localhost;dbnames=users","root", "",)

if(isset($_POST['textepost'])) 
	if(!empty($_POST['textepost']))
	{
	$textepost = htmlspecialchars($_POST['textepost']);

	
	$ins = $bdd->prepare('UPDATE article(textepost) VALUES(?)'); // insertion dans la base de donnée ,en théorie !
	$ins->execute(array($textepost));
		
	$message = 'Votre article a bien été modifié';
	}
	else
	{
		$message = 'Veuillez remplir tous les champs'; // si un des champs n'est pas complété
	}

?>