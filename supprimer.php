<?php
$bdd = new PDO("mysql:host=localhost;dbname=projet_5;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $bdd->prepare('DELETE FROM articles WHERE id_article = ?');
   $suppr->execute(array($suppr_id));
   header("Location: /extrait.php?id=".$_SESSION['id_utilisateur']);
}
?>

