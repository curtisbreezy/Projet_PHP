<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");





?>

<?php if(isset($_POST['pseudo'],$_POST['commentairedate'],$_POST['commentairetexte'])) 
										if(!empty($_POST['pseudo']) AND !empty($_POST['commentairedate']) AND !empty($_POST['commentairetexte'])) {
												// sécurisation des informations
		
												$pseudo = htmlspecialchars($_POST['pseudo']);
												$commentairedate = htmlspecialchars($_POST['commentairedate']);
												$commentairetexte = htmlspecialchars($_POST['commentairetexte']);
											
											
												echo "<script> alert('variable reconnu'); </script>"; 
												
												$ins = $bdd->prepare('INSERT INTO commentaire(id_commentaire,pseudo,commentairedate,commentairetexte,id_article,parent_id) 
												
												VALUES ("41","MK","2018-07-03","commentaire enfant form","17","40")'); 
												
												echo "<script> alert('requête préparée'); </script>"; 
												
												$ins->execute(array($pseudo,$commentairedate,$commentairetexte));
												
												echo "<script> alert('commentaire posté'); </script>";
										
												$message = 'Votre commentaire a bien été posté';
										

																																					}
										
										else{
		
											$message = 'Veuillez remplir tous les champs'; // si un des champs n'est pas complété
											
											}
	
								?>
								
									<form method="post">
									<br/>
									<label> Pseudo </label>
									<input type="text" name="pseudo" class="col-md-8"/>
									<hr/>
									<label> Date </label>
									<input type="datetime" name="commentairedate" class="col-md-8" value= "<?php echo date("d:m:Y h-m"); ?> "> 
									
									<hr/>
									<label> Réponse </label>
									<textarea name="commentairetexte">  </textarea>
									<hr/>
									<button type="submit" class="btn btn-success"> Répondre </button>
									
									
									<p> <?php if(isset($message))
										echo ($message);
								
									?>
									</> 
									</form>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									