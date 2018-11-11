<?php session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");

require('src/View/AffichageAccueil.php');
?>






