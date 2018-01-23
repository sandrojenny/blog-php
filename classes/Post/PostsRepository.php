<?php

  /**
   *  Class PostRepository
   */

  namespace App\Post;

  use PDO;

  class PostsRepository {

    private $pdo;

    public function __construct(PDO $pdo){
      $this->pdo = $pdo;
    }

    public function fetchPosts(){
      return $this->pdo->query("SELECT * FROM `posts`");
    }

    public function fetchPost($id){
      $stmt = $this->pdo->prepare("SELECT * FROM `posts` WHERE id = :id");
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();
    }
  }


?>
