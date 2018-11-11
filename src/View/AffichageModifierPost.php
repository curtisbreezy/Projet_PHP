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

<body class="fixed-nav sticky-footer bg-light" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
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
              <a href="post.php">Créer un post</a>
            </li>
			<li>
              <a href="supprimer-un-post.php">Supprimer un post</a>
            </li>
          </ul>
        </li>
		
		
       
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="http://localhost/index.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Blog</span>
            <a class="fa fa-fw fa-sign-out m-3" href="logout.php">Déconnexion</a>
        </li>
      </ul>
    </div>
  </nav>
 
<div class="content-wrapper">
    <div class="container-fluid">
    
	  
	  <h2 class="mt-2"> <?php
		if(isset($_SESSION['pseudo'])){
		echo "Vous êtes connecté " .$_SESSION['pseudo'];
									}
	
?>
	</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Tableau de bord</a>
        </li>
        <li class="breadcrumb-item active">Modifier un post</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Modifier votre post</h1>
          <p>Poster un texte sur mon blog accompagné d'une image et répondez aussi aux commentaires laissé par les visiteurs.</p>
        </div>
      </div>
	  
	  

	  
<section class="col-md-12">

	 
	  
			<form method="POST">
			
					
					<label>Auteur</label>
					
					<input type="text"  name="auteurpost" Value="<?=$edit_article['auteurpost'] ?>"> </br>
				
					<label>Titre</label>
					 
					<input type="text" name="titrepost" value="<?=$edit_article['titrepost'] ?>"> </br>
				
		
					<label>Date</label>
					
					<input type="datetime" name="datepost" value="<?php echo date("Y-m-d-H:i" ); ?>"> 
					
					
					<div> <textarea id="textepost" name="textepost" type="text"> <?=$edit_article['textepost'] ?> </textarea> </div>
			
			
						<div class="form-group form-check mt-3">
				
					
							<button type="submit" class="btn btn-primary" name="modifier" id="modifier" Value="modifier"> 
							Modifier l'article </button>

			
						</div>
	 
	        </form>
			



	
	 
	  
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
