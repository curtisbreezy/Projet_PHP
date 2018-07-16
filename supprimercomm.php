<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   
   $suppr_id = htmlspecialchars($_GET['id']);
   
   $suppr = $bdd->prepare('DELETE FROM commentaire WHERE id_commentaire = ?');
   
   $suppr->execute(array($suppr_id));
 
   header("Location: extrait.php");
}
?>