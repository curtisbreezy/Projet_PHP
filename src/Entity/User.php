<?php

namespace App\Entity;

/**
 * Class User
 */
class User
{
    /**
     * @var int primary key auto incremented
     */
    private $id_utilisateur;
	
	/**
     * @var string user's email
     */
    private $email;

    /**
     * @var string pseudo
     */
    private $pseudo;

    /**
     * @var string user's password
     */
    private $mdp;


    /**
     * @param string $data use function hydrate
     */
    public function __construct($data)
    {
        if (isset($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * @param string $data hydrate attributs with data
     */
    public function hydrate($data)
    {
    
        /**
         * if $data is an array. The value of each column is retrieved
         */
        if (is_array($data)) {
            if (isset($data['id'])) {
                $this->setId($data['id']);
            }
            
		if (isset($data['email'])) {
                $this->setemail($data['email']);
            }			
			 
            if (isset($data['pseudo'])) {
                $this->setpseudo($data['pseudo']);
            }
            
            if (isset($data['mdp'])) {
                $this->setPass($data['mdp']);
            }    
        }
    }

    /**
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
    * @return string pseudo
    */
    public function getpseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setpseudo($pseudo)
    {
        $this->pseudo = htmlspecialchars($pseudo);
    }

    /**
     * @return string password
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param string $password
     */
    public function setPass($mdp)
    {
        $this->pass = htmlspecialchars($mdp);
    }


    /**
    * @return string email
    */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = htmlspecialchars($email);
    }
    
}
