<?php include __DIR__ . "/../layout/header.php"; ?>

<h1><?php echo $post['title']; ?></h1>
<p><?php echo nl2br($post['content']); ?></p>

<?php include __DIR__ . "/../layout/footer.php"; ?>
