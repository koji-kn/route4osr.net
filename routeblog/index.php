<?php

require_once('blog.php');

$blog = new Blog();
$blogData = $blog->getAll();
function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
$pageNum = $blog->getNum();
$pagination = ceil($pageNum / 10);
if (isset($_GET['page'])) {
  $pages = (int)$_GET['page'];
}else {
  $pages = 1;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/form.css">
  <title>BROGfrom</title>
</head>

<body>
  <h2>ブログ一覧(<?php echo $pages ?>)</h2>
  <p><a href="form.php">新規作成</a></p>
  <table>
    <tr>
      <th>アイキャッチ</th>
      <th>タイトル</th>
      <th>カテゴリ</th>
      <th>投稿日時</th>
    </tr>

    <?php foreach($blogData as $column): ?>
    <tr>
      <td>
        <div class="prev">
          <img src="<?php echo h($column['eyecatch_path']) ?>" alt="">
        </div>
      </td>
      <td><?php echo h($column['title']) ?></td>
      <td><?php echo h($blog->setCategoryName($column['category'])) ?></td>
      <td><?php echo h($column['post_at']) ?></td>
      <td><a href="../detail.php?id=<?php echo $column['id']?>" target="_blank">詳細</a></td>
      <td><a href="update_form.php?id=<?php echo $column['id']?>">編集</a></td>
      <td><a href="blog/delete.php?id=<?php echo $column['id']?>" onclick="return confirm('削除してもよろしいですか？')">削除</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php for ($x=1; $x <= $pagination ; $x++) { ?>
	      <a class="page_num" href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
        <?php } // End of for ?>
        

  
</body>
</html>