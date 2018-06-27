<?php session_start(); ?>
<?php
		
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$db = "projet_5";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $db);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$conn->set_charset("utf8");
		
		//FOR TESTING
		//echo "Connected successfully";
		
		$sql = "INSERT INTO commentaire (pseudo, commentairedate, commentairetexte, id_article, parent_id)
		VALUES ('" . $_POST['pseudo'] . "',now(),'" . $_POST['reponse'] . "','" . $_POST['id'] . "','". $_POST['id_commentaire'] ."')";

		if ($conn->query($sql) === TRUE) {
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		
		mysqli_close($conn);

		
?>