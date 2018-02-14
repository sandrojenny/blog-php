<?php include __DIR__ . "/../layout/header.php"; ?>

<h1><?php echo e($post['title']); ?></h1>
<p><?php echo nl2br(e($post['content'])); ?></p>
<ul>
  <?php foreach ($comments as $comment): ?>
    <li>
      <?php echo e($comment['content']); ?>
    </li>
  <?php endforeach; ?>
</ul>

<form action="post?id=<?php echo $post['id']; ?>" method="post">
  <textarea name="content" rows="8" cols="80"></textarea>
  <br />
  <input type="submit" value="Kommentar hinzufügen">
</form>
<br />

<?php include __DIR__ . "/../layout/footer.php"; ?>
