<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mourad-Kheloui Développeur PHP</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="css/creative.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
 </head>
<body>
<?php
	require'Menu.php';
?>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Restons connecté</h2>
            <hr class="my-4">
            <p class="mb-5">Prêt à commencer une nouvelle aventure et à trouver le candidat qu'il vous faut ? Prenez votre téléphone ou votre ordinateur et écrivez-moi pour que nous nous rencontrions le plus vite possible !</p>
          </div>
        </div>
        
      </div>
	  

    </section>	
	
	<?php if(isset($erreur)){ echo"$erreur"; } ?>	  
	 
		
<div class="col-lg-8 col-md-8 col-xs-10 mx-auto text-center">
	<form method="post" action="">
		<div class="form-group">		
			<h2 class="mt-4"> Formulaire de contact </h2> <hr/>
				<label for="nom">Vos coordonnées</label> <br/>
					<input type="text" class="col-md-5 col-xs-6" name="nom" id="nom" placeholder="" required/>  <br/>
						<br/><label for="email">Votre email</label> <br/>
							<input type="email" class="col-md-6" name="email" id="email" placeholder="" required/><br/>
							<small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais vos données avec un tiers.</small>
						<textarea class="col-xs-8 form-control" name="message" id="message" type="text" placeholder="Votre message"></textarea>	<hr/>
					  <input type="submit" class="btn btn-success" value="Envoyer"></input>
					</div>
				</form>
			</div>
    </section>	
<footer class="sticky-footer text-center col-md-12 bg-dark">
    <div class="container">
		<a class="btn btn-dark btn-xl sr-button col-md-6 mb-3 text-center" href="admin/admin.php">Espace abonné</a>
				<div>
					<small>Copyright © Blog PHP-Mourad Kheloui-2018</small>
				</div>
			<div>
		<a class="btn btn-dark btn-xl sr-button col-md-6 mt-3 text-center" href="mod/validatecomment.php">Espace modérateur</a>
	</div>
</div>
      </footer>
  </body>
</html>

