<?php	
		$bdd = new PDO("mysql:host=localhost;dbname=projet_5", "root", "");
	
		$comments = $bdd->query('SELECT * FROM commentaire');
		$articles = $bdd->query('SELECT * FROM articles');
	

if(isset($_POST['id_commentaire'])  && isset($_POST['id_article']) && isset($_POST['validate'])) {						
		if(!empty($_POST['pseudo'])  && !empty($_POST['commentairetexte'])) {
												
			
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$commentairedate=  htmlspecialchars($_POST['pseudo']); 
			$commentairetexte = htmlspecialchars_decode($_POST['commentairetexte']);
			$id_commentaire = intval($_POST['id_commentaire']);
			$id_article = intval($_POST['id_article']);
			$validate = intval($_POST['validate']);
			
			$req = $bdd->prepare("INSERT INTO commentaire (pseudo,commentairedate,commentairetexte,id_article,parent_id,validate) 
			Values(?,now(),?,?,?,?)");
			
			$req->execute(array($pseudo,$commentairetexte,$id_article,$id_commentaire,$validate));
			header("Location: extrait.php");
		}
	
}	

?>


