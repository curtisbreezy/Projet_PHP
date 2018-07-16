<?php 

	$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$db = "projet_5";

		
		$conn = new mysqli($servername, $username, $password, $db);
		
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$conn->set_charset("utf8");
$comments = $conn->query('SELECT * FROM commentaire');
$articles = $conn->query('SELECT * FROM articles');


?>

	
											<form method="post">
												<br/>
													<input type="text" name="pseudo" class="col-md-8"/>
												<hr/>
													<input type="datetime" name="commentairedate" class="col-md-8" value= "<?php echo date("d:m:Y h-m"); ?> "> 
									
												<hr/>
													<textarea type="text" name="commentairetexte">  </textarea>
												
												<br/>	
													<input type="hidden"  name="id_article" value="<?php echo $_GET["id_article"];?>"> </input>
												
													<input type="hidden"  name="id_commentaire" class="col-md-8" value="<?php echo $_GET["id_commentaire"];?>"> </> 
												
													<input type="hidden"  name="validate" class="col-md-8" value="<?php echo $_GET["validate"];?>">
												<hr/>
													<button type="submit" class="btn btn-success"> Répondre </button> 
													
											</form>
											

	
											
<?php
if(isset($_GET['id_article']) && isset($_GET['id_commentaire']) && isset($_GET['validate'])) {
	if(isset($_POST['pseudo']) && isset($_POST['commentairedate']) && isset($_POST['commentairetexte'])) {							
		if(!empty($_POST['pseudo']) && !empty($_POST['commentairedate']) && !empty($_POST['commentairetexte'])) {
												
			
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$commentairedate = htmlspecialchars($_POST['commentairedate']);
			$commentairetexte = htmlspecialchars($_POST['commentairetexte']);
			$id_article = intval($_GET['id_article']);
			$parent_id = intval($_GET['id_commentaire']);
			$validate = intval($_GET['validate']);
			
			
			$sql = "INSERT INTO commentaire (pseudo, commentairedate, commentairetexte, id_article, parent_id, validate)
		VALUES ('" . $_POST['pseudo'] . "',now(),'" . $_POST['commentairetexte'] . "','" . $_POST['id_article'] . "','" . $_POST['id_commentaire'] . "','" . $_POST['validate'] . "')";
		echo "<script> alert('Commentaire posté'); </script>";
		
		if ($conn->query($sql) === TRUE) {
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
						
}

}	
							
?>

