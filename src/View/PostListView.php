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
 </head>
 
 <body id="page-top">
<?php
	require'template/Menu.php';
?>


    <div class="jumbotron jumbotron-fluid text-center mt-5">
		<h1 class="display-4"><font face="Century Gothic" size="20"> Extrait </font></h1>
	</div>			


<section style="background-image : url('extrait.jpg'); background-repeat:no-repeat; background-position:center center;"> 
 <div class="text-center container" >
  <div class="mb-3">
   <div id="currentarticle" name="currentarticle" class="p-3 mt-3" style="margin-bottom:50px;">		
		<?php foreach ($posts as $a) { ?>   
		<div class="card mb-3" >
		<div class="card-header" style="font-weight:bold;"><h3><?=$a['titrepost'] ?></h3>
		<div class="card-body">
		<p class="card-text">
			<?php echo substr($a['textepost'],0,700);?>[...]</p>
			<p>Rédigé par <?=$a['auteurpost'] ?>,le <?=htmlspecialchars_decode($a['datepost']) ?>. </p> <br/>
		    <button class="btn btn-success mt-3"><a href="index.php?page=article&id=<?=$a['id_article']?>"> En savoir + </a> </button> 
			    <hr/>
			  </div>
			</div>
	   	 </div>
		<?php } ?> 					   		
      </div>					
    </div>
 </div>
</section>

	
	
</body>
    
<footer class="sticky-footer text-center col-md-12 bg-dark">
    <div class="container">
		<a class="btn btn-dark btn-xl sr-button col-md-6 mb-3 text-center" href="index.php?page=admin">Espace abonné</a>
				<div>
					<small>Copyright © Blog PHP-Mourad Kheloui-2018</small>
				</div>
			
</div>
 </footer>
  
  
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
</html>


