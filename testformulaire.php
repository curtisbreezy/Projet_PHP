<?php session_start();
 setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); 

if(!empty($_POST))
{
	echo 'posté';
}

?>



<div class="row">
			<div class="col-lg-8 col-md-8 mx-auto text-center">
				<form method="post" action="testformulaire.php">
					<div class="form-group">
					
					<h2 class="mt-4"> Formulaire de contact </h2>
					<hr/>
					<label for="nom">Vos coordonnées</label>
					
					<br/><input type="text" class="col-md-5" name="nom" id="nom" placeholder="" required/>  <br/>
					
					<br/><label>Votre email</label>
					
					<br/><input type="email" class="col-md-6" name="email" id="email" placeholder="" required/>
					
					<small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais vos données avec un tiers.</small>
					
					</div>
			<div class="form-group">
					
					
					<textarea class="col-md-12 form-control" name="message" type="text" placeholder="Votre message"></textarea>
			</div>
			
			
			<input type="submit" class="btn btn-success" value="Envoyer"></input>
				
				</form>
		
			</div>
		</div>