<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article ASC LIMIT 0, 10');
$comm = $bdd->query('SELECT * FROM commentaire ORDER BY commentairedate LIMIT 0, 10');
$reponse_comm = $bdd->query('SELECT * FROM reponse_commentaire ORDER BY datereponse LIMIT 0, 5');








if(isset($_POST['repondre_commentaire'])){
	if(isset($_POST['auteurreponse'],$_POST['datereponse'],$_POST['textereponse'])
		AND !empty($_POST['auteurreponse']) AND !empty ($_POST['datereponse']) AND !empty ($_POST['textereponse']))
		{
		$auteurreponse = htmlspecialchars($_POST['auteurreponse']);
		$datereponse = htmlspecialchars($_POST['datereponse']);
		$textereponse = htmlspecialchars_decode($_POST['textereponse']);
		
		$ins = $bdd->prepare('INSERT INTO reponse_commentaire (auteurreponse,datereponse,textereponse) VALUE (?,?,?)');
		$ins->execute(array($auteurreponse,$datereponse,$textereponse));
		
		
		header("Location: article.php?id=".$_SESSION['id_utilisateur']);
		}
		else
		{
		$error = "Votre commentaire ne fonctionne pas";
		}

// fin du script pour l'ajout de sous-commentaire
}
?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mourad-Kheloui Développeur PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative_posts.css" rel="stylesheet">
	

  </head>

  <body id="page-top">

    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg  fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.html">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="log.html">Connexion/Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html#about">A propos</a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html#services">Mes compétences</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html#portfolio">Mon Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html/#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
   <header class="masthead text-center text-white d-flex bg-white ">
      
	  <div class="container my-auto ">
	  
	  
	 
          
		  
		   
		 
		  
		<section>
		
			
		<h1>Tesla dans la tourmente</h1>
			<div class="thumbnail">
				<img src="img/tesla.jpg" width="100%" alt="Nature">
					<div class="caption mt-3">
       
       <p>Le géant américain est confronté à de plus en plus de problème avec son nouveau modèle.</p>
       <p><a href="https://www.capital.fr/entreprises-marches/tesla-suspend-de-nouveau-la-production-de-sa-voiture-model-3-1283405" target="blank" class="btn btn-xs btn-primary" role="button" title="En savoir +">En savoir +</a> </p>
					</div>
			</div>
	
         </section>
        </div>
      </div>
    </header>
			
			

<section> 
	<div class="container">
		 <div class="card col-sm-12 mb-3">
				<div class="caption m-3">
					<div class="col-sm-6"> 
					
					<h4>Articles</h4>
							
							
							<?php while($a = $articles->fetch()){?> <!-- récupération des articles en base de donnée -->
							<button class="col-md-8"><a href="modifierpost.php?id=<?= $a['id_article'] ?>"/> Editer l'article </button> </a> </br>
							<h5 class="m-3"> titre : <?=$a['titrepost'] ?> </h5> </br>
							<p class="col-md-6"><?=$a['textepost'] ?></p>
							<p> Rédigé par  <?=$a['auteurpost'] ?>, le <?=$a['datepost'] ?>. </p>
							
							
							<p> <a href="comm.php?id=<?=$a['id_article']?>"> Poster un commentaire</a> </p> <!-- poster un comm avec transmission
							de l'id de l'article -->
							
					</div>
							

							
					<div class="col-md-12"> Commentaires <!-- visualisation des commentaires -->
						
						<div class="row">
							
							<div class="col-md-6">	
						
							<?php while($c = $comm->fetch()) {?>
									<!--- première boucle pour les commentaire -->
							<?=$c['pseudo'] ?> </br>
							<?=$c['commentairedate']?> </br>
							<?=$c['commentairetexte'] ?></br>
							<a href="supprimercomm.php?id=<?= $c['id_commentaire'] ?>">Supprimer le commentaire</a>
							
									<ul><?php while($r = $reponse_comm->fetch()) {?>  <!-- seconde boucle dans la première pour que les sous commentaire s'affiche sous le commentaire --> 
									<?=$r['auteurreponse'] ?></br> 
									<?=$r['datereponse']?> </br>
									<?=$r['textereponse'] ?> </br>  
									<?php }?>
									<?php }?>
									<?php }?>	</ul>
									<?php while($c = $comm->fetch()) {?>
									<!--- première boucle pour les commentaire -->
							<?=$c['pseudo'] ?> </br>
							<?=$c['commentairedate']?> </br>
							<?=$c['commentairetexte'] ?></br>
							<a href="supprimercomm.php?id=<?= $c['id_commentaire'] ?>">Supprimer le commentaire</a>
							<?php }?>
									
								
									
									</br>
							
							</div>
						
			
							<div class="col-md-6"> Répondre au commentaire
							
							<form method="post">  <!-- création de réponse aux commentaires -->
							<input type="text"  name="auteurreponse" placeholder="Votre pseudo"> </li></br>
							<input type="datetime" name="datereponse" value="<?php echo date("d-m-Y H:i:s"); ?>"></li></br>
							<textarea class="col-md-8" type="text" name="textereponse"> </textarea></li> </br>
							<input type="submit" name="repondre_commentaire"/> </br> <!-- réponse aux commentaires -->
							</form>
						
							
							 </div>	
							</div>
						</div>	
							
					</div>
							

							
															
							
							
							
						
						</div>
					</div>
					<div>
							</div>				
				</div>	
		</br>	
					</div>
			 </div>
	</div>
</section>






	 <!---------------------------------------------------------------------------------- mes réseaux socaux  --------------------------------------------------------------------------------------------------------------------------->
 

	<section class="bg-dark text-white">
      <div class="container-fluid text-center">
        <h2 class="mb-4">Mon CV là ! </h2>
        <a class="btn btn-light btn-xl sr-button" href="https://drive.google.com/file/d/1V-hvMRpyUv--RlI_QeVX7EmZPNRlNwT8/view?usp=sharing">Ne soyez pas timide !</a>
      </div>
    </section>

    <section class="bg-white text-dark">
      <div class="container text-center">
        <h2 class="mb-4">Mon profil Linkedin est disponible ici ! </h2>
        <a class="btn btn-light btn-xl sr-button" href="https://www.linkedin.com/in/mourad-kheloui-64ba8931/">Jetez-y un coup d'oeil !</a>
      </div>
    </section>
	
	<!-------------------------------------------------------------------------------------------- fin ------------------------------------------------------------------------------------------------------------------>
	
	<footer class="sticky-footer text-center col-md-12 bg-dark">
       <div class="container">
		
	  
			<small>Copyright © Blog PHP-Mourad Kheloui-2018</small>
	   
	  </div>
      
    </footer>

   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
	
	
  </body>
</html>