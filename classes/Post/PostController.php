<?php

  /**
   *  Class PostController
   */

  namespace App\Post;

  use App\Core\AbstractController;

  class PostController extends AbstractController
  {

    public function __construct(
      PostsRepository $postsRepository,
      CommentsRepository $commentsRepository
    ){
      $this->postsRepository = $postsRepository;
      $this->commentsRepository = $commentsRepository;
    }

    public function index()
    {
      $posts = $this->postsRepository->all();

      $this->render("post/index", [
        'posts' => $posts
      ]);
    }

    public function show()
    {
      // Get the PostId
      $postId = $_GET['id'];

      // Insert Comment
      if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $this->commentsRepository->insertForPost($postId, $content);
      }

      // Show Content (Posts & Comments)
      $post = $this->postsRepository->find($postId);
      $comments = $this->commentsRepository->allByPost($postId);

      $this->render("post/show", [
        'post' => $post,
        'comments' => $comments
      ]);
    }
  }

?>
