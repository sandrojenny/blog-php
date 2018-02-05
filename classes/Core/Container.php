<?php

  /**
   *  Class Container
   */

  namespace App\Core;

  use PDO;
  use PDOException;
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
          try { $pdo = new PDO(
              'mysql:host=localhost;dbname=udemyblog_;charset=utf8',
              'root',
              ''
            );
          } catch(PDOException $e){
            echo "Connection to the database failed";
            die();
          }
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
