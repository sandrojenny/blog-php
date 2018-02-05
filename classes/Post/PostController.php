<?php

  /**
   *  Class PostController
   */

  namespace App\Post;

  use App\Core\AbstractController;

  class PostController extends AbstractController
  {

    public function __construct(PostsRepository $postsRepository){
      $this->postsRepository = $postsRepository;
    }

    public function index()
    {
      $posts = $this->postsRepository->all();

      $this->render("post/index", [
        'posts' => $posts
      ]);
    }

    public function post()
    {
      $id = $_GET['id'];
      $post = $this->postsRepository->find($id);

      $this->render("post/post", [
        'post' => $post
      ]);
    }
  }

?>
