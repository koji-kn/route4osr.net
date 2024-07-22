<?php

require_once('routeblog/blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);
$result_cmts = $blog->getComment($_GET['id']);
$id = $_GET['id'];
$prev_no = $id - 1;
$result_prev = $blog->getByPrev($prev_no);
while(empty($result_prev)){
   $prev_no--;
   $result_prev = $blog->getByPrev($prev_no);
   if($prev_no <= 0){
     break;
   }
}

$max_id = $blog->getMaxId();

$next_no = $id + 1;
$result_next = $blog->getByNext($next_no);
while(empty($result_next)){
   $next_no++;
   $result_next = $blog->getByNext($next_no);
   if($next_no > $max_id){
     break;
   }
}

include('./header.php');
?>

<main class="l-main u-margin__center">

    <div class="p-jumbotron u-margin__center">
        <img class="p-jumbotron__img inview-back" src="./images/title/subtitleblog.png" alt="">
        <div class="p-jumbotron__introduction u-margin__center">
            <h1 class="c-single__title">BLOG</h1> 
        </div>
    </div>

    <div class="p-blog u-margin__center">
        <article>
            <div class="c-container u-margin__container">
                    <h2 class="c-container__title"><?php echo $result['title'] ?></h2>
                <!-- <?php if(empty($result['eyecatch_path'])){echo '<img style="max-width: 50%;" src="../img/no-image.png">';}?> -->
                    <img src="routeblog/<?php echo $result['eyecatch_path'] ?>" alt="">
                    <p>投稿日時：<?php echo $result['post_at'] ?></p>
                    <p>カテゴリ：<?php echo $result['category'] ?></p>
                    <hr>
                    <p class="p-blog__detail"><?php echo nl2br($result['content']); ?></p> 
                </div>
                
                <div class="c-container u-margin__container">
                    <h2 class="c-container__title">コメント</h2>
                    <div class="u-padding__center">
                        <p><?php if(empty($result_cmts)){ echo 'この記事へのコメントはありません'; }?></p>
                        <?php foreach($result_cmts as $result_cmt): ?>
                        <p class="u-text__break"><?php echo nl2br($result_cmt['cmt_content']); ?></p>
                        <h4 class="p-form__from"><?php echo $result_cmt['post_name'] ?><time><?php echo $result_cmt['post_at'] ?></time></h4>
                        <?php endforeach; ?>
                    </div>
                </div>

            <div class="c-container p-form u-margin__container">
                <form action="routeblog/blog/comment_create.php" method="POST">
                    <div class="p-form__group">
                        <div class="p-form__label">
                            <label for="post_name">お名前<span class="require_item"></label>
                        </div>
                        <div class="p-form__input">
                            <input type="text" name="post_name" id="post_name">
                            <input style="display: none;" type="text" name="post_no" value="<?= $_GET['id']?>">
                        </div>
                    </div>    
                    <div class="p-form__group">
                        <div class="p-form__label">
                            <label for="cmt_conent">コメント</label>    
                        </div>
                        <div class="p-form__input">
                            <textarea name="cmt_content" id="cmt_content" cols="30" rows="3"></textarea> 
                        </div>
                    </div>
                    <div class="thanks">
                        <button class="c-btn c-btn__send" type="submit">送信</button>
                        <button class="c-btn c-btn__back" type="reset">クリア</button>
                    </div>
                </form>
            </div>

            <div class="c-container u-padding__top  u-padding__center u-margin__container">
                <p ><a class="link-color" href="detail.php?id=<?php echo $next_no;?>">
                <?php echo $result_next['title'];?></a><<<次の記事</p>
                <p class="u-text__right">前の記事>>><a class="link-color" href="detail.php?id=<?php echo $prev_no;?>">
                <?php echo $result_prev['title'];?></a></p>
            </div>

        </article>   
            
            
            <aside class="p-blog__side u-margin__container">
                <div class="c-container">
                    <h2 class="c-container__title">カテゴリー</h2>
                    <p>カテゴリー1</p>
                    <p>カテゴリー2</p>
                    <p>カテゴリー3</p>
                    <p>カテゴリー4</p>
                    <p>カテゴリー5</p>
                </div>
                <div class="c-container">
                    <h2 class="c-container__title">タグ</h2>
                    <p>タグ1</p>
                    <p>タグ2</p>
                    <p>タグ3</p>
                    <p>タグ4</p>
                    <p>タグ</p>
                    <p>タグ5</p>
                </div>
                <div class="c-container">
                    <h2 class="c-container__title">アーカイブ</h2>
                    <p>2024年 7月 (1)</p>
                    <p>2024年 6月 (99)</p>
                    <p>2024年 5月 (999)</p>
                    <p>2024年 4月 (1)</p>
                    <p>2024年 3月 (1)</p>
                    <p>2024年 2月 (1)</p>
                </div>
            </aside>

    </div>

    

    <p class="more-link"><a href="article.php">ブログ一覧</a>へ戻る</p>
    <p class="more-link u-margin__bottom"><a href="index.php">TOP</a>へ戻る</p>
</main>

<?php
include('./footer.php');
?>