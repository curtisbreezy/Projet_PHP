<?php  session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");

$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article ASC LIMIT 0, 10');



if(isset($_GET['edit']) AND !empty($_GET['edit'])){ 
	
		$edit_id = htmlspecialchars($_GET['edit']);
		$edit_article = $bdd->prepare('SELECT * FROM articles WHERE id_article=?');
		$edit_article->execute(array($edit_id));
		
		if($edit_article->rowCount() == 1) {
			
			$edit_article = $edit_article->fetch();
											
		}
		
	
}

if(isset ($_POST['modifier'])) 

{	
	if(isset($_POST['auteurpost'],
             $_POST['titrepost'],
             $_POST['datepost'],
             $_POST['textepost'])
	&& !empty($_POST['auteurpost']) && !empty ($_POST['titrepost']) && !empty ($_POST['datepost']) && !empty ($_POST['textepost']))
	
	{
		
	
		
				$auteurpost = htmlspecialchars($_POST['auteurpost']);
				$titrepost = htmlspecialchars($_POST['titrepost']);
				$datepost = htmlspecialchars($_POST['datepost']);
				$textepost = htmlspecialchars_decode($_POST['textepost']);
	

		

        
        $sql = "UPDATE articles SET textepost=? WHERE id_article =?";
        $statement = $bdd->prepare($sql);     
        $statement->execute(array($_POST['textepost'], $_GET['edit']));


        header("Location: /extrait.php?id=".$edit_id);
                    
	
		
	
	}

	
}

?>


