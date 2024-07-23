<?php

require_once('routeblog/blog.php');

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
        <div class="c-container u-margin__container">
            <h2 class="c-container__title">ブログ一覧 (<?php echo $pages ?>)</h2>

            <?php foreach($blogData as $column): ?>

            <a href="detail.php?id=<?php echo $column['id']?>">
                <div class="c-card p-blogcard">
                    <div class="p-blogcard__img">
                        <img class="inview" src="routeblog/<?php echo h($column['eyecatch_path'])?>" alt="">
                    </div>
                    <div class="p-blogcard__info">
                        <h3 class="p-blogcard__title"><?php echo h($column['title'])?></h3>
                        <p class="p-blogcard__dete"><?php echo h($column['post_at'])?></p>
                        <p class="p-blogcard__content"><?php echo h($column['content'])?></p>
                    </div>
                </div>
            </a>
           
            <?php endforeach; ?>

            <?php for ($x=1; $x <= $pagination ; $x++) { ?>
	            <a class="page_num" href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
             <?php } // End of for ?>
            
        </div>

        <!-- <aside class="p-blog__side u-margin__container">
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
        </aside> -->

    </div>

    

    <p class="more-link u-margin__bottom"><a href="index.html">TOP</a>へ戻る</p>
</main>

<?php
include('./footer.php');
?>