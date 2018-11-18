<?php

//utilisateur connecté

if ($_SESSION['connect'] === 1) {
    ?>  
 <body id="page-top">
	<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top container-fluid" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?page=login.php">Deconnexion</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="extrait.php">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">A propos</a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Mes compétences</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Mon Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
    </div>
</nav>
<?php
else  // pour les visiteurs
	?>

 <body id="page-top">
	<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top container-fluid" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?page=login.php">Connexion/Enregistrement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">A propos</a>
            </li>
			
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Mes compétences</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Mon Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
    </div>
</nav>