<?php

namespace App\Repository;

use App\Model\Connect;
use App\Entity\Post;
use App\Entity\User;
use PDO;

/**
 * Class PostRepository extend Connect
 */

class PostRepository extends Connect
{
/**
 * function UPDATE valid article
 */
    public function updateValidPost()
    {
        $db = $this->getDb();

        if ($_SESSION['Validate']==1) {
            $reqUpdate = 'UPDATE articles';
            $reqSet = ' SET valid=0';
            $reqWhere = ' WHERE id=:id';
            $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
            $req->bindParam(':id', $_SESSION['postId'], \PDO::PARAM_INT);

            $req->execute();

            $_SESSION['reqValid']='NO';
        }

        if ($_SESSION['Validate']==0) {
            $reqUpdate = 'UPDATE articles';
            $reqSet = ' SET valid=1';
            $reqWhere = ' WHERE id=:id';
            $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
            $req->bindParam(':id', $_SESSION['id_article'], \PDO::PARAM_INT);

            $req->execute();

            $_SESSION['reqValid']='OK';
        }
    }
    /**
     * @function SELECT the last 10 articles
     * @return $Posts array
     */
    public function getByLimit()
    {
        $db = $this->getDb();
    
        $reqSelect = 'SELECT id_article, 
        auteurpost,titrepost, datepost, textepost';
        $reqFrom = ' FROM articles AS p INNER JOIN user';
        $reqOn = ' ON auteurpost = pseudo';
        $reqLimit = ' ORDER BY datepost DESC LIMIT 0, 10';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn  . $reqLimit);
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
     * @param int $postId retreive one post
     * @return $post
     */
    public function getOneById()
    {
        $db = $this->getDb();

        $reqSelect = 'SELECT auteurpost, titrepost, datepost, textepost, id_article, u.pseudo';
        $reqFrom = ' FROM articles AS INNER JOIN user AS u';
        $reqOn = ' ON auteurpost = u.id';
        $reqWhere = ' WHERE id_article = :postId ';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqWhere);
        $req->bindParam(':postId', $_SESSION['postId'], \PDO::PARAM_INT);
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

        $reqSelect = 'SELECT a.auteurpost, a.titrepost, a.datepost, a.textepost,  
		a.userId, a.id AS id_article, 
		u.pseudo AS pseudo, u.email AS email';
        $reqFrom = ' FROM articles AS a INNER JOIN user AS u';
        $reqOn = ' ON a.userId = u.id';
        $reqWhere = ' ORDER BY datepost DESC';
        $req = $db->prepare($reqSelect . $reqFrom . $reqOn . $reqWhere);
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
        $req->bindParam(':titrepost', $_SESSION['titrepost'], \PDO::PARAM_STR);
        $req->bindParam(':introduction', $_SESSION['introduction'], \PDO::PARAM_STR);
        $req->bindParam(':textepost', $_SESSION['textepost'], \PDO::PARAM_STR);
  

        $req->execute();
    }

    /**
     * Function DELETE artiles
     */
    public function deletePost()
    {
        $db = $this->getDb();

        $reqUpdate = 'DELETE FROM articles';
        $reqWhere = ' WHERE id=:id';
        $req = $db->prepare($reqUpdate . $reqWhere);
        $req->bindParam(':id', $_SESSION['id_article'], \PDO::PARAM_INT);

        $req->execute();
    }

    /**
     * function UPDATE one post
     */
    public function updatePost()
    {
        $db = $this->getDb();

        $reqUpdate = 'UPDATE article';
        $reqSet = ' SET titrepost=:title, textepost=:content, datepost=now()';
        $reqWhere = ' WHERE id=:id';
        $req = $db->prepare($reqUpdate . $reqSet . $reqWhere);
        $req->bindParam(':id', $_SESSION['id_article'], \PDO::PARAM_INT);
        $req->bindParam(':title', $_SESSION['titrepost'], \PDO::PARAM_STR);
        $req->bindParam(':content', $_SESSION['textepost'], \PDO::PARAM_STR);

        $req->execute();
    }
}

