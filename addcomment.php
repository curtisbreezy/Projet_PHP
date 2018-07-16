<?php session_start(); ?>
<?php
		
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$db = "projet_5";

		$conn = new mysqli($servername, $username, $password, $db);
		

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$conn->set_charset("utf8");
		
		
		
		$sql = "INSERT INTO commentaire (pseudo, commentairedate, commentairetexte, id_article)
		VALUES ('" . $_POST['author'] . "',now(),'" . $_POST['comment'] . "','" . $_POST['id'] . "')";
		
		
		if ($conn->query($sql) === TRUE) {
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		
		mysqli_close($conn);
		header("Location: article.php?id=$get_id ");
		
?>
<p> Mourad Kheloui - Étudiant Openclassrooms </p>