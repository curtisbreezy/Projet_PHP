if(isset($_GET['id']) AND !empty($_GET['id'])){  //récupération de l'id de l'article pour le lier au commentaire
	
		$getid = htmlspecialchars($_GET['id']);
		
		$article = $bdd->prepare('SELECT * FROM article WHERE id=?');
		$article->execute(array($getid));
	
}





if(isset($_GET['id']) AND !empty($_GET['id'])){  // on récupère l'id du commentaire pour le lier au sous commentaire
	
		$getid_commentaire = htmlspecialchars($_GET['id']);
		
		$comm = $bdd->prepare('SELECT * FROM commentaire WHERE id=?');
		$comm->execute(array($getid_commentaire));
		
		
}