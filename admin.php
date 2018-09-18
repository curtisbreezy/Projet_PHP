<?php session_start();

setcookie('pseudo','',time(), null, null, false, true); 


$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY id_article DESC');
$comm = $bdd->query('SELECT * FROM commentaire ORDER BY id_commentaire LIMIT 0, 10');

$_POST['pseudo'] = htmlspecialchars($_POST['pseudo'];


if(isset($_POST['pseudo'],$_POST['mdpconnect'])) 
	if(!empty($_POST['pseudo']) && !empty($_POST['mdpconnect']))
		{ 
			$requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdpconnect = ?"); 
			$userexist = $requser->rowCount(); /
			
			if($userexist == 1)
			{
				
			 $userinfo = $requser->fetch();
			 $_SESSION['pseudo'] = $userinfo['pseudo'];
			 $_SESSION['mdpconnect'] = $userinfo['mdpconnect'];
			 header("Location: admin.php?id=".$_SESSION['pseudo']);
			 $erreur = "vous êtes connecté";
			
			}
			
			else  
			
		
			{
			 header("Location: login.php");
			}
		
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
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
              <a href="post.php?id=".$user['id_utilisateur']"">Créer un post</a>
            </li>
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
      <ul class="navbar-nav"> 
        <li class="nav-item mb-2">
          <a class="nav-link" data-toggle="modal">
            <a class="fa fa-fw fa-sign-out" href="logout.php">Déconnexion</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-fluid">
	 <h2 class="mt-4"> 
	 <?php if(isset($_SESSION['pseudo'])){ echo " Vous êtes connecté ".$_SESSION['pseudo'];}?> 
	
	</h2> <br/>
	
    
      <ol class="breadcrumb mt-2">
        <li class="breadcrumb-item">
          <a href="#">Mon tableau de bord</a>
        </li>
        <li class="breadcrumb-item active">Mon tableau de bord</li>
      </ol>
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
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
        <div class="col-xl-6 col-sm-6 mb-3">
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
      </div>
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> Mes articles</div>
          <hr class="mt-2">
          <div class="card-columns">
            <div class="card mb-3">
          
              <div class="card-body">
				<?php while($a = $articles->fetch()){?>
				</br><?=$a['auteurpost'] ?> </br>
				<?=$a['titrepost'] ?> </br>
				<?=$a['textepost'] ?> </br/>
				
				
			  <button> <a href="modifierpost.php?edit=<?= $a['id_article'] ?>" style="color:#F05F40; !important"> Éditer l'article </a> </button>
			  <?php }?>	
		
						
				
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              
			  
			  <div class="card-body small bg-faded">
                <div class="media">
                  <div class="media-body">
				  <?php while($c = $comm->fetch()) {?>
							<?=$c['pseudo'] ?> </br>
							<?=$c['commentairedate']?> </br>
							<?=$c['commentairetexte']?>
							
				  <?php }?>
                    
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted"><?php echo $a['commentairedate'];?></div>
            </div>
        </div>
		
  <footer class="sticky-footer text-center col-md-12 bg-dark">
       <div class="container">
			<a class="btn btn-dark btn-xl sr-button col-md-6 mb-3 text-center" href="admin.php">Espace abonné</a>
	   <div>
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
            <a class="btn btn-primary" href="login.html">Déconnexion</a>
          </div>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>
</html>

