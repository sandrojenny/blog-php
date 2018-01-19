<?php

require_once("../database.php");
$id = $_GET['id'];
$post = fetch_post($id);
?>

<h1><?php echo $post["title"]; ?></h1>
<p><?php echo nl2br($post['content']); ?></p>
