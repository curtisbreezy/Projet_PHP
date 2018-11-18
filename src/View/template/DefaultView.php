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


<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>
				<?php if(isset($_SESSION['pseudo'])){ echo " Bienvenue ".$_SESSION['pseudo']; } ?>  
				Ensemble,allons plus loin.
			  </strong>
            </h1>
            <hr>
        </div>
			<div class="col-lg-8 mx-auto">
				<p class="text-faded mb-5">Mourad Kheloui- Développeur PHP</p>
				<a class="btn btn-primary btn-xl js-scroll-trigger" href="CV_2018_PHP.pdf">Plus d'informations</a>
		</div>
    </div>
</header>
	
	

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">J'ai les compétences que vous recherchez!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Titulaire d'une licence gestion de la relation clientèle et e-commerce, j'ai durant cette troisième année, aborder les langages de développement web</p>
			<p> Après plusieurs expériences dans le domaine commercial qui m'ont ennuyé, j'ai franchi le pas et est désormais étudiant en Master 1 développeur d'application PHP avec l'école de renommée 
			internationale OpenClassrooms.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#contact">Rencontrons-nous !</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Je suis là pour vous aider</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">A la pointe de la technologie</h3>
              <p class="text-muted mb-0">Toujours plus d'efficience :</p><p> 
			  Je maîtrise le HTML, le CSS combiné à bootstrap pour la partie front. 
			  Le framework symfony viendra compléter mon socle sur le prochain projet.</p>
            </div>
          </div>
         
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">En veille permanente</h3>
              <p class="text-muted mb-0">Je reste à l'affût des dernières nouveautés </p> <p> et est ouvert à de nouvelles aventures dans le domaine du développement sur appareil mobile.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Créer avec amour</h3>
              <p class="text-muted mb-0">Ce site est là</p> <p>pour démontrer mon envie, ma passion et mon employabilité dans ce secteur !</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/chalet.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 1
                  </div>
                  <div class="project-name">
                    Chalets et caviar (Validé)
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/festival.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 2
                  </div>
                  <div class="project-name">
                    Festival du Parc Monceau (Validé)
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/food.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 3
                  </div>
                  <div class="project-name">
                    Express Food (Validé)
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/php.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 4
                  </div>
                  <div class="project-name">
                    Blog PHP ( En cours )
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 5
                  </div>
                  <div class="project-name">
                    Site communautaire sous Symfony (prochainement)
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 6
                  </div>
                  <div class="project-name">
                   Création d'une API REST(prochainement)
                  </div> 
                </div>
              </div>
            </a>
          </div>
		   <div class="col-lg-6 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/outil.jpg" width="1920px" height="1080px" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 7
                  </div>
                  <div class="project-name">
                   Maintenance et suivi d'appplication (prochainement)
                  </div> 
                </div>
              </div>
            </a>
          </div>
		   <div class="col-lg-6 col-sm-6">
            <a class="portfolio-box">
              <img class="img-fluid" src="img/portfolio/thumbnails/job.jpg" width="1920px" height="1080px" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Projet 8
                  </div>
                  <div class="project-name">
                   Stage ou entrée dans la vie active (prochainement)
                  </div> 
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white text-dark">
      <div class="container text-center">
        <h2 class="mb-4">Mon profil Linkedin est disponible ici ! </h2>
        <a class="btn btn-dark btn-xl sr-button" href="https://www.linkedin.com/in/mourad-kheloui-64ba8931/" target="blank">Jetez-y un coup d'oeil !</a>
      </div>
    </section>
	<section class="bg-dark text-white">
      <div class="container-fluid text-center">
        <h2 class="mb-4">Mon CV là ! </h2>
        <a class="btn btn-light btn-xl sr-button" href="CV_2018_PHP.pdf" target="blank">Ne soyez pas timide !</a>
      </div>
    </section>
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

