<?php  session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles');

if(isset($_get['id']) AND !empty($_GET['id'])) {
	$get_id = htmlspecialchars($_GET['id']);
	$articles = $bdd->prepare('SELECT * FROM articles WHERE id_article = ?');
	$articles->execute(array($get_id));
	
	if($articles->rowCount() ==1) {
		$titre = $articles['titrepost'];
		$contenu = $articles['textepost'];
		$auteur = $articles['auteurpost'];
	
} else{
	die('Cet article n existe pas !');
	
} 


}

?>



<?php 

	require'/template/menu_admin.php'

?>

  
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      
     
	 <div class="row">
        
		<div class="col-12">
          
		  <h1>Supprimer un post</h1>
          <p>Sur cette page vous avez la possibilité de supprimer un post, cette action est irrévocable.</p>
				
		
		</div>
	
	<!---------------- code à modifier ----------------------->
	
<div class="col-md-12">
	<div class="card mb-3">
        <div class="card-header"> </div>
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
			  
                <tr>
                  <th>Article</th>
                  <th>Auteur</th>
                  <th>Date de publication</th>
                  <th>Supprimer</th>
				  <th>Modifier</th>
                </tr>
				
              </thead>
			  
			  
			  <?php 
			  while($a = $articles->fetch())				  
			  {?>  <!-- boucle pour appeler les articles depuis la bdd -->
              <tbody>
                <tr>
                  <td><?= $a['titrepost'] ?>  <!-- insertion des informations --> </td>
                  <td><?= $a['auteurpost'] ?></td>
                  <td><?= $a['datepost'] ?></td>
                  <td><a href="public/index.php?page=delete_post&id=<?= $a['id_article'] ?>">Supprimer le post</a>  <!-- suppression par id --></td>
				  <td><a href="public/index.php?page=edit_post&id=<?= $a['id_article'] ?>"> Éditer l'article </a> <!-- editer un article --></td>
                </tr>
              </tbody>
			  
			  <?php }?>
			  
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Mise à jour le <?php echo date('d/m/Y à h:i:s '); ?>
</div>
      </div>
    </div>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

 