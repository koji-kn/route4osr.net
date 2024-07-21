<?php

require_once('../blog.php');


$file = new Blog();
$result = $file->fileDelete($_GET['id']);

?>

<p><a href="../form.php">戻る</a></p>