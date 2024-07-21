<?php

require_once('blog.php');
$file = new Blog();
$files = $file->getAllFile();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>blogform</title>
  <link rel="stylesheet" href="../css/form.css">

  </head>


<body>
    <div class="container">

      <div class="blog_form">
        <h2>ブログフォーム</h2>
        <form  action="blog/create.php" method="POST">
          
          <p>アイキャッチURL</p>
          <input class="img_url" type="text" name="eyecatch_path" value="" id="textField"/>
          <p>ブログタイトル：</p>
          <input class="blog_title" type="text" name='title'>
          <p>ブログ本文：</p>
          <textarea name="content" id="content" cols="30" rows="10"></textarea>
          <br>
          
          <p>カテゴリ</p>
          <select name="category">
            <option value="1">日常</option>
            <option value="2">音楽</option>
            <option value="3">その他</option>
          </select>
          <br>
          <input type="radio" name='publish_status' value="1" checked>公開
          <input type="radio" name='publish_status' value="2">非公開
          <br>
          
          <input type="submit" value='送信' class="btn">
          <input type="reset"  value="クリア">  
        </form>
      </div>
        
        <div class="img_form">
          <h2>画像アップフォーム</h2>
        <form enctype="multipart/form-data" action="file/upload.php" method="POST">
          <div class="file-up">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <input name="img" type="file" accept="image/*" />
          </div>
          <div>
            <textarea
              name="caption"
              placeholder="キャプション（140文字以下）"
              id="caption"
            ></textarea>
          </div>
          <div class="submit">
            <input type="submit" value="送信" class="btn" />
          </div>
        </form>
  
        <div class="img_list">
          <?php foreach($files as $file):?>
            <img src="<?php echo ltrim($file['file_path'], '../'); ?>" alt=""><a href="file/delete.php?id=<?php echo $file['id']?>" onclick="return confirm('削除してもよろしいですか？')">削除</a>
            <h3>ブログ埋め込みパス</h3>
            <P>&ltimg style="max-width:70%;" src="routeblog/<?php echo ltrim($file['file_path'], '../'); ?>" alt=""&gt</P>
            <h3>ファイルパス</h3>
            <P><?php echo ltrim($file['file_path'], '../'); ?></P>
            <h3>キャプション</h3>
            <p class="caption"><?php echo "{$file['description']}" ?></p>
            <?php endforeach; ?>
        </div>
      </div>
    </div>

  <p><a href="index.php">戻る</a></p>
 
</body>
</html>