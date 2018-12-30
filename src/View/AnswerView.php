

<div class="jumbotron text-center">	
		
											<form method="post">
												<br/>
													<label> Pseudo </label>
												<br/>
													<input type="text" name="pseudo" class="col-md-8"/>
												<hr/>
													<label> Votre réponse </label>
												<br/>
												    <textarea class="col-lg-10" type="text" name="commentairetexte">  </textarea>
												
												<br/>	
													<input type="hidden"  name="id_article" value="<?php 
													
													if(isset($_GET['id_article']) && !empty($_GET['id_article'])
														&& wp_verify_nonce( sanitize_key( $_GET['id_article'])))
													echo $_GET htmlspecialchars["id_article"];?>"> </input>
												
													<input type="hidden"  name="id_commentaire" class="col-md-8" value="<?php 
													if(isset($_GET['id_commentaire'])
													&& wp_verify_nonce( sanitize_key( $_GET['id_commentaire'])))
													echo $_GET htmlspecialchars["id_commentaire"];?>"> </> 
												
													<input type="hidden"  name="validate" class="col-md-8" value="0">
												<hr/>
													<button type="submit" class="btn btn-success"> Répondre </button> 
													
											</form>
												<br/>
											
												<p> Tout commentaire posté sera soumis pour validation sous 24h </p>
	</div>

