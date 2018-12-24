<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administration</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="vendor/css/articles.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    
 </head>

 <body>
<?php
	require'src/view/template/menu_admin.php';
?>  
<hr/>
  <!--<div class="container">
<div class="jumbotron jumbotron-fluid text-center">
	<h4><font face="Century Gothic" > <?php
		if(isset($_SESSION['pseudo'])){
		echo " Vous êtes connecté ".$_SESSION['pseudo'];
									}?> </font></h4>
</div>	

</div>-->
               
 <div class="jumbotron text-center mt-5">
		<h1 class="display-4"><font face="Century Gothic" size="20"> Les derniers articles postés </font></h1>
	</div>
	<div class="container">
        <div class="col-xl-12 col-sm-12 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Créer un post!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?page=postNew"">
              <span class="float-left">C'est parti !</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 
		
	 <?php foreach($posts as $a) { ?>
       <div class="container-fluid">
          
            <div class="card mb-3">
			  <div class="card-body text-center">
				<h3 class="text-center"><?=$a['titrepost'] ?></h3> </br>
				<hr/>
				<p class="text-justify" style="color:#000"><?=htmlspecialchars_decode($a['textepost']) ?></p> </br/>
				</br>Rédigé par : <?=$a['auteurpost'] ?> </br>
				<hr/>
				<p> Posté le <?=$a['datepost'] ?> </p></div>
              
			  
		
             
			  <a href="index.php?page=edit_post&id=<?=$a['id_article'] ?> type="submit" class="btn btn-warning" name="modifier" id="modifier" Value="modifier"> Édition </a>
			  <br/>
			  <a href="index.php?page=delete_post&id=<?=$a['id_article'] ?> type="submit" class="btn btn-danger" name="modifier" id="modifier" Value="modifier"> Suppression </a>
			  <br/>
			  <a href="index.php?page=validate&id=<?=$a['id_article']?>&validate=<?=$a['validate']?> type="submit" class="btn btn-danger"> A valider </a>
           
</div>
		  
		 <?php } ?>
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
            <a class="btn btn-primary" href="logout.php">Déconnexion</a>
          </div>
        </div>
      </div>
    </div>
</body>	
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


</html>
