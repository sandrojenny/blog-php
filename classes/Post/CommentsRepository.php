<?php

  /**
   *  Class CommentsRepository
   */

  namespace App\Post;
  use PDO;
  use App\Core\AbstractRepository;

  class CommentsRepository extends AbstractRepository {

    public function getTableName(){
      return "comments";
    }

    public function getModelName(){
      return "App\\Post\\CommentModel";
    }

    public function insertForPost($postId, $content){
      $table = $this->getTableName();
      $stmt = $this->pdo->prepare("INSERT INTO `$table` (`content`, `post_id`) VALUES (:content, :postId)");
      $stmt->execute([
        'content' => $content,
        'postId' => $postId
      ]);
    }

    public function allByPost($postId){
      $table = $this->getTableName();
      $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE post_id = :id");
      $stmt->execute(['id' => $postId]);

      // Model (Return Value as a Class Object)
      $model = $this->getModelName();
      $comments = $stmt->fetchAll(PDO::FETCH_CLASS, $model);

      return $comments;
    }

  }


?>
