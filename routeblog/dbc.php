<?php

require_once('env/env.php');

Class Dbc
{
    protected $table_name;

    //関数一つに一つの機能のみを持たせる
    // 1.データベース構築
    // 2.データを取得する
    // 3.カテゴリー名を表示


    // 1.データベース接続
    //引数：なし
    //返り値：接続結果を返す
    protected function dbConnect(){
        $host = DB_HOST;
        $dbname = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;
        $dsn = "mysql:host=$host;port=8889;dbname=$dbname;charset=utf8";
        
        try{
            $dbh = new PDO($dsn, $user, $pass,[
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
          }catch(PDOException $e){
            echo '接続失敗'. $e->getMessage();
            exit();
          };

          return $dbh;
        }

      // 2.データを取得する
      //引数：なし
      //返り値：取得したデータ
      public function getAll(){
        $dbh = $this->dbConnect();

        if (isset($_GET['page'])) {
          $page = (int)$_GET['page'];
        }else {
          $page = 1;
        }
        
        if ($page > 1) {
          $start = ($page * 10) - 10;
        }else {
          $start = 0;
        }
    
        //sqlの準備
        $sql = "SELECT * FROM $this->table_name ORDER BY id DESC LIMIT {$start}, 10";
        //sqlの実行
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        //sqlの結果を受け取る
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
      }

      public function getNum(){
        $dbh = $this->dbConnect();
        $sql = "SELECT COUNT(*) id FROM $this->table_name";
        $page_num = $dbh->prepare($sql);
        $page_num->execute();
        $page_num = $page_num->fetchColumn();
        return $page_num;
        $dbh = null;
      }

           

    // 引数：$id
    // 返り値：$result
    public function getbyId($id) {
      if(empty($id)) {
        exit('idが不正です');
      }
      
          $dbh = $this->dbConnect();
      
          //sqlの準備
          $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
          $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
          //sqlの実行
          $stmt->execute();
          //結果を取得
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
          if(!$result) {
            exit('ブログがありません');
          }
      
        return $result;

    }

    public function getByPrev($prev_no) {
         
          $dbh = $this->dbConnect();
      
          $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :prev_no");
          $stmt->bindValue(':prev_no', (int)$prev_no, PDO::PARAM_INT);
          $stmt->execute();
          $result_prev = $stmt->fetch(PDO::FETCH_ASSOC);
      
          return $result_prev;
    }

    public function getByNext($next_no) {
         
          $dbh = $this->dbConnect();
      
          $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :next_no");
          $stmt->bindValue(':next_no', (int)$next_no, PDO::PARAM_INT);
          $stmt->execute();
          $result_next = $stmt->fetch(PDO::FETCH_ASSOC);
      
          return $result_next;
    }

    public function getMaxId() {
      $dbh = $this->dbConnect();
          $stmt = $dbh->prepare("SELECT MAX(id) FROM $this->table_name");
          $stmt->execute();
          $max_id = $stmt->fetchcolumn();;

          return $max_id;
    }

  

    public function getComment($id) {
      $dbh = $this->dbConnect();
          $stmt = $dbh->prepare("SELECT * FROM comment Where post_no= :id");
          $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
          $stmt->execute();
          $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

          return $comments;
    }

    
    public function delete($id) {
      if(empty($id)) {
        exit('idが不正です');
      }
      
          $dbh = $this->dbConnect();
      
          //sqlの準備
          $stmt = $dbh->prepare("DELETE FROM $this->table_name Where id = :id");
          $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
          //sqlの実行
          $stmt->execute();
          echo 'ブログを削除しました';
      
      }

    public function fileDelete($id) {
      if(empty($id)) {
        exit('idが不正です');
      }
      
          $dbh = $this->dbConnect();
      
          //sqlの準備
          $stmt = $dbh->prepare("DELETE FROM file_table Where id = :id");
          $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
          //sqlの実行
          $stmt->execute();
          echo '画像を削除しました';
      
      }

      function getAllFile() {
        $dbh = $this->dbConnect();
        $sql = "SELECT * FROM file_table ORDER BY id DESC";
        $fileData = $dbh->query($sql);
      
        return $fileData;
      }

      function getScore() {
        $dbh = $this->dbConnect();
        $sql = "SELECT * FROM type_score ORDER BY score LIMIT 1,10";
        $scores = $dbh->query($sql);
      
        return $scores;
      }

      
    
      
}

