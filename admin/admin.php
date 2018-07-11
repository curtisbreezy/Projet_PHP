<?php session_start();

setcookie('pseudo','',time(), null, null, false, true); // 86400 = 1 day


$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC LIMIT 0, 1');
$comm = $bdd->query('SELECT * FROM commentaire ORDER BY id_commentaire LIMIT 0, 10');
$reponse_comm = $bdd->query('SELECT * FROM reponse_commentaire ORDER BY id_reponse LIMIT 0, 5');


if(isset($_GET['pseudo']))
		if(!empty($_GET['pseudo'])){
			
		}
		else
		{	
	
	header("Location: login.php");
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
  <title>Blog PHP-Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-light" id="page-top">
  <!-- Navigation-->
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
	  <ul>
	   
	 </ul>
    
	  
	  
	  
      
        
        
       
    </div>
  </nav>
 

	  
  <div class="content-wrapper bg-light">
    <div class="container-fluid">
	<hr/>
	 <h2 class="mt-2"> <?php
		if(isset($_SESSION['pseudo'])){
		echo " Vous êtes connecté ".$_SESSION['pseudo'];
									}
	
?>
<hr/>
	</h2>
	
    
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Créer un post!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="post.php?id=".$_SESSION['pseudo']">
              <span class="float-left">C'est parti !</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Supprimer un post</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="supprimer-un-post.php">
              <span class="float-left">Dommage !</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
		
		
		<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
				
              </div>
              <div class="mr-5">Mettre à jour un post</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="http://localhost/article.php">
              <span class="float-left">Quoi de neuf?</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
       
      </div>
	  
	
		
	  
	            
 <div class="mb-0 mt-4">
    <i class="fa fa-newspaper-o"></i> Le dernier article posté</div>
       <hr class="mt-2">
          <div class="card-columns col-12">
            <div class="card mb-3">
			  <div class="card-body">
				<?php while($a = $articles->fetch()){?>
				
				<h3 class="text-center"><?=$a['titrepost'] ?></h3> </br>
				<hr/>
				<p class="text-justify"><?=$a['textepost'] ?></p> </br/>
				</br>Rédigé par : <?=$a['auteurpost'] ?> </br>
				<hr/>
				<p> Posté le <?=$a['datepost'] ?>
				<?php }?>	
			  </div>
              
			  <hr class="my-0">
              

            </div>
		  </div>
</div>      
      
         
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Blog PHP-Mourad Kheloui-2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
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
            <a class="btn btn-primary" href="logout.php">Déconnexion</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>