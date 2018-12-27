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
	
			
		
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdp = sha1($_POST['mdp']);
		
		
		
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
			
	
}
				   

    /**
     * function SELECT user
     */
    public function getUser()
    {
        $db = $this->getDb();
        $pseudo = $_SESSION['pseudo'];
        $email = $_SESSION['mdp'];

        $req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND mdp = :mdp');
		$req->bindParam(':pseudo', $_SESSION['pseudo'], \PDO::PARAM_INT);
		$req->bindParam(':mdp', $_SESSION['mdp'], \PDO::PARAM_INT);
        $req->execute();
        $user = $req->fetch();

        return $user;
    }
}