<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use App\Repository\Commentrepository;
use App\Entity\User;

/**
 * Class PostController
 */
class PostController 
{
    /**
     * Get the last 10 posts
     * @var $posts
     */
    public function listPosts()
    {
        $PostsRepository = new PostsRepository();
        $posts = $PostsRepository->getAllPosts();
        require 'src/View/postListView.php';
    }
    
    /**
     * Get one article with comments
     * @var $article and contents
     */
    public function post()
    {
        $postsRepository = new PostsRepository();
        if (!empty($_SESSION['id'])) {
        $posts = $postsRepository->getOneById($_SESSION['id']);   
        }

        require 'src/View/postView.php';
    }
	
	/**
	 * Modérer les articles
	 * @var $articles
	 */
	public function moderate()
    {
        $PostsRepository = new PostsRepository();
        $posts = $PostsRepository->getByLimit() ;  
        
        require 'src/View/ModerationView.php';
    }
	
	public function validate()
    {	
		
        $PostsRepository = new PostsRepository();
        $posts = $PostsRepository->updateValidPost() ;  
        
        require 'src/View/ModerationView.php';
    }

    /**
     * Get author of a post
     * @var $author
     */
    public function author()
    {
        $userId = $_post['userId'];
        $userRepository = new UserRepository();
        if (!empty($userId)) {
            $author = $userRepository->getAuthor();
        }
    }

    /**
     * new post
     */
    public function newPost()
    {
        $addPost = new PostsRepository();
        $addPost->addPost();
	
    }
	

    /**
     * edit post
     */
    public function postEdit()
    {
        $postRepo = new PostsRepository();
        $post = $postRepo->getOneById();
        require 'src/View/EditPostView.php';
    }

    /**
     * delete post
     */
    public function postDelete()
    {
        $postDelete = new PostsRepository();
        $postDelete->deletePost();
		
		
    }

    /**
     * update post
     */
    public function postUpdate()
    {
        $postUpdate = new PostsRepository();
        $postUpdate->updatePost();
		
		
    }
}
