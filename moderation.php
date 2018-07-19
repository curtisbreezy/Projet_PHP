<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC LIMIT 0, 10');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    
	$get_id = htmlentities($_GET['id']);
	
	$article = $bdd->prepare('SELECT * FROM articles WHERE id_article = ?');
	$article->execute(array($get_id));
	
	if($article->rowCount()== 1) {
		$article = $article->fetch();
		$titre = $article['titrepost'];
		$contenu = $article['textepost'];
	
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
	<div class="text-center">
		
					<div class="container">
						<font face="Century Gothic" size="20"> Modération des commentaires </font>
							<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				      
            
                            
                           
                            <thead> Commentaires </thead>
                                <?php
                                    $comments = $bdd->query("SELECT * FROM commentaire ");
							
                                ?>
                                <?php while($c = $comments->fetch()) { 
								
								?> 
								<tbody>
								<tr>
									<td> <?=$c['commentairetexte'] ?> </td>    
									<td> <?=$c['commentairedate'] ?> </td> 
									<td> <?=$c['pseudo'] ?> </td> 

										<?php }?>										
                       
								</tbody>					
												
							</table>					
							</div>					
					
						
			</div>			 
           </div>         
</section>



       
       
    </header>	

 
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="js/creative.min.js"></script>
	
	
  </body>
</html>