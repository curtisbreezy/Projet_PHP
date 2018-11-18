<div class="jumbotron jumbotron-fluid text-center mt-5">
		<h1 class="display-4"><font face="Century Gothic" size="20"> Extrait </font></h1>
</div>			


<section style="background-image : url('extrait.jpg'); background-repeat:no-repeat; background-position:center center;"> 
	<div class="text-center container" >
		 <div class="mb-3">
				<div id="currentarticle" name="currentarticle" class="p-3 mt-3" style="margin-bottom:50px;">		
						<?php while($a = $articles->fetch()) { 
						?>
							<div class="card mb-3" >
							<div class="card-header" style="font-weight:bold;"><h3><?=$a['titrepost'] ?></h3>
							<div class="card-body">
							<p class="card-text">
										
										
										
						<?php echo substr($a['textepost'],0,700);?>[..........]</p>
										
				
							<p style="color:white;">Rédigé par <?=$a['auteurpost'] ?>,le <?=$a['datepost'] ?>. </p> 

							<br/>
									
						    <button class="btn btn-success mt-3"><a href="article.php?id=<?= $a['id_article'] ?>"> En savoir + </a> </button>
								
								  <hr/>
							  </div>
						</div>
					</div>
			     <?php } ?> 						   		
            </div>					
        </div>
    </div>
</section>