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
      $stmt = $this->pdo->query("SELECT * FROM `posts`");

      // Model (Return Value as a Class Object)
      $posts = $stmt->fetchAll(PDO::FETCH_CLASS, "App\\Post\\PostModel");

      return $posts;
    }

    public function fetchPost($id){
      $stmt = $this->pdo->prepare("SELECT * FROM `posts` WHERE id = :id");
      $stmt->execute(['id' => $id]);

      // Model (Return Value as a Class Object)
      $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModel");
      $post = $stmt->fetch();

      return $post;
    }
  }


?>
