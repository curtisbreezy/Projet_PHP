<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Se connecter</div>
      <div class="card-body">
        <form method="POST" action="index.php?page=login">
          <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input class="form-control" id="pseudo" type="texte" name="pseudo"  placeholder="Votre pseudo">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input class="form-control" id="mdpconnect" type="password" name="mdpconnect" placeholder="Votre mot de passe">
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Se connecter"/>
        </form>
		
		
		<div class="text-center">
		  <a class="d-block small mt-3" href="index.php?page=formAddUser">S'inscrire</a>
        </div>
		
		
        <div class="text-center">
		  <a class="d-block small mt-3" href="../../index.php">Retour au blog</a>
        </div>
		
      </div>
    </div>
  </div>
  
 
<?php


$content = ob_get_clean();

require('/template/LoginView.php');
?>
