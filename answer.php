<?php	session_start();  
		$bdd = new PDO("mysql:host=localhost;dbname=projet_5", "root", "");
	
		$comments = $bdd->query('SELECT * FROM commentaire');
		$articles = $bdd->query('SELECT * FROM articles');
	

if(isset($_POST['id_commentaire'])  && isset($_POST['id_article']) && isset($_POST['validate'])) {						
		if(!empty($_POST['pseudo'])  && !empty($_POST['commentairetexte'])) {
												
			
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$commentairedate=  htmlspecialchars($_POST['pseudo']); 
			$commentairetexte = htmlspecialchars_decode($_POST['commentairetexte']);
			$id_commentaire = intval($_POST['id_commentaire']);
			$id_article = intval($_POST['id_article']);
			$validate = intval($_POST['validate']);
			
			$req = $bdd->prepare("INSERT INTO commentaire (pseudo,commentairedate,commentairetexte,id_article,parent_id,validate) 
			Values(?,now(),?,?,?,?)");
			
			$req->execute(array($pseudo,$commentairetexte,$id_article,$id_commentaire,$validate));
			header("Location: extrait.php");
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
  <title>Blog PHP-Créer un post</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/creative.css" rel="stylesheet">
  <script src="js/sb-admin.min.js"></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea' });</script>
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


	
			
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Blog PHP-Mourad Kheloui-2018</small>
        </div>
      </div>
</footer>
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fa fa-angle-up"></i> </a>
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

