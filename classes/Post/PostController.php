<?php

  /**
   *  Class PostController
   */

  namespace App\Post;

  class PostController
  {

    public function __construct(PostsRepository $postsRepository){
      $this->postsRepository = $postsRepository;
    }

    protected function render($view, $params){
      // Render the required params
      foreach ($params as $key => $value) {
        ${$key} = $value;
      }
      include __DIR__ . "/../../views/{$view}.php";
    }

    public function index()
    {
      $posts = $this->postsRepository->fetchPosts();

      $this->render("post/index", [
        'posts' => $posts
      ]);
    }

    public function post()
    {
      $id = $_GET['id'];
      $post = $this->postsRepository->fetchPost($id);

      $this->render("post/post", [
        'post' => $post
      ]);
    }
  }

?>
