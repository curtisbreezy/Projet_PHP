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
// Liste de tous les posts
if ($p === 'listPosts') {
    $PostController = new PostController();
    $PostController->listPosts();
}

// Post unique
if ($p === 'article') {
	if(isset($_SESSION['id'])) {
    $_SESSION['id'] = $_GET['id'];
    $contArticle = new PostController();
    $contArticle->post();
}
}
// Ajout de post
if ($p === 'postNew') {
    require 'src/view/postAddView.php';
}
// Ajout en bdd
if ($p === 'postAdd') {
	if(isset($_SESSION['auteurpost']) && isset($_SESSION['titrepost']) && isset($_SESSION['textepost'])) {
	$_SESSION['auteurpost']= htmlentities($_POST['auteurpost'], ENT_SUBSTITUTE);
	$_SESSION['titrepost']= htmlentities($_POST['titrepost'], ENT_SUBSTITUTE);
    $_SESSION['textepost']= htmlentities($_POST['textepost'], ENT_SUBSTITUTE);
    $newPost = new PostController;
    $newPost->newPost();
	$newPost->listPosts();
	
	}
}
// Édition du post
if ($p === 'edit_post') {
	if(isset($_SESSION['id'])) {
    $_SESSION['id']= intval($_GET['id']);
    $PostController = new PostController();
    $PostController->postEdit();
}
}
// Mise à jour du post
//$_SESSION['titrepost']= htmlentities($_GET['titrepost'], ENT_SUBSTITUTE);
 //   $_SESSION['textepost']= htmlentities($_GET['textepost'], ENT_SUBSTITUTE);
if ($p === 'postUpdate') {
	if(isset($_SESSION['auteurpost']) && isset($_SESSION['titrepost']) && isset($_SESSION['textepost'])) {
	$_SESSION['auteurpost']= htmlentities($_POST['auteurpost'], ENT_SUBSTITUTE);
	$_SESSION['titrepost']= htmlentities($_POST['titrepost'], ENT_SUBSTITUTE);
    $_SESSION['textepost']= htmlentities($_POST['textepost'], ENT_SUBSTITUTE);
    $PostController = new PostController();
    $PostController->postUpdate();
    $admincontroller = new AdminController() ;
    $admincontroller->displayUsers();
}
}

// delete post éliminer les commentaires liés
if ($p === 'delete_post') {
	if(isset($_SESSION['id'])) {
    $_SESSION['id']= intval($_GET['id']);
    $PostController = new PostController();
    $PostController->postDelete();
	$admincontroller = new AdminController() ;
    $admincontroller->displayUsers();
}
}

if ($p === 'validate') {
	if(isset($_SESSION['id'])) {
	$_SESSION['id']= intval($_GET['id']);
	$PostController = new PostController();
	$PostController->validation();
	$admincontroller = new AdminController() ;
	$admincontroller->displayUsers ();

}
}

if ($p === 'signaler') {
	if(isset($_SESSION['id'])) {
		
	$_SESSION['id']= intval($_GET['id']);
	$PostController = new PostController();
	$PostController->signaler();
	$admincontroller = new AdminController() ;
	$admincontroller->displayUsers ();
	
}
}



// Identification //
if ($p === 'Login') {
  
    $_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
    $_SESSION['mdp'] = htmlspecialchars($_POST['mdp']);
    $verifPseudo= new ConnectController();
    $verifPseudo->Login();
    
}

//--------------------------------//

//Registration
if ($p === 'formAddUser') {
    //Data reception
    //$_SESSION['pseudo']= htmlspecialchars($_POST['pseudo']);
    //$_SESSION['mdp'] = htmlspecialchars($_POST['mdp']);
    //$_SESSION['email']= htmlspecialchars($_POST['email']);
   // $_SESSION['mdp2'] = htmlspecialchars($_POST['mdp2']);


    //si les mots de passes sont identiques
    if ($_SESSION['mdp'] === $_SESSION['mdp']) {
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
        $_SESSION['connect'] === 0;
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
	if(isset($_SESSION['id'])) {
    $_SESSION['id']= intval($_GET['id']);
    $adminController = new AdminController();
    $adminController->validPost();
    $adminController->displayUsers();
}
}
// valid comment
if ($p === 'valid_comment') {
	if(isset($_SESSION['id']) && isset($_SESSION['validate'])) {
    $_SESSION['id_commentaire']= intval($_GET['id']);
    $_SESSION['validate']= intval($_GET['validate']);
    $adminController = new AdminController();
    $adminController->validComment();
    $adminController->displayUsers();
	}
}

// valid user
if ($p === 'valid_user') {
	if(isset($_SESSION['id']) && isset($_SESSION['validate'])) {
    $_SESSION['id_utilisateur']= intval($_GET['id']);
    $adminController = new AdminController();
    $adminController->validUser();
    $adminController->displayUsers();
}
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
 