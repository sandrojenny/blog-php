<?php

  /**
   *  Class Container
   */

  namespace App\Core;

  use PDO;
  use App\Post\PostsRepository;

  class Container
  {
    private $pdo;
    private $postsRepository;

    public function getPdo()
    {

      if (!empty($this->pdo)) {
        return $this->pdo;
      } else {
        $this->pdo = new PDO(
          'mysql:host=localhost;dbname=udemyblog_;charset=utf8',
          'root',
          ''
        );

        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $this->pdo;
      }
    }

    public function getPostsRepository(){

        if (!empty($this->postsRepository)) {
          return $this->postsRepository;
        } else {

          $this->postsRepository = new PostsRepository($this->getPdo());
          return $this->postsRepository;
        }
    }
  }


?>
