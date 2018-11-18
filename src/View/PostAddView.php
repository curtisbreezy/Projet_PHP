<?php  session_start();
$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "root");

	
if(isset($_POST['submit_commentaire'])){
	if(isset($_POST['pseudo'], $_POST['commentairedate'], $_POST['commentairetexte'])
		AND !empty($_POST['pseudo']) AND !empty($_POST['commentairedate'])  AND !empty($_POST['commentairetexte']))
		{
		$pseudo =htmlspecialchars($_POST['pseudo']);
		$commentairedate = htmlspecialchars ($_POST['commentairedate']);
		$commentairetexte =htmlspecialchars_decode($_POST['commentairetexte']);
	
		$ins = $bdd->prepare('INSERT INTO commentaire (pseudo,commentairedate,commentairetexte) VALUE (?,?,?)');
		$ins->execute(array($pseudo,$commentairedate,$commentairetexte));	
		header("Location: article.php?id=".$_SESSION['id_utilisateur']);
		}
	
}	


?>


   
<header class="masthead  text-white d-flex bg-white ">
	<div class="container my-auto ">
	    <form class="col-md-6 mt-3" method="POST">
									
								<h6> Poster votre commentaire </h6>
								
								<input class="col-sm-6" type="text" name="pseudo"/> </br>
								
								<input class="col-sm-6" type="datetime" name="commentairedate" value="<?php echo date("d-m-Y H:i:s");?>"> </br>
								
								<textarea class="col-md-12" type ="text"  name="commentairetexte">  </textarea> </br>
								
								<input type="submit" name="submit_commentaire"/> </br>
							
		</form>
     </div>
</header>

<?php
require('../src/View/template/DefaultView.php');
