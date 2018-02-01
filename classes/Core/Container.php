<?php

  /**
   *  Class Container
   */

  namespace App\Core;

  use PDO;
  use App\Post\PostController;
  use App\Post\PostsRepository;

  class Container
  {
    private $receipts = [];
    private $instances = [];

    public function __construct(){
      $this->receipts = [
        'postController' => function(){
          return new PostController(
            $this->make('postsRepository')
          );
        },
        'postsRepository' => function(){
          return new PostsRepository(
            $this->make("pdo")
          );
        },
        'pdo' => function(){
          $pdo = new PDO(
            'mysql:host=localhost;dbname=udemyblog_;charset=utf8',
            'root',
            ''
          );
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          return $pdo;
        }
      ];
    }

    public function make($name)
    {
      if (!empty($this->instances[$name]))
      {
        return $this->instances[$name];
      }

      if (isset($this->receipts[$name])) {
        $this->instances[$name] = $this->receipts[$name]();
      }

      return $this->instances[$name];
    }
  }


?>
