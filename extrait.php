<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY datepost DESC LIMIT 0, 10');


if(isset($_GET['id']) AND !empty($_GET['id'])) {
    
	$get_id = htmlspecialchars($_GET['id']);
	
	$article = $bdd->prepare('SELECT * FROM articles WHERE id_article = ?');
	$article->execute(array($get_id));
	
	if($article->rowCount()== 1) {
		$article = $article->fetch();
		$titre = $article['titrepost'];
		$contenu = $article['textepost'];
	
}

	
	
	

if(isset($_POST['auteurreponse'],$_POST['datereponse'],$_POST['textereponse'])) 
	if(!empty($_POST['auteurreponse']) AND !empty($_POST['datereponse']) AND !empty($_POST['textereponse']))
	{
	$auteurreponse = htmlspecialchars($_POST['auteurreponse']); // protection des données
	$datereponse = htmlspecialchars($_POST['datereponse']);
	$textereponse = htmlspecialchars_decode($_POST['textereponse']);
	
	
	$ins = $bdd->prepare('INSERT INTO reponse_commentaire (auteurreponse,datereponse, textereponse) VALUES(?,?,?)'); // insertion dans la base de donnée ,en théorie !
	$ins->execute(array($auteurreponse,$datereponse,$textereponse));
		
	$message = 'Votre article a bien été posté';
	
	header("Location: article.php?id=".$_SESSION['id_article']);
	}
	else
	{
		$message = 'Veuillez remplir tous les champs'; // si un des champs n'est pas complété
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
   <link href="css/articles.css" rel="stylesheet">
	
	

  </head>

  <body id="page-top">

    <!-- Navigation -->
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
	   
   
  
					<!--DÉBUT CODE À RÉVISER-->

<section> 
	<div class="text-center container">
		 <div class="mb-3">
			<div class="container">
				<font face="Century Gothic" size="20"> Articles </font>
                      
				
				        <!-- récupération des articles en base de donnée -->
                        <?php while($a = $articles->fetch()) { 
						$current = $a['id_article'] ?>

                            <div id="currentarticle" class="p-3" style="margin-bottom:50px;">
								
                             
                                <h4 style="font-weight:bold;"><?=$a['titrepost'] ?></h4>
								<hr/>								

                                <p>
								<!---------------- limitation du nombre de caractère pour créer l'extrait. ----------------->
								
								<?php 
								
							
								
								echo substr($a['textepost'],0,700);
								
								?>..........</p>
								
								<hr/>

                                <p style="color:lightgray;">Rédigé par <?=$a['auteurpost'] ?>, le <?=$a['datepost'] ?>. </p> 

                                <br/>

                                <button class="btn btn-warning"><a href="article.php?id=<?= $a['id_article'] ?>"> En savoir + </a> </button>
                                
                               
                            </div>
                            
                         
											
                            </div>
							
							<div>
							
							
							
							
							
							</div>
								
					<?php } ?>  
				
						 
                   
				   </div>
                       
 
					 
                    
				</div>
                     
                           
				
			 </div>
</div>		



		
	
            </div>
        </div>
    </div>
</section>

<!--FIN CODE À RÉVISER-->
<!--VOIR AUSSI addcomment.php-->

        </div>
       
    </header>	

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
	
	
  </body>
</html>