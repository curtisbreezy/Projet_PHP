<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$article = $bdd->query('SELECT * FROM articles');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    
	$get_id = htmlentities($_GET['id']);
	if (is_numeric($get_id))
	{
	$articles = $bdd->prepare('SELECT * FROM articles WHERE id_article = :get_id');
	$articles->execute(array('get_id'=>$get_id));
	
	
}
}



?>

<!DOCTYPE html>
<html lang="fr">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mourad-Kheloui Développeur PHP</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
	<link href="css/articles.css" rel="stylesheet">
  </head>

  <body id="page-top">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="mainNav">
          <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Accueil</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="login.php">Connexion/Inscription</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="extrait.php">Posts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php#about">A propos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php#services">Mes compétences</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php#portfolio">Mon Portfolio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php/#contact">Contact</a>
                </li>
              </ul>
            </div>
          </div> 
      </nav>
	 		
<div class="jumbotron jumbotron-fluid text-center">
		<h1 class="display-4"><font face="Century Gothic" size="20"> Articles </font></h1>
</div>
					
					
<section> 
	<div class="text-center">
		 <div class="mb-3">
				<div class="caption m-3">
                        <script src="vendor/jquery/jquery.min.js"></script>
                        
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
                        
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

                        <script>
                            
                            $( document ).ready(function() {
                                $( ".commentbutton" ).click(function() {
                                    
                                    $(".comments" + event.target.id).toggle();
                                    
                                });
                                
                                $( ".seecommentbutton" ).click(function() {
                                    
                                    $('.savebutton').attr('id',event.target.id); 
                                    
                                });
								
								
								$( ".seecommentbutton2" ).click(function() {
                                    
                                    $('.savebutton2').attr('id',event.target.id); 
                                    
                                });
                              
                                $( ".savebutton" ).click(function() {
                                                        
                                    var author = $("#exampleInputAuthor1").val();
                                    var comment = $("#exampleInputComment1").val();
                                    
                                     $.ajax({
                                        type: 'POST',
                                        url: "addcomment.php",
                                        cache: false,
                                        data: { id : event.target.id, author: author, comment: comment },
                                        success: function(data){  
                                            alert(data);
                                        }
                                    });
                                    
                                });
								
                            });
                        </script>
						

			
<section style="background-image : url('article.jpg'); background-repeat:no-repeat; background-position:center center;">					
	
                    
											



<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">                         
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Ajouter un commentaire </h4>
					</div>
						<div class="modal-body">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputAuthor1">Auteur</label>
                                          <input type="text" class="form-control"
                                          id="exampleInputAuthor1" placeholder="Auteur"/>
											</div>
													<div class="form-group">
												 <label for="exampleInputComment1">Commentaire</label>
											   <input type="text" class="form-control"id="exampleInputComment1" placeholder="Commentaire"/>
											 </div>
										  <button id="savebutton" type="submit" class="btn btn-secondary savebutton" style="float:right;">Enregistrer</button>
									   </form>
								 </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



</div>
       
 </header>	
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
  </body>
</html>
