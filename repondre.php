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
		
		$sql = "INSERT INTO reponse_commentaire (auteurreponse,datereponse,textereponse,id_commentaire)
		VALUES ('" . $_POST['author'] . "',now(),'" . $_POST['comment'] . "','" . $_POST['id'] . "')";

		if ($conn->query($sql) === TRUE) {
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		
		mysqli_close($conn);

		
?>