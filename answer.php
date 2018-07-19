<?php 

		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$db = "projet_5";

		// Create connection
		$bdd = new mysqli($servername, $username, $password, $db);
		
		// Check connection
		if ($bdd->connect_error) {
			die("Connection failed: " . $bdd->connect_error);
		} 
		$bdd->set_charset("utf8");
	
		$comments = $bdd->query('SELECT * FROM commentaire');
		$articles = $bdd->query('SELECT * FROM articles');
		

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
 
  <link href="css/creative.css" rel="stylesheet">
  
    <script src="js/sb-admin.min.js"></script>
	
	
</head>

	<div class="jumbotron text-center">	
		
											<form method="post">
												<br/>
													<label> Pseudo </label>
												<br/>
													<input type="text" name="pseudo" class="col-md-8"/>
												<hr/>
													<label> Votre réponse </label>
												<br/>
												    <textarea class="col-lg-10" type="text" name="commentairetexte">  </textarea>
												
												<br/>	
													<input type="hidden"  name="id_article" value="<?php echo $_GET["id_article"];?>"> </input>
												
													<input type="hidden"  name="id_commentaire" class="col-md-8" value="<?php echo $_GET["id_commentaire"];?>"> </> 
												
													<input type="hidden"  name="validate" class="col-md-8" value="0">
												<hr/>
													<button type="submit" class="btn btn-success"> Répondre </button> 
													
											</form>
											<br/>
											<p> Tout commentaire posté sera soumis pour validation sous 24h </p>
	</div>

	
											



		
		
		

<?php
if(isset($_GET['id_commentaire'])  && isset($_GET['id_article']) && isset($_GET['validate'])) {						
		if(!empty($_POST['pseudo'])  && !empty($_POST['commentairetexte'])) {
												
			
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$commentairedate=  htmlspecialchars($_POST['pseudo']); 
			$commentairetexte = htmlspecialchars($_POST['commentairetexte']);
			$id_commentaire = htmlspecialchars($_GET['id_commentaire']);
			$id_article = htmlspecialchars($_GET['id_article']);
			$validate = htmlspecialchars($_GET['validate']);
			$reponse = $bdd->query("INSERT INTO commentaire(pseudo,commentairedate,commentairetexte,id_article,parent_id,validate) 
			VALUES ('" . $_POST['pseudo'] . "',now(),'" . $_POST['commentairetexte'] . "','" . $_POST['id_article'] . "','" . $_POST['id_commentaire'] . "','" . $_POST['validate'] . "')");
			header("Location: extrait.php");
		}
	
}

?>		
			
										
					
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
