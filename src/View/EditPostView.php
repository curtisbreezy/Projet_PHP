<section class="col-md-12">

	 
	  
			<form method="POST">
			
					
					<label>Auteur</label>
					
					<input type="text"  name="auteurpost" Value="<?=$post['auteurpost'] ?>"> </br>
				
					<label>Titre</label>
					 
					<input type="text" name="titrepost" value="<?=$post['titrepost'] ?>"> </br>
				
		
					<label>Date</label>
					
					<input type="datetime" name="datepost" value="<?php echo date("Y-m-d-H:i" ); ?>"> 
					
					
					<div> <textarea id="textepost" name="textepost" type="text"> <?=$post['textepost'] ?> </textarea> </div>
			
			
						<div class="form-group form-check mt-3">
				
					
							<button type="submit" class="btn btn-primary" name="modifier" id="modifier" Value="modifier"> 
							Modifier l'article </button>

			
						</div>
	 
	        </form>
			



	
	 
	  
</section>