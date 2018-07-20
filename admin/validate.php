<?php  session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");
$comments = $bdd->query('SELECT * FROM commentaire ASC LIMIT 0, 10');


if(isset($_POST['pseudo'],$_POST['commentairedate'],$_POST['commentairetexte'],$_POST['validate']))
	if (!empty($_POST['pseudo']) && !empty ($_POST['commentairedate']) && !empty ($_POST['commentairetexte']) && !empty ($_POST['validate']))
	echo "<script> alert('1'); </script>";
	{
		
		
				$pseudo = htmlspecialchars ($_POST['pseudo']);
				$commentairedate = htmlspecialchars($_POST['commentairedate']);
				$commentairetexte = htmlspecialchars($_POST['commentairetexte']);
				$validate = htmlspecialchars ($_POST['validate']);
				 
		echo "<script> alert('2'); </script>";
        
        $sql = "UPDATE commentaire SET validate = 1";
		 echo "<script> alert('3'); </script>";
        $statement = $bdd->prepare($sql);     
        $statement->execute(array($_POST['pseudo'],now(),$_POST['commentairetexte'],$_POST['validate']));
		echo "<script> alert('commentaire validé'); </script>"; 
		
		
                    
		
		
	
	}


?>