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

<body class="fixed-nav sticky-footer" id="page-top">
  
      
      <div class="row">
        <div class="col-12">
          <h2>Créer votre post</h2>
          <p>Poster un texte sur mon blog et répondez aussi aux commentaires laissé par les visiteurs.</p>
        </div>
      </div>
	  
	  

	  
<section class="col-md-12">
	<form action="index.php?page=postAdd" method="POST">
		<div>
			
			<label>Auteur :</label>
				<input type="text"  name="auteurpost" placeholder="" Value="<?php echo htmlspecialchars ($_SESSION['pseudo']);?>"> </br>
			
			<label>Titre :</label>
					 
				<input type="text"   name="titrepost"  placeholder="Titre du post"> </br>
		
			<label>Date :</label>
					
				<input type="datetime" name="datepost" value="<?php echo date("Y-m-d-H:i" ); ?>"> 
					
		</div>	
				<div>
			
					<textarea id="textepost" name="textepost" type="text"> </textarea>
			
				</div>
			
			
					<button type="submit" class="btn btn-success mt-3" name="soumettre" id="soumettre" Value="Soumettre le post"> Soumettre </button>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </div>
</body>
</html>
