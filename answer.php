<?php 

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$comments = $bdd->query('SELECT * FROM commentaire');
$articles = $bdd->query('SELECT * FROM articles');
$_GET['id_article']= $_POST['id_article'];

?>
<?php while ($c = $comments->fetch());
{?>
	
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
											

	<?php }?>
											
<?php
if(isset($_GET['id_article']) && isset($_GET['id_commentaire']) && isset($_GET['validate'])) 
	if(isset($_POST['pseudo']) && isset($_POST['commentairedate']) && isset($_POST['commentairetexte'])) 							
		if(!empty($_POST['pseudo']) && !empty($_POST['commentairedate']) && !empty($_POST['commentairetexte'])) {
												// sécurisation des informations
			echo "<script> alert('test 1'); </script>"; 
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$commentairedate = htmlspecialchars($_POST['commentairedate']);
			$commentairetexte = htmlspecialchars($_POST['commentairetexte']);
			$id_article = intval($_GET['id_article']);
			$id_commentaire = intval($_GET['id_commentaire']);
			$validate = intval($_GET['validate']);
												
			$ins = $bdd->prepare('INSERT INTO commentaire (pseudo,commentairedate,commentairetexte,id_article,parent_id,validate) VALUES (?,?,?,?,?,?)'); 
														
			echo "<script> alert('requête préparée'); </script>"; 
														
			$ins->execute(array($pseudo,$commentairedate,$commentairetexte,'.$id_article.','.$id_commentaire.','.$validate.'));
														
			echo "<script> alert('réponse postée'); </script>";
										
												


																											}
						else{

						$message = 'Veuillez remplir tous les champs'; // si un des champs n'est pas complété
																	
							}
	

							
?>

