<?php

require_once('dbc.php');

Class Blog extends Dbc
{
    protected $table_name = 'blog';
    //カテゴリー名を表示
    //引数：数字
    //返り値：文字列
    function setCategoryName($category) {
      if ($category === '1') {
          return '日常';
      }elseif ($category === '2') {
          return '音楽';
      }else {
          return 'その他';
      }
    }

      public function blogCreate($blogs) {
        $sql = "INSERT INTO
                $this->table_name(title, content, category, publish_status, eyecatch_path)
                VALUES
                (:title, :content, :category, :publish_status, :eyecatch_path)";

        $dbh = $this->dbConnect();

        $dbh->beginTransaction();
        try {
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
        $stmt->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
        $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
        $stmt->bindValue(':publish_status',$blogs['publish_status'],PDO::PARAM_INT);
        $stmt->bindValue(':eyecatch_path',$blogs['eyecatch_path'],PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
        echo 'ブログを投稿しました';
        }catch(PDOException $e){
        $dbh->rollBack();
        exit($e);
        }     
      }

      public function scoreCreate($scores){
        $sql = "INSERT INTO type_score(name, score) VALUES (:name, :score)";
        $dbh = $this->dbConnect();
        try {
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(':name',$scores['name'],PDO::PARAM_STR);
          $stmt->bindValue(':score',$scores['score'],PDO::PARAM_STR);
          $stmt->execute();
          echo 'ランキングに登録しました。';
        } catch(PDOException $e){
          exit($e);
        }
      }

      public function commentCreate($comments){
        $sql = "INSERT INTO comment(post_no, post_name, cmt_content) VALUES (:post_no, :post_name, :cmt_content)";
        $dbh = $this->dbConnect();
        try {
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(':post_no',$comments['post_no'],PDO::PARAM_INT);
          $stmt->bindValue(':post_name',$comments['post_name'],PDO::PARAM_STR);
          $stmt->bindValue(':cmt_content',$comments['cmt_content'],PDO::PARAM_STR);
          $stmt->execute();
          echo 'コメントを投稿しました。';
        } catch(PDOException $e){
          exit($e);
        }
      }

      

      public function blogUpdate($blogs) {
        $sql = "UPDATE $this->table_name SET
                      title = :title, content = :content, category = :category, publish_status = :publish_status, eyecatch_path = :eyecatch_path
                WHERE
                    id = :id";

        $dbh = $this->dbConnect();

        $dbh->beginTransaction();
        try {
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
        $stmt->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
        $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
        $stmt->bindValue(':publish_status',$blogs['publish_status'],PDO::PARAM_INT);
        $stmt->bindValue(':eyecatch_path',$blogs['eyecatch_path'],PDO::PARAM_STR);
        $stmt->bindValue(':id',$blogs['id'],PDO::PARAM_INT);
        $stmt->execute();
        $dbh->commit();
        echo 'ブログを更新しました';
        }catch(PDOException $e){
        $dbh->rollBack();
        exit($e);
        }     
      }
      function fileSave($filename, $save_path, $caption) {
        $result = False;
        
        $sql = "INSERT INTO file_table (file_name, file_path, description)
                VALUE (?, ?, ?)";
        $dbh = $this->dbConnect();
        try {
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(1, $filename);
          $stmt->bindValue(2, $save_path);
          $stmt->bindValue(3, $caption);
          $result = $stmt->execute();
          return $result;
        } catch(\Exception $e) {
          echo $e->getMessage();
          return $result; 
        }
      
      }


      //ブログのバリデーション
      public function blogValidate($blogs){
        if (empty($blogs['title'])) {
          exit('タイトルを入力してください');
        }
    
        if (mb_strlen($blogs['title']) > 191) {
            exit('タイトルは191文字以下にしてください');
        }
    
        if (empty($blogs['content'])) {
          exit('本文を入力してください');
        }
    
        if (empty($blogs['category'])) {
          exit('カテゴリーを選択してください');
        }
    
        if (empty($blogs['publish_status'])) {
          exit('公開設定を選択してください');
        }

       
    }

    public function commentValidate($comments){
        if (empty($comments['post_no'])) {
          exit('Noを入力してください');
        }
        if (empty($comments['post_name'])) {
          exit('名前を入力してください');
        }
        if (empty($comments['cmt_content'])) {
          exit('コメントを入力してください');
        }
      }

    public function rankValidate($scores){
        if (empty($scores['name'])) {
          exit('名前を入力してください');
        }
        if (empty($scores['score'])) {
          exit('スコアがありません。');
        }
      }

    


}


