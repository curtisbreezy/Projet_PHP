<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mourad-Kheloui Développeur PHP</title>
	<link href="css/article.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
 </head>

  <body id="page-top">
 <?php
	require'template/menu.php';
	
?>
	 		
<div class="jumbotron jumbotron-fluid text-center">
		<h1 class="display-4"><font face="Century Gothic" size="20"> Articles </font></h1>
</div>
					
					
<!--<section> 
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
						
</section>-->
	 		
<section>					
	<div class="container">
            <?php foreach ($posts as $a) { ?>
			<div class="p-3" style="margin-bottom:50px;">
				<div class="card mb-3" >
					<div class="card-header" style="font-weight:bold;"><h3><?= htmlspecialchars($a['titrepost']); ?></h3></div>
						<div class="card-body">
							<p class="card-text">
							<h4 style="font-weight:bold;"><?= htmlspecialchars($a['titrepost']); ?></h4>
							<hr/>								
							<p><?= htmlspecialchars_decode($a['textepost']); ?></p>
							<hr/>
							<p style="color:lightgray;">Rédigé par <?= htmlspecialchars($a['auteurpost']); ?>, le <?= htmlspecialchars($a['datepost']); ?> </p> 
							<br/>
							<button id="<?= htmlspecialchars ($a['id_article']); ?>" class="commentbutton btn btn-primary" >Voir les commentaires</button>								
							<button id="<?= htmlspecialchars ($a['id_article']); ?>" class="seecommentbutton btn btn-success"  data-toggle="modal" data-target="#myModalNorm">Poster un commentaire</button>
							
							<div>
						<span> Validation sous 24h maximum </span>
					</div>
				</div>
            	<a href="index.php?page=validate&id=<?= htmlspecialchars ($a['id_article']); ?>" class="seecommentbutton btn btn-danger"  data-toggle="modal" data-target="#myModalNorm">Signaler</a>				  
		</div>											 
	</div> 
 <?php } ?>		
 </div>
</section>										


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




</div>
       
 </header>	
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.min.js"></script>
  </body>
</html>
