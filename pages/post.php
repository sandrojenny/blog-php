<?php
include("../init.php");
?>

<?php
$postsRepository = new App\Post\PostsRepository($pdo);
$id = $_GET['id'];
$post = $postsRepository->fetchPost($id);
?>

<h1><?php echo $post["title"]; ?></h1>
<p><?php echo nl2br($post['content']); ?></p>
