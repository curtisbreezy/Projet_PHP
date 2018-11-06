<?php session_start();
 setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); 


if(!empty($_POST['nom']) AND!empty($_POST['email']) AND!empty($_POST['message'])) {
		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers = htmlspecialchars($_POST['email']);
        $to = "mourad.kheloui@gmail.com";
        $subject = 'Message envoyé par ' . htmlspecialchars($_POST['nom']) .' - ' . htmlspecialchars($_POST['email']) .'';
        $message = 'Corps du message :' .htmlspecialchars($_POST['message']);

       
        if(mail($headers,$to,$message,$subject)){
            echo "<script> alert ('Votre message à bien été envoyé'); </script>";
            unset($nom);
            unset($email);
            unset($message);
        
        }
        else{    
        
        $erreur = "Une erreur est survenue le mail n'est pas parti !";
        
        }
		
    }
	
	require('AffichageAccueil.php');

?>