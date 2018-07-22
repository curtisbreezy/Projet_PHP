<?php  session_start();
$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$user = $bdd->query('SELECT * FROM user');
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC');
$comments = $bdd->query('SELECT * FROM commentaire WHERE validate = 1 && parent_id = 0   ORDER BY commentairedate');
$reponses = $bdd->query('SELECT * FROM commentaire WHERE validate = 1 && parent_id !=0 ORDER BY commentairedate');
?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog PHP-Modération des commentaires</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Administration</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tableau de bord">
          <a class="nav-link" href="#">
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
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tableau de bord">
          <a class="nav-link" href="validatecomment.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Gestion des commentaires</span>
          </a>
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
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="admin.php">Tableau de bord</a>
        </li>
        
      </ol>
     
	
<div class="row">
        
		<div class="col-12">
          
		  <h1>Modération des commentaires</h1>
          <p>Possibilité de valider ou supprimer un commentaire.</p>
				
		
		</div>
	
	
	
<div class="col-md-12">
	<div class="card mb-3">
        <div class="card-header"> </div>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" method="post" id="dataTable" width="100%" cellspacing="0">
              <thead>
			  
                <tr>
				  <th>Auteur</th>
				  <th>Date de publication</th>
                  <th>Article</th>
                  <th>Supprimer</th>
				  
                </tr>
				
              </thead>
			  
			  
			  <?php 
			  while($c = $comments->fetch()) 
				  
			  {?> 
              <tbody>
                <tr>
                  <td type="text" name="pseudo"><?= $c['pseudo'] ?>   </td>
                  <td type="datetime" name="commentairedate"><?= $c['commentairedate'] ?></td>
                  <td type="text" name="commentairetexte"><?= $c['commentairetexte'] ?></td>
                  <td><a href="supprimercommmodo.php?id=<?= $c['id_commentaire'] ?>">Supprimer le commentaire</a></td>
				  
                </tr>
              </tbody>
			  
			  <?php }?>
			  
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Mise à jour le <?php echo date('d/m/Y à h:i:s '); ?>
</div>
      </div>
    </div>
</div>
<hr/>
<div class="row">
        
		<div class="col-12">
          
		  <h1>Modération des réponses</h1>
          <p>Possibilité de valider ou supprimer un commentaire.</p>
				
		
		</div>

<div class="col-md-12">
	<div class="card mb-3">
        <div class="card-header"> </div>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" method="post" id="dataTable" width="100%" cellspacing="0">
              <thead>
			  
                <tr>
				  <th>Auteur</th>
				  <th>Date de publication</th>
                  <th>Article</th>
                  <th>Supprimer</th>
				
                </tr>
				
              </thead>
			  
			  
			  <?php 
			  while($r = $reponses->fetch()) 
			
			  {?>  
              <tbody>
                <tr>
                  <td type="text" name="pseudo"><?= $r['pseudo'] ?>  </td>
                  <td type="datetime" name="commentairedate"><?= $r['commentairedate'] ?></td>
                  <td type="text" name="commentairetexte"><?= $r['commentairetexte'] ?></td>
                  <td><a href="supprimercommmodo.php?id=<?= $r['id_commentaire'] ?>">Supprimer le commentaire</a></td>
				 
                </tr>
              </tbody>
			  
			  <?php }?>
			  
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Mise à jour le <?php echo date('d/m/Y à h:i:s '); ?>
</div>
      </div>
    </div>
</div>
   
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
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
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>


