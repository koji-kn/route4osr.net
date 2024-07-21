<?php

require_once('../blog.php');
$fileUp = new Blog();


$file = $_FILES['img'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = "../blogimg/";
$save_filename = date('YmdHis') . $filename;
$save_path = $upload_dir . $save_filename;

$caption = filter_input(INPUT_POST,'caption',FILTER_SANITIZE_SPECIAL_CHARS);
// var_dump($file);

if(empty($caption)) {
  echo 'キャプションを入力してください';
  echo '<br>';
}
if(strlen($caption) > 140) {
  echo '１４０文字以内で入力してください';
  echo '<br>';
}
if($filesize > 1048576 || $file_err == 2) {
  echo 'ファイルサイズは1MB以下にしてください';
  echo '<br>';
}

$allow_ext = ['jpg', 'jpeg', 'png'];
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($file_ext), $allow_ext)) {
  echo '画像ファイルを添付してください';
  echo '<br>';
}

if(is_uploaded_file($tmp_path)) {
  if(move_uploaded_file($tmp_path, $save_path)) {
    echo $filename . 'をアップしました';

    $result = $fileUp->fileSave($filename, $save_path, $caption);

    if($result) {
      echo 'データベースに保存しました';
    }else{
      echo '失敗しました';
    }
  }else{
    echo 'ファイルが保存できませんでした';
  }
}else{
  echo 'ファイルが選択されていません';
}

?>

<a href="../form.php">戻る</a>