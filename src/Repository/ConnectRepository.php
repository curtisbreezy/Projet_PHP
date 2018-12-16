<?php

namespace App\Repository;

use App\Model\Connect;

/**
 * Class ConnectRepository extend connect
 */
class ConnectRepository extends Connect
{
    /**
     * function New user INSERT
     */
    public function newUser()
    {
        $db = $this->getDb();

        $pseudo = $_SESSION['pseudo'];
        $pass = $_SESSION['mdp'];
        $email = $_SESSION['email'];

        $reqInsert = 'INSERT INTO user(email, pseudo,mdp)' ;
        $reqValues = 'VALUES(:email,:pseudo,:mdp)';
        $req = $db->prepare($reqInsert . $reqValues);
        $req->execute(array(
        'pseudo' => $pseudo,
        'mdp' => $mdp,
        'email' => $email));
    }
    /**
     * function SELECT user
     */
    public function existPseudo()
{
	$db = $this->getDb();
	if(isset($_POST['connexion'])) 
{			
		
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdpconnect = sha1($_POST['mdpconnect']);
		
		
		
		if(!empty($pseudo) AND !empty($mdpconnect))
		{ 
			$requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?"); 
			$requser->execute(array($pseudo,$mdpconnect));
			$userexist = $requser->rowCount(); 
			
			if($userexist == 1)
			{
				
			 $userinfo = $requser->fetch();
			 $_SESSION['pseudo'] = $userinfo['pseudo'];
			 $_SESSION['mdpconnect'] = $userinfo['mdpconnect'];
			 header("Location: admin\admin.php?id=".$_SESSION['pseudo']);
			 $erreur = "vous êtes connecté";
			
			}
			
			else  
			
		
			{
			$erreur = "Mauvais mot de passe ou email";
			}
		
		
		}	
		else 
			
		
			{
			$erreur = "Merci de tout compléter";
			}
	
}
				   

    /**
     * function SELECT user
     */
    public function getUser()
    {
        $db = $this->getDb();
		$pseudo = $_SESSION['pseudo'];
        $pass = $_SESSION['mdp'];
        $email = $_SESSION['email'];

        $req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
        $req->execute(array(
    'pseudo' => $_SESSION['pseudo']));
        $user = $req->fetch();

        return $user;
    }
}