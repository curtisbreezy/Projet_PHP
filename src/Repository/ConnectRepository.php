<?php

namespace App\Repository;

use App\Model\Connect;

/**
 * Class ConnectRepository extend connect
 */
class ConnectRepository extends Connect
{
    /**
     * function New user INSERT
     */
    public function newUser()
    {
        $db = $this->getDb();

        $pseudo  =$_SESSION['pseudo'];
        $mdp = $_SESSION['mdp'];
        $email = $_SESSION['email'];

        $reqInsert = 'INSERT INTO user(email, pseudo,mdp)' ;
        $reqValues = 'VALUES(:email,:pseudo,:mdp)';
        $req = $db->prepare($reqInsert . $reqValues);
        $req->execute(array(
        'pseudo' => $pseudo,
        'mdp' => $mdp,
        'email' => $email));
    }
    /**
     * function SELECT user
     */
    public function existPseudo()
    {
        $db = $this->getDb();

        $req = $db->prepare('SELECT COUNT(pseudo) FROM user WHERE pseudo = :pseudo');
        $req->execute(array(
    'pseudo' => $_SESSION['pseudo']));
        $isAvailable = $req->fetch();

        return $isAvailable;
    }

    /**
     * function SELECT user
     */
    public function getUser()
    {
        $db = $this->getDb();

        $req = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
        $req->execute(array(
    'pseudo' => $_SESSION['pseudo']));
        $user = $req->fetch();

        return $user;
    }
}