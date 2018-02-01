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

    public function index()
    {
      $res = $this->postsRepository->fetchPosts();
      echo "PostController ausgeführt";

    }
  }



?>
