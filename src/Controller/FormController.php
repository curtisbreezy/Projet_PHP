<?php

namespace App\Controller;

use App\Model\Connect;

/**
 * Class FormController
 */
class FormController  extends Connect
{
    /**
     * send message to administrator
     * @var $posts
     */

    public function sendMessage()
    {
        $to = 'lieninformatique9@gmail.com';
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $sujet = $name.' depuis le site viva Informatique';

        if ( preg_match( "/[\r\n]/", $name) || preg_match( "/[\r\n]/", $email ) ) {
            header("location : http://www.myriamstampers.com/mail-error.php");
        }
        else{
           mail($to, $sujet, $message, $headers); 
        }
    }
}


