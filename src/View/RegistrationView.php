 <form method="POST" action="">
          <div class="form-group">
		  <div class="form-row">
              <div class="col-md-6">
            <label for="email">Email</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="Votre email" />
          </div>
		  <div class="col-md-6">
                <label for="pseudo">Pseudo</label>
                <input class="form-control" id="pseudo" type="text" name="pseudo"  placeholder="Votre pseudo"/>
              </div>
		  </div>
		  </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="mdp">Mot de passe</label>
                <input class="form-control" id="mdp" name="mdp" type="password" placeholder="8 caractères minimum">
              </div>
              <div class="col-md-6">
                <label for="mdp2">Confirmer le mot de passe</label>
                <input class="form-control" id="mdp2" name="mdp2" type="password" placeholder="8 caractères minimum">
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-success" name ="inscription" value="Inscription"></input>
        </form>
		
	
		
		<?php
		
		if(isset($erreur))
		{
			echo $erreur;
		}
		
		?>
		<?php
require('../src/View/template/LoginView.php');

?>