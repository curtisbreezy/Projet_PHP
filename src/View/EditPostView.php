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
    <link href="vendor/css/creative.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
	<script src="js/sb-admin.min.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
 </head>
 
 <body id="page-top">
<?php
	require'template/menu_admin.php';
?>


    <div class="jumbotron jumbotron-fluid text-center mt-5">
		<h1 class="display-4"><font face="Century Gothic" size="20"> Édition </font></h1>
	</div>
<section class="container">
	<form action="index.php?page=postUpdate" method="POST">
					
				<label>Auteur</label>
					<br/>
					<input type="text"  name="auteurpost" Value="<?= $post[0]['auteurpost']; ?>"> </br>
				
				<label>Titre</label>
					 <br/>
					<input type="text" name="titrepost" value="<?=$post[0]['titrepost'] ?>"> </br>
				
		
				<label>Date</label>
					<br/>
					<input type="datetime" name="datepost" value="<?php echo date("Y-m-d-H:i" ); ?>"> 
					<br/>
					<hr/>
				<div> 
					<textarea id="textepost" name="textepost" type="text"> <?= htmlspecialchars_decode($post [0]['textepost']) ?> </textarea> 
					
				</div>
			
			
				<div class="form-group form-check mt-3">
				
					
					<button type="submit" class="btn btn-primary" name="modifier" id="modifier" Value="modifier"> Mettre à jour </button>

				</div>
	 
	        </form>
	  
</section>
</body>