<?php

namespace App\Model;

use \PDO;

/**
 * class Connect
 * @abstract
 */
abstract class Connect
{
    /**
     * @var int
     * data to connect with database
     */
    private $bdd;

    /**
     * Function to connect
     * @return db
     */
    protected function getDb()
    {
        if ($this->bdd === null) {
            try {
                $bdd = new \PDO('mysql:dbname=projet_5;host=localhost;charset=utf8', 'root', '');

                $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                $this->bdd = $bdd;

                return $this->bdd;
            } catch (PDOException $e) {
                die('Echec lors de la connexion : '.$e->getMessage());
            }
        }

        return $this->bdd;
    }

    /**
     * Function to secure data 
     */
    protected function secure_bdd($data)
    {
        // check if data is an integer
        if (ctype_digit($data)) {
            $data=intval($data);
        }

        // other type
        else {
            $data=mysql_real_escape_string($data);
            $data=addcslashes($data, '%_');
        }
    }
}
