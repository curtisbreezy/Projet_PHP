<?php
session_start();

require_once '/vendor/autoload.php';

use App\Controller\PostController;
use App\Controller\FormController;
use App\Controller\ConnectController;
use App\Controller\CommentController;
use App\Controller\AdminController;
use App\Model\Connect;




if (!isset($_SESSION['connect'])) {
    $_SESSION['connect']=0;
}

if (!isset($_SESSION['pseudo'])) {
    $_SESSION['pseudo']=Invité;
}

if (!isset($_SESSION['userId'])) {
    $_SESSION['userId']=0;
}

// Default opening : homeView.php
if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 'home';
}

// Routes
// Home
if ($p === 'home') {
    require 'src/View/homeView.php';
}

//_______________POSTS__________________
// List of posts
if ($p === 'listPosts') {
    $PostController = new PostController();
    $PostController->listPosts();
}

// One post
if ($p === 'article') {
    $_SESSION['id'] = $_GET['id'];
    $contArticle = new PostController();
    $contArticle->post();
}

// Display postAddView
if ($p === 'postNew') {
    require 'src/view/postAddView.php';
}

// Add Post $_SESSION['auteurpost'] = htmlspecialchars($_POST['auteurpost'], ENT_IGNORE);
 //   $_SESSION['titrepost'] = htmlspecialchars($_POST['titrepost'], ENT_IGNORE);
  //  $_SESSION['datepost'] = htmlspecialchars($_POST['datepost'], ENT_IGNORE);
   // $_SESSION['textepost'] = htmlspecialchars($_POST['textepost'], ENT_IGNORE);

if ($p === 'postAdd') {
	$_SESSION['auteurpost']= htmlentities($_POST['auteurpost'], ENT_SUBSTITUTE);
	$_SESSION['titrepost']= htmlentities($_POST['titrepost'], ENT_SUBSTITUTE);
    $_SESSION['textepost']= htmlentities($_POST['textepost'], ENT_SUBSTITUTE);
    $newPost = new PostController;
    $newPost->newPost();
	$newPost->listPosts();
	
}
// edit post
if ($p === 'edit_post') {
    $_SESSION['id']= intval($_GET['id']);
    $PostController = new PostController();
    $PostController->postEdit();
}

//update post
if ($p === 'postUpdate') {
    $_SESSION['titrepost']= htmlentities($_POST['titrepost'], ENT_SUBSTITUTE);
    $_SESSION['textepost']= htmlentities($_POST['textepost'], ENT_SUBSTITUTE);
    $PostController = new PostController();
    $PostController->postUpdate();
    $PostController->post();
}

// delete post éliminer les commentaires liés
if ($p === 'delete_post') {
    $_SESSION['id_article']= intval($_GET['id']);
    $PostController = new PostController();
    $PostController->postDelete();
	$adminController = new AdminController();
    $adminController->displayUsers();
}

//________________CONTACT_________________
//contact
if ($p === 'contact') {
    require '../src/View/contactView.php';
}

//________________FORMS___________________
//send message
if ($p === 'formHome') {
    $formController = new FormController();
    $formController->sendMessage();
    require '../src/View/homeView.php';
}

// Identification //
if ($p === 'Login') {
  
    $_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
    $_SESSION['mdp'] = htmlspecialchars($_POST['mdp']);
  

    if (!$_SESSION['pseudo']) {
        ?> <script> alert("Merci de renseigner votre pseudonyme")</script>
    <?php
    }
  
    if (!$_SESSION['mdp']) {
        ?> <script> alert("Merci de renseigner votre mot de passe")</script>
    <?php
    }

   
    $verifPseudo= new ConnectController();
    $verifPseudo->Login();
    require 'src/View/LoginView.php';
}

//--------------------------------//

//Registration
if ($p === 'formAddUser') {
    //Data reception
    $_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
    $_SESSION['mdp'] = htmlspecialchars($_POST['mdp']);
    $_SESSION['email']= htmlspecialchars($_POST['email']);
    $_SESSION['mdp2'] = htmlspecialchars($_POST['mdp2']);

    //Vérifier qu'aucun champs est vide
    if (!$_SESSION['pseudo']) {
        ?> <script> alert("Merci de renseigner votre pseudonyme")</script>
  <?php
    }

    if (!$_SESSION['mdp']) {
        ?> <script> alert("Merci de renseigner votre mot de passe")</script>
  <?php
    }

    if (!$_SESSION['email']) {
        ?> <script> alert("Merci de renseigner votre e-mail")</script>
  <?php
    }

    if (!$_SESSION['mdp2']) {
        ?> <script> alert("Merci de confirmer votre mot de passe")</script>
  <?php
    }

    //si les mots de passes sont identiques
    if ($_SESSION['pass'] === $_SESSION['confPass']) {
        //data processing
        $pass_hache= new ConnectController();
        $_SESSION['pass']=$pass_hache->hach();

        // Verification of the free pseudo. If ok add new user
        $existPseudo= new ConnectController();
        $existPseudo->existPseudo();

        require 'src/View/Registration.php';
    } else {
        echo 'Les deux mots de passes sont différents';
    }
}

//________________LOG AND STATUS___________________
// Identification
if ($p === 'login') {
    if ($_SESSION['connect'] === 1) {
        session_destroy();
        $_SESSION['connect'] = 0;
        require 'src/View/homeView.php'; ?> <script>alert('Vous êtes déconnecté')</script> <?php
    } else {
        require 'src/View/LoginView.php';
    }
}

//_______________ADMIN__________________
// display admin gestion
if ($p === 'admin') {
    $adminController = new AdminController();
    $adminController->displayUsers();
}

// valid article
if ($p === 'valid_post') {
    $_SESSION['id_article']= intval($_GET['id']);
    $adminController = new AdminController();
    $adminController->validPost();
    $adminController->displayUsers();
}

// valid comment
if ($p === 'valid_comment') {
    $_SESSION['id_commentaire']= intval($_GET['id']);
    $_SESSION['validate']= intval($_GET['validate']);
    $adminController = new AdminController();
    $adminController->validComment();
    $adminController->displayUsers();
}

// valid user
if ($p === 'valid_user') {
    $_SESSION['id_utilisateur']= intval($_GET['id']);
    $adminController = new AdminController();
    $adminController->validUser();
    $adminController->displayUsers();
}


//________________COMMENTS________________
// Adding a comment
if ($p === 'commentAdd') {
    $_SESSION['contmessage']=$_POST['contmessage'];
    $commentController = new CommentController();
    $commentController->commentAdd();

    $contArticle = new PostController();
    $contArticle->post();
}

// reply comment
if ($p === 'reply_comment') {
    $_SESSION['parentId']= intval($_GET['id']);
    require '../src/View/replyCommentView.php';
}

// edit comment
if ($p === 'edit_comment') {
    $_SESSION['commentId']= intval($_GET['id']);
    $_SESSION['contmessage']= ($_POST['contmessage']);
    $commentController = new CommentController();
    $commentController->commentEdit();

    //commment écrire directement sur la page ? AJAX
}

//update comment
if ($p === 'commentEdit') {
    $_SESSION['contmessage']= htmlspecialchars($_POST['contmessage'], ENT_IGNORE);
    $commentController = new CommentController();
    $commentController->commentUpdate();

    $contArticle = new PostController();
    $contArticle->post();
}

// delete comment
if ($p === 'delete_comment') {
    $_SESSION['commentId']= intval($_GET['id']);
    $commentController = new CommentController();
    $commentController->commentDelete();

    $contArticle = new PostController();
    $contArticle->post();
}

//________________Replies________________

//display replies
//non utilisé pour l'instant essais en cours
if ($p==='replies') {
    $replyComment = new CommentRepository();
    $replies = $replyComment->getReplies();
    return $replies;
}


// penser un envoyer un message pour vérifier que l'email est valide

//super comment
 