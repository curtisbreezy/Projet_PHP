<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles');
$comments = $bdd->query('SELECT * FROM commentaire');
?>

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

   <link href="css/articles.css" rel="stylesheet">
	
	

  </head>

<body id="page-top">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="mainNav">
          <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Accueil</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="login.php">Connexion/Inscription</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php#about">A propos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php#services">Mes compétences</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php#portfolio">Mon Portfolio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php/#contact">Contact</a>
                </li>
              </ul>
            </div>
          </div>
          
      </nav>
	  <nav>
	   
   
  
		

<section> 
	<div class="text-center container">
		 <div class="mb-3">
			<div class="container">
				<font face="Century Gothic" size="20"> Articles </font>
                      
				
				        
						
                            <div id="currentarticle" class="p-3 mt-3" style="margin-bottom:50px;">
								<!-- récupération des articles en base de donnée -->
							<?php while($a = $articles->fetch()) { 
							?>
                           
                                <h4 style="font-weight:bold;"><?=$a['titrepost'] ?></h4>
								<hr/>								

                                <p>
								
					
								
								<?php 
								
							
								
								echo substr($a['textepost'],0,700);
								
								?>..........</p>
								
							
								<hr/>

                                <p style="color:lightgray;">Rédigé par <?=$a['auteurpost'] ?>, le <?=$a['datepost'] ?>. </p> 

                                <br/>

                                <button class="btn btn-warning mb-3"><a href="article.php?id=<?= $a['id_article'] ?>"> En savoir + </a> </button>
                                   <?php } ?> 
                                
                            </div>
                            
                           
											
                  </div>
            </div>
        </div>
</section>


        </div>
       
    </header>	
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
  </body>
</html>

