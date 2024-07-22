<?php
session_start();

if (!isset($_SESSION['form'])) {
	header('Location: contact.php');
	exit();
} else {
	$post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
	$to = 'successruler@gmail.com';
	$from = $post['email'];
	$subject = 'お問い合わせが届きました';
	$body = <<<EOT
名前: {$post['name']}
メールアドレス: {$post['email']}
内容: {$post['contact']}
EOT;
	mb_send_mail($to, $subject, $body, "From: {$from}");

	unset($_SESSION['form']);
	header('Location: thanks.html');
	exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="東京都内で活動中の3ピースメタルバンド「RÖUTE」のオフィシャルサイト。Vo&Gt/MINATO,Vo&Ba/なみおか.Dr&cho/カネコ">
    <title>RÖUTE Official Site</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.1.4/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/common/icon/route-icon.png">
    <script type="text/javascript" src="./js/footerFixed.js"></script>
</head>

<body>

<header class="l-header">
    <h1 class="l-header__logo u-margin__right">
        <a href="index.php"><img src="./images/common/logo/logo2022.png" alt="RÖUTEのサイトロゴ"></a>
    </h1>
</header>

<main class="l-main u-margin__center">
    <div class="c-container p-form u-margin__container">
        <p class="thanks__msg">以下の内容で送信します。</span></p>

        <div class="p-form__group">
            <div class="p-form__label">
                <label for="inputname">お名前</label>
            </div>
            <div class="p-form__input">
                <p><?php echo htmlspecialchars($post['name']); ?></p>
            </div>
        </div>


        <div class="p-form__group">
            <div class="p-form__label">
                <label for="inputEmail">メールアドレス</label>
            </div>

            <div class="p-form__input">
               <p><?php echo htmlspecialchars($post['email']); ?></p>
            </div>
        </div>

        <div class="p-form__group">
            <div class="p-form__label">
                <label for="inputContent">お問い合わせ</label>
            </div>
            <div class="p-form__input">
                <p class="u-text__break"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>
            </div>
        </div>

            <div class="thanks">
                <button class="c-btn c-btn__send u-margin__top" type="submit">送信する</button>
                <p class="c-btn c-btn__back"><a href="contact.php">戻る</a></p>
            </div>
    </div>

</main>

<footer id="footer" class="l-footer">
    <div class="copyright">
        <small>&copy;2017 RÖUTE</small>
    </div>
    <!-- <div class="x-twitter">
        <a href="https://twitter.com/twitter?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-screen-name="false" data-lang="ja" data-dnt="true" data-show-count="false">Follow @twitter</a>
    </div> -->
    
</footer>

<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/main.js"></script>
</body>
</html>