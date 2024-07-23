<?php

ini_set('display_errors', 1);

require_once('routeblog/blog.php');

$blog = new Blog();
$id = 4;
$result = $blog->getById($id);
$favo_id = 2;
$resultFavo = $blog->getById($favo_id);
$max_id = $blog->getMaxId();
$resultNew = $blog->getById($max_id);

include('./header.php');
?>

<main class="l-main u-margin__center">
    <div class="p-mainvisual u-margin__bottom">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="inview" src="./images/mainvisual/slidemainvisual.jpg" alt="メインの画像"></div>
                <div class="swiper-slide"><img class="inview" src="./images/mainvisual/slideminato.png" alt="MINATOの画像"></div>
                <div class="swiper-slide"><img class="inview" src="./images/mainvisual/slidenami.png" alt="なみおかの画像"></div>
                <div class="swiper-slide"><img class="inview" src="./images/mainvisual/slidekoji.png" alt="カネコの画像"></div>
                <div class="swiper-slide"><img class="inview" src="./images/mainvisual/slideall.jpg" alt="ステージ画像"></div>
            </div>
            <div class="swiper-pagination"></div>
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
        </div>
    </div>

    <div class="p-jumbotron u-margin__bottom u-margin__center">
        <img class="p-jumbotron__img inview-back" src="./images/about.jpg" alt="">
        <div class="p-jumbotron__introduction u-margin__center">
            <h1 class="c-single__title p-jumbotron__title">about RÖUTE</h1>
            <p>RÖUTEは、3ピースという最小限の人数でロックの限界に挑戦しています。G&VO、B&VOというツインボーカル形態で、デュエットや掛け合いなどをして思いをリスナーに伝えています。</p>
            <p>ヘヴィなリフに邦楽メロディを乗せ、ロックでありながらデュエットも出来る、そんな既成概念を打ち破った形態でやっています。</p>
            <p>楽曲は無駄なものをそぎ落としタイトにして、濃密にしています。パンクとヘヴィ系と歌謡ロックのいいとこ取りを追求しています。</p>   
        </div>
    </div>

    <div class="member u-margin__bottom u-margin__center">
        <h1 class="c-single__title">MEMBER</h1>

        <div class="wrap">
            <div class="c-card member__card c-hover">
                <div class="c-card__img">
                    <img class="member__img inview" src="./images/member/memberminato.jpg" alt="メンバー個々の画像 MINATO">  
                </div>
                <div class="c-card__info u-margin__middle">
                    <h2 class="c-card__title member__name">MINATO</h2>
                    <p class="c-card__dedail member__part">Vocal & Guitar</p>           
                </div>
                <a href="minato.php">
                    <div class="c-hover__text u-margin__all">
                        <h2 class="u-margin__center">Profile of MINATO</h2>
                    </div>
                </a>
            </div>

            <div class="c-card member__card c-hover">
                <div class="c-card__img">
                    <img class="member__img inview"src="./images/member/menbernami.jpg" alt="メンバー個々の画像 なみおか">  
                </div>
                <div class="c-card__info u-margin__middle">
                    <h2 class="c-card__title member__name">なみおか</h2>
                    <p class="c-card__dedail member__part">Vocal & Bass</p>           
                </div>
                <a href="namioka.php">
                    <div class="c-hover__text u-margin__all">
                        <h2 class="u-margin__center">Profile of なみおか</h2>
                    </div>
                </a>
            </div>

            <div class="c-card member__card c-hover">
                <div class="c-card__img">
                    <img  class="member__img inview"src="./images/member/memberkaneko.jpg" alt="メンバー個々の画像 カネコ">  
                </div>
                <div class="c-card__info u-margin__middle">
                    <h2 class="c-card__title member__name">カネコ</h2>
                    <p class="c-card__dedail member__part">Drums & Chorus</p>           
                </div>
                <a href="kaneko.php">
                    <div class="c-hover__text u-margin__all">
                        <h2 class="u-margin__center">Profile of カネコ</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="news u-margin__bottom u-margin__center">
        <h1 class="c-single__title">NEWS</h1>

        <table class="c-table">
            <tr>
                <td><h4>2024.7/20<span class="span__news">new!</span></h4></td>
                <td><h4>LIVEスケジュールをアップしました。<a class="link-color" href="schedule.php">8月27日(火)大宮ヒソミネ</a></h4></td>
            </tr>
            <tr>
                <td><h4>2024.7/17</h4></td>
                <td><h4><a class="link-color" href="movie.php">MOVIE</a>を追加しました。</h4></td>
            </tr>
            <tr>
                <td><h4>2024.5/13</h4></td>
                <td><h4>LIVEスケジュールをアップしました。<a class="link-color" href="schedule.php">7月12日(金)新宿HEIST</a></h4></td>
            </tr>
        </table>

    </div>

    <div class="new-release u-margin__bottom u-margin__center">
        <h1 class="c-single__title">New Release</h1>
        <div class="c-player">
            <h2 class="c-player__title">この野郎 Demo Ver.</h2>
            <div class="c-player__audio">
                <audio controls>
                    <source src="./images/disc/konoyaro20220203.mp3" type="audio/mp3">
                    <p>ご利用のブラウザは音声ファイルの再生に対応しておりません</p>
                </audio>
            </div>
        </div>
    </div>

    <div class="pick-up u-margin__bottom u-margin__center">
        <h1 class="c-single__title">Pick Up</h1>
        <div class="wrap">
            <div class="c-movie">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/BsBW0ugdnEc" title="【LIVE動画】RÖUTE 「この野郎」 2024.7/12 新宿HEIST" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="c-movie">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5CPhpwNImoo?si=8sy1r92Wx_r2PN9x" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
        <p class="more-link u-margin__top">→ <a href="movie.php">more movie</a></p>
    </div>


    <div class="last-article u-margin__bottom u-margin__center">
        <h1 class="c-single__title">Last Article</h1>
        <div class="p-blog">
            <a href="detail.php?id=<?php echo $resultNew['id']?>">
                <article class="c-typography">
                    <img class="c-typography__img inview-back" src="routeblog/<?php echo $resultNew['eyecatch_path'] ?>" alt="">
                    <h3 class="c-typography__title"><?php echo $resultNew['title'] ?></h3>
                </article>
            </a>
            <a href="detail.php?id=<?php echo $result['id']?>">
                <article class="c-typography ">
                    <img class="c-typography__img inview-back" src="routeblog/<?php echo $result['eyecatch_path'] ?>" alt="">
                    <h3 class="c-typography__title"><?php echo $result['title'] ?></h3>
                </article>
            </a>
            <a href="detail.php?id=<?php echo $resultFavo['id']?>">
                <article class="c-typography ">
                    <img class="c-typography__img inview-back" src="routeblog/<?php echo $resultFavo['eyecatch_path'] ?>" alt="">
                    <h3 class="c-typography__title"><?php echo $resultFavo['title'] ?></h3>
                </article>
            </a>
       
        </div>
        <p class="more-link u-margin__top">→ <a href="article.php">more article</a></p>
    </div>


  
</main>

<?php
include('./footer.php');
?>