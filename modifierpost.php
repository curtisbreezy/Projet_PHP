<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC');

if(isset($_get['id']) AND !empty($_GET['id'])) {
	$get_id = htmlspecialchars($_GET['id']);
	
	$article = $bdd->prepare('SELECT * FROM articles WHERE id_article = ?');
	$article->execute(array($get_id));
	


if(isset($_POST['modifier'])){						
	{
	$auteurpost = htmlspecialchars($_POST['auteurpost']);
	$titrepost = htmlspecialchars($_POST['titrepost']);
	$datepost = htmlspecialchars($_POST['datepost']);
	$textepost = htmlspecialchars_decode($_POST['textepost']);
	
	
	$update = $bdd->prepare('UPDATE articles SET auteurpost=?,datepost=?,titrepost=?,textepost=? WHERE id_article =?'); // insertion dans la base de donnée ,en théorie !
	$update->execute(array($auteurpost,$titrepost,$datepost,$textepost));
		
	$message = 'Votre article a bien été mise à jour';
	
	header("Location: article.php?id=".$_SESSION['id_utilisateur']);
	}
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
    <link href="css/creative_mod.css" rel="stylesheet">
	

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
	  
	  
	 
     
		  
<div class="col-md-12">
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
			  
                <tr>
				  <th>Auteur</th>
                  <th>Article</th>
                  <th>Date de publication</th>
				  <th> Texte </th>
                </tr>
				
              </thead>
			  
			  
			  <?php 
			  while($a = $articles->fetch()) 
			  {?>  <!-- boucle pour appeler les articles depuis la bdd -->
              <tbody>
                <tr>
				  <td><?= $a['auteurpost'] ?></td>
                  <td><?= $a['titrepost'] ?>  <!-- insertion des informations --> </td>
                  <td><?= $a['datepost'] ?></td>
				 <td> <textarea><?= $a['textepost'] ?> </textarea></td>
				 <td> <input type="submit" name="modifier"/> </td>
                  
                </tr>
              </tbody>
			  
			  <?php }?>
			  
            </table>
          </div>
        <div class="card-footer small text-muted">Mise à jour le <?php echo date('d-m-Y h:i:s'); ?>
        </div>
</div>
      </div>
    </div>

	
	
	<?php if (isset($message))
	{
		echo $message; 
	
	}
	
	?>
		
	
         </section>
        </div>
      </div>
    </header>

<body>

	  
	 
	
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   
  </div>
</body>

</html>
</body>
</html>
		