<?php

require_once('../blog.php');

$comments = $_POST;

$cmt = new Blog();
$cmt->commentValidate($comments);
$cmt->commentCreate($comments);

?>
<p><a href="../detail.php?id=<?= $comments['post_no']?>">戻る</a></p>