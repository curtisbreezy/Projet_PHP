<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5", "root", "");

if(isset($_POST['auteurpost'],$_POST['titrepost'],$_POST['datepost'],$_POST['textepost'])) 
	if(!empty($_POST['auteurpost']) AND !empty($_POST['datepost']) AND !empty($_POST['textepost']))
	{
	$auteurpost = htmlspecialchars($_POST['auteurpost']); // protection des données
	$titrepost = htmlspecialchars($_POST['titrepost']);
	$datepost = htmlspecialchars($_POST['datepost']);
	$textepost = htmlspecialchars_decode($_POST['textepost']);
	
	
	$ins = $bdd->prepare('INSERT INTO articles(auteurpost, titrepost, datepost, textepost) VALUES(?,?,?,?)'); // insertion dans la base de donnée ,en théorie !
	$ins->execute(array($auteurpost,$titrepost,$datepost,$textepost));
	var_dump($auteurpost,$titrepost,$datepost,$textepost);			
	$message = 'Votre article a bien été posté';
	
	header("Location: PostListView.php?id=".$_POST['id_article']);
	}
	else
	{
		$message = 'Veuillez remplir tous les champs'; // si un des champs n'est pas complété
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
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
      
      <div class="row">
        <div class="col-12">
          <h2>Créer votre post</h2>
          <p>Poster un texte sur mon blog et répondez aussi aux commentaires laissé par les visiteurs.</p>
        </div>
      </div>
	  
	  
<!---------------------------------------------------------------------------------------------------------------------------------- éditeur de post-------------------------------------------------------------------------------------------------------------------------------- -->
	  
<section class="col-md-12">
	  
	  <form method="POST">
			
				<div>
					<label>Auteur :</label>
					
					<input type="text"  name="auteurpost" placeholder="" Value="<?php echo ($_SESSION['pseudo']);?>"> </br>
				

				
					<label>Titre :</label>
					 
					<input type="text"   name="titrepost"  placeholder="Titre du post"> </br>
				
		
					<label>Date :</label>
					<input type="datetime" name="datepost" value="<?php echo date("Y-m-d-H:i" ); ?>"> 
					
				</div>	
				<div>
			
					<textarea id="textepost" name="textepost" type="text">
			
					</textarea>
			
				</div>
			
			
				
					
			
					<button type="submit" class="btn btn-success mt-3" name="soumettre" id="soumettre" Value="Soumettre le post"> Soumettre </button>
					
				
				
			
		
	 
	 </form>
	  <?php
	  if(isset($message))
	  {
		  echo $message;
	  }
	  
	  ?>
	  
</section>
   
<!---------------------------------------------------------------------------------------------------------------------------------- fin du modèle ----------------------------------------------------------------------------------------------------------------------------------------------------->
	
	
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
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   
  </div>
</body>

</html>
