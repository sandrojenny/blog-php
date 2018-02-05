<?php

  /**
   *  Class AbstractRepository
   */

  namespace App\Core;
  use PDO;

  class AbstractRepository

  {
    private $pdo;

    public function __construct(PDO $pdo){
      $this->pdo = $pdo;
    }

    public function all(){
      $table = $this->getTableName();
      $stmt = $this->pdo->query("SELECT * FROM `$table`");

      // Model (Return Value as a Class Object)
      $model = $this->getModelName();
      $posts = $stmt->fetchAll(PDO::FETCH_CLASS, $model);

      return $posts;
    }

    public function find($id){
      $table = $this->getTableName();
      $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE id = :id");
      $stmt->execute(['id' => $id]);

      // Model (Return Value as a Class Object)
      $model = $this->getModelName();
      $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
      $post = $stmt->fetch();

      return $post;
    }
  }


?>
