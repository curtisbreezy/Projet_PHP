<?php



$message = $_POST['messagecontact'];

$headers = 'FROM:site@local.dev';

mail('mourad.kheloui@gmail.com','formulaire de contact', $message, $headers);


?>