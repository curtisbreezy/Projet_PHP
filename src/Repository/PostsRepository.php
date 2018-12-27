<?php

namespace App\Repository;

use App\Model\Connect;
use App\Entity\Post;
use App\Entity\User;
use PDO;

/**
 * Class PostRepository extend Connect
 */

class PostsRepository extends Connect
{
/**
 * function UPDATE valid article
 */
    public function updateValidPost()
    {
			$db = $this->getDb();
			
            $reqUpdate = 'UPDATE articles ';
            $reqSet = 'SET validate = 1 where id_article=:id ';
            $req = $db->prepare($reqUpdate . $reqSet );
            $req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
            $req->execute();


    }			
       
	public function updateunValidPost()
      { 
			$db = $this->getDb();
            $reqUpdate = 'UPDATE articles ';
            $reqSet = 'SET validate = 0 where id_article=:id ';
            $req = $db->prepare($reqUpdate . $reqSet );
            $req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
            $req->execute();

        }
    
    /**
     * @function SELECT the last 10 articles
     * @return $Posts array
     */
    public function getByLimit()
    {
        $db = $this->getDb();
    
        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM articles';
        $reqWhere = ' Where validate = 0';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere);
        $req->execute();
        $posts=[];

        while ($data = $req->fetch()) {
            $posts[]= $data;
        }

        $req->closeCursor();
        return $posts;
    }
    
    /**
     * @function SELECT a post with id
     * @param int $postId retreive one post SELECT auteurpost, titrepost, datepost, textepost, id_article FROM articles WHERE id_article = 27  affiché les commentaires :
	 <?php 
																	
																	$comments = $db->prepare('SELECT * FROM commentaire WHERE parent_id = 0 && validate = 1 && id_article = :current ORDER BY commentairedate ASC LIMIT 0, 10');
																	$comments->execute(array('current'=>$current));	
																	?>
																						
																	<?php while($c = $comments->fetch()) { 
																						 
																		$answer = intval($c['id_commentaire']);
																		
																	?>
     * @return $post
     */
    public function getOneById() 
    {
        $db = $this->getDb();
		$reqSelect = 'Select * ';
        $reqFrom = 'From Articles';
		$reqWhere = ' Where id_article = :id';
        $req = $db->prepare($reqSelect . $reqFrom . $reqWhere );
		$req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
        $req->execute();
        $post=[];
        
        while ($data = $req->fetch()) {
            $post[] = $data;
        }
        $req->closeCursor();
        return $post;
    }

    /**
     * Function SELECT all posts
     * @return $posts
     */
    public function getAllPosts()
    {
        $db = $this->getDb();

        $reqSelect = 'SELECT *';
        $reqFrom = ' FROM articles';
		$reqWhere = ' Where validate = 1';
        $req = $db->prepare($reqSelect . $reqFrom  . $reqWhere);
        $req->execute();
        $posts =[];
        
        while ($data = $req->fetch()) {
            $posts[] = $data;
        }

        $req->closeCursor();
        return $posts;
    }

    /**
     * Function INSERT TO articles
     */
    public function addPost()
    {
        $db = $this->getDb();

        $reqInsert = 'INSERT INTO articles';
        $reqCol = '(auteurpost, titrepost, datepost, textepost)';
        $reqValues = ' VALUES(:auteurpost, :titrepost, NOW(), :textepost)';
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);
        $req->bindParam(':auteurpost', $_SESSION['auteurpost'], \PDO::PARAM_STR);
        $req->bindParam(':titrepost', $_SESSION['titrepost'], \PDO::PARAM_STR);
        $req->bindParam(':textepost', $_SESSION['textepost'], \PDO::PARAM_STR);
  
        $req->execute();
    }

    /**
     * Function DELETE artiles
     */
    public function deletePost()
    {
        $db = $this->getDb();

        $reqDelete = 'DELETE ';
		$reqFrom = 'FROM articles';
        $reqWhere = ' WHERE id_article = :id';
        $req = $db->prepare($reqDelete . $reqFrom . $reqWhere);
        $req->bindParam(':id', $_SESSION['id_article'], \PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * function UPDATE one post
     */
    public function updatePost()
    {
        $db = $this->getDb();

        $reqUpdate = 'UPDATE articles ';
        $reqSet = 'SET auteurpost=:auteur, textepost=:content,titrepost=:title,datepost=now()';
        $reqWhere = ' WHERE id_article = :id';
        $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
        $req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_INT);
		$req->bindParam(':auteur', $_SESSION['auteurpost'], \PDO::PARAM_STR);
        $req->bindParam(':title', $_SESSION['titrepost'], \PDO::PARAM_STR);
        $req->bindParam(':content', $_SESSION['textepost'], \PDO::PARAM_STR);

        $req->execute();
		}
}

