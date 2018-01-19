<?php

require_once("../database.php");
$res = fetch_posts()
?>

<h1>Blog</h1>

<ul>
<?php foreach ($res as $row): ?>
  <li>
    <a href="post.php?id=<?php echo $row["id"]; ?>">
      <?php echo $row["title"]; ?>
    </a>
  </li>
<?php endforeach; ?>
</ul>
