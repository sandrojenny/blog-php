<?php
include("../init.php");

  $postController = $container->make("postController");
  $postController->index();

?>

<?php
$postsRepository = $container->make('postsRepository');
$res = $postsRepository->fetchPosts();
?>

<h1>Blog</h1>

<ul>
<?php foreach ($res as $row): ?>
  <li>
    <a href="post.php?id=<?php echo $row['id']; ?>">
      <?php echo $row['title']; ?>
    </a>
  </li>
<?php endforeach; ?>
</ul>
