<?php

namespace App\Repository;

use App\Model\Connect
use App\Entity\Comment;

class CommentRepository extends Connect

{
	/**
	* function DELETE comment
	*/
	public function deleteComment()
	{
		$db = $this->getDb();
		
		$suppr_id = htmlspecialchars($_GET['id']);
	
		$suppr = $db->prepare('DELETE FROM commentaire WHERE id_commentaire = ?');
   
		$suppr->execute(array($suppr_id));
 
		header("Location: extrait.php");

	}
	
	/**
	*function SELECT one comment* @return 
	
	*/
	
	public function getOneComment()
	{
		$db = $this->getDb();
		
		$reqSelect = 'SELECT *';
        $reqFrom = ' FROM commentaire';
        $reqWhere = ' WHERE id = :id_commentaire';
		$req->bindparam(':id_commentaire', $_SESSION['id_commentaire'], \PDO::PARAM_INT);
        $req->execute();
		
		$comment = [];
        while ($data = $req->fetch()) {
            $comment[] = $data;
        }
        $req->closeCursor();
        return $comment;

        $this->getReplies();
    }
	
	/**
	*	function SELECT comments of only one post
	* @return $commentaire array
	*/
	public function getCommentsPost ($id_article)
	{
			$db = $this->getDb();
			
			$reqSelect = 'SELECT id_commentaire,commentairetexte,commentairedate
			,pseudo';
			$reqFrom=' From commentaire';
			$reqOn = ' INNER JOIN id_article';
			$reqWhere = ' WHERE postId = :articleId AND parent_id = 0 AND validate=1';
			$reqOrder = ' ORDER BY c.createdAt DESC';
			$req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqWhere . $reqOrder);
			$req->bindparam(':articleId', $_SESSION['postId'], \PDO::PARAM_INT);
			$req->execute();
			
			$comments = [];
				while ($data = $req->fetch()) {
					$comments[] = $data;
				}
				$req->closeCursor();
				return $comments;

				$this->getReplies();
			}
			
			/**
     * function SELECT alls comments
     * @return $comments
     */
    public function getAllComments()
    {
        $db = $this->getDb();
    
        // DIsplay all comments
        $reqSelect = 'SELECT id_commentaire, 
        commentairetexte, commentairedate, c.updateAt, parent_id,validate,pseudo';
        $reqFrom = ' FROM commentaire';
        $reqOn = ' INNER JOIN user AS u ON c.userId = u.id';
        $reqOrder = ' ORDER BY commentairedate DESC';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqOrder);
        $req->bindparam(':id_article', $_SESSION['id_commentaire'], \PDO::PARAM_INT);
        $req->execute();
        $comments = [];

        while ($data = $req->fetch()) {
            $comments[] = $data;
        }
    
        return $comments;
    }

    /**
     * Function INSERT TO comments
     */
    public function newComment()
    {
        $db = $this->getDb();
        if (!isset($_SESSION['parentId'])) {
            $_SESSION['parentId']=0;
        }

        $reqInsert = 'INSERT INTO commentaire';
        $reqCol = '(id_commentaire,pseudo, commentairedate, commentairetexte, id_article, parent_id)';
        $reqValues = ' VALUES(:id_commentaire,pseudo,NOW() ,:commentairetexte, :id_article, :parent_id)';
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);
        $req->bindParam(':article_id', $_SESSION['id_article'], \PDO::PARAM_STR);
        $req->bindParam(':commentairetexte', $_SESSION['commentairetexte'], \PDO::PARAM_STR);
        $req->bindParam(':id_article', $_SESSION['id_article'], \PDO::PARAM_INT);
        $req->bindParam(':parent_id', $_SESSION['parent_id'], \PDO::PARAM_INT);

        $req->execute();
    }

    /**
     * function UPDATE comment
     */
    public function updateComment()
    {
        $db = $this->getDb();

        $reqUpdate = 'UPDATE commentaire';
        $reqSet = ' SET contmessage=:commentairetexte, commentairedate=now()';
        $reqWhere = ' WHERE id_commentaire=:id';
        $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
        $req->bindParam(':id', $_SESSION['id_commentaire'], \PDO::PARAM_INT);
        $req->bindParam(':commentairetexte', $_SESSION['contmessage'], \PDO::PARAM_STR);

        $req->execute();
    }

    /**
     * function UPDATE valid comment
     */
    public function updateValidComment()
    {
        $db = $this->getDb();

        if ($_SESSION['commentValid']==1) {
            $reqUpdate = 'UPDATE comments';
            $reqSet = ' SET valid=0';
            $reqWhere = ' WHERE id=:id';
            $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
            $req->bindParam(':id', $_SESSION['commentId'], \PDO::PARAM_INT);

            $req->execute();
        }

        if ($_SESSION['commentValid']==0) {
            $reqUpdate = 'UPDATE comments';
            $reqSet = ' SET valid=1';
            $reqWhere = ' WHERE id=:id';
            $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
            $req->bindParam(':id', $_SESSION['commentId'], \PDO::PARAM_INT);

            $req->execute();
        }
    }
	
	
	$sql = "UPDATE commentaire SET validate = 1";
		 echo "<script> alert('3'); </script>";
        $statement = $bdd->prepare($sql);     
        $statement->execute();
		echo "<script> alert('commentaire validé'); </script>"; 
		header("location: validatecomment.php");
}


if(isset($_GET['id']) AND !empty($_GET['id'])) {
   
   
   
   $suppr = $bdd->prepare('DELETE FROM commentaire WHERE id_commentaire = ?');
   
   $suppr->execute(array($suppr_id));
 
   header("Location: extrait.php");
}
?>
// suppresion de commentaire par l'admin ou la personne seule concernée
<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");



if(isset($_GET['id']) AND !empty($_GET['id'])) {
   
   $suppr_id = htmlspecialchars($_GET['id']);
   
   $suppr = $bdd->prepare('DELETE FROM commentaire WHERE id_commentaire = ?');
   
   $suppr->execute(array($suppr_id));
 
   header("Location: validatecomment.php");
}
?>
// Validation du commentaire
<?php  session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");
$comments = $bdd->query('SELECT * FROM commentaire ASC LIMIT 0, 10');


if(isset($_POST['pseudo'],$_POST['commentairedate'],$_POST['commentairetexte'],$_POST['validate']))
	echo "<script> alert('1'); </script>";
	{
		
				 
		echo "<script> alert('2'); </script>";
        
        
		
                    
		
		
	
	}


?>
// répondre à un commentaire
<?php  session_start();

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_5;charset=utf8", "root", "");
$comments = $bdd->query('SELECT * FROM commentaire ASC LIMIT 0, 10');


if(isset($_POST['pseudo'],$_POST['commentairedate'],$_POST['commentairetexte'],$_POST['validate']))
	echo "<script> alert('1'); </script>";
	{
		
				 
		echo "<script> alert('2'); </script>";
        
        $sql = "UPDATE commentaire SET validate = 1";
		 echo "<script> alert('3'); </script>";
        $statement = $bdd->prepare($sql);     
        $statement->execute();
		echo "<script> alert('commentaire validé'); </script>"; 
		header("location: validatecomment.php");
		
                    
		
		
	
	}


?>

// ou

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