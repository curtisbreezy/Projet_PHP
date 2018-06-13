<?php  session_start();
$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");

	
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
      
	  </div>
    
</header>

	
						
						
						
						
	
	<!-------------------------------------------------------------------------------------------- fin ------------------------------------------------------------------------------------------------------------------>


   

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