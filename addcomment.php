<?php session_start(); ?>
<?php
		
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$db = "projet_5";

		n
		$conn = new mysqli($servername, $username, $password, $db);
		
	
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$conn->set_charset("utf8");
		
		
		
		$sql = "INSERT INTO commentaire (pseudo, commentairedate, commentairetexte, id_article)
		VALUES ('" . $_POST['author'] . "',now(),'" . $_POST['comment'] . "','" . $_POST['id'] . "')";
		echo "<script> alert('Commentaire posté en attente de validation sous 24 h maximum'); </script>";
		
		if ($conn->query($sql) === TRUE) {
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		
		mysqli_close($conn);
		
		
