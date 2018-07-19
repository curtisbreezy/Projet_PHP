<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5", "root", "");
$comm = $bdd->query('SELECT * FROM commentaire ORDER BY commentairedate');
if(isset($_POST['auteurpost'],$_POST['titrepost'],$_POST['datepost'],$_POST['textepost'])) 
	if(!empty($_POST['auteurpost']) && !empty($_POST['datepost']) && !empty($_POST['textepost']))
	{
	$auteurpost = htmlspecialchars($_POST['auteurpost']); // protection des données
	$titrepost = htmlspecialchars($_POST['titrepost']);
	$datepost = htmlspecialchars($_POST['datepost']);
	$textepost = htmlspecialchars_decode($_POST['textepost']);
	
	
	$ins = $bdd->prepare('INSERT INTO articles(auteurpost, titrepost, datepost, textepost) VALUES(?,?,?,?)'); 
	$ins->execute(array($auteurpost,$titrepost,$datepost,$textepost));
		
	$message = 'Votre article a bien été posté';
	
	header("Location: article.php?id=".$_SESSION['id_article']);
	}
	else
	{
		$message = 'Veuillez remplir tous les champs'; 
	}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog PHP-Créer un post</title>
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
  <link href="css/sb-admin.css" rel="stylesheet">

    <script src="js/sb-admin.min.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Administration</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Tableau de bord</span>
          </a>
        </li>
        
        
		
		
     
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Gestion des posts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="article.php">Modifier un post/Voir les posts</a>
            </li>
			<li>
              <a href="supprimer-un-post.php">Supprimer un post</a>
            </li>
			
          </ul>
        </li>
		
		
       
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Blog</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Commentaires
              <span class="badge badge-pill badge-primary"></span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
		  
		 
		  
		  <?php while($c = $comm->fetch()) { ?>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Nouveaux commentaires:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
		  <strong><?=$c['pseudo']?></strong>
              <span class="small float-right text-muted"><?=$c['commentairedate']?></span>
              <div class="dropdown-message small"><?=$c['commentairetexte']?></div>
            </a>
          </div>

		  <?php } ?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Rechercher...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Déconnexion</a>
        </li>
      </ul>
    </div>
  </nav>
 
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
	  
	  <h2 class="mt-2"> <?php
		if(isset($_SESSION['pseudo'])){
		echo "".$_SESSION['pseudo'];
									}
	
?>
	</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Tableau de bord</a>
        </li>
        <li class="breadcrumb-item active">Créer un post</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Créer votre post</h1>
          <p>Poster un texte sur mon blog accompagné d'une image et répondez aussi aux commentaires laissé par les visiteurs.</p>
        </div>
      </div>
	  

	  
<section class="col-md-12">
	  
	  <form method="POST">
			
				
					<label>Auteur</label>
					
					<input type="text"  name="auteurpost" placeholder="" Value="<?php echo ($_SESSION['pseudo']);?>"> </br>
				

				
					<label>Titre</label>
					 
					<input type="text"   name="titrepost"  placeholder="Titre du post"> </br>
				
		
					<label>Date</label>
					<input type="datetime" name="datepost" value="<?php echo date("Y-m-d-H:i" ); ?>"> 
					
					
				<div>
			
					<textarea id="textepost" name="textepost" type="text">
			
					</textarea>
			
				</div>
			
			
			<div class="form-group form-check mt-3">
				
					
			
					<button type="submit" class="btn btn-primary" name="soumettre" id="soumettre" Value="Soumettre le post"> Soumettre </button>
					
				
				
					<small id="emailHelp" class="form-text text-muted">Votre post sera soumis à l'administrateur du site avant validation.</small>
			
			</div>
	 
	 </form>
	  <?php
	  if(isset($message))
	  {
		  echo $message;
	  }
	  
	  ?>
	  
</section>
  
	
	
</div>
    
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Blog PHP-Mourad Kheloui-2018</small>
        </div>
      </div>
    </footer>
   
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   
  </div>
</body>

</html>
