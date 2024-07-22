<?php
session_start();
$error = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	if ($post['name'] === ''){
	$error['name'] = 'blank';
	}
	if ($post['email'] === ''){
	$error['email'] = 'blank';
	}else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
		$error['email'] = 'email';
	}
	if ($post['contact'] === ''){
	$error['contact'] = 'blank';
	}

	if(count($error) === 0){
	$_SESSION['form'] = $post;
	header('Location: confium.php');
	exit();
	} else {
		if (!isset($_SESSION['form'])){
		$post = $_SESSION['form'];
		}
	}
}
include('./header.php');
?>

<main class="l-main u-margin__center">

    <div class="p-jumbotron u-margin__center">
        <img class="p-jumbotron__img inview-back" src="./images/title/subtitlecontact.jpg" alt="">
        <div class="p-jumbotron__introduction u-margin__center">
            <h1 class="c-single__title">CONTACT</h1> 
        </div>
    </div>

    <div class="c-container p-form u-margin__container">
    <form action="" method="POST" novalidate>
          <!-- <p>お問い合わせ</p> -->
          <div class="p-form__group">
                    <div class="p-form__label">
                        <label for="inputname">お名前<span class="require_item">必須</span></label>
                    </div>
                    <div class="p-form__input">
                        <input type="text" name="name" id="inputName" class="form-control" value="<?php echo htmlspecialchars($post['name'], ENT_QUOTES,'UTF-8'); ?>" required autofocus>
                            <?php if($error['name'] === 'blank'): ?>
                                <p class="error_msg">※お名前をご記入ください</P>
                            <?php endif; ?>
                    </div>
          </div>

        
          <div class="p-form__group">
              <div class="p-form__label">
                <label for="inputEmail">メールアドレス<span class="require_item">必須</span></label>
              </div>

              <div class="p-form__input">
                <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo htmlspecialchars($post['email'],ENT_QUOTES,'UTF-8'); ?>" required>
                  <?php if($error['email'] === 'blank'): ?>
			              <p class="error_msg">※メールアドレスをご記入ください</P>
		              <?php endif; ?>
                  <?php if($error['email'] === 'email'): ?>
                    <p class="error_msg">※メールアドレスを正しくご記入ください</P>
                  <?php endif; ?>
              </div>
          </div>

          <div class="p-form__group">
              <div class="p-form__label">
                <label for="inputContent">お問い合わせ<span class="require_item">必須</span></label>
              </div>
              <div class="p-form__input">
                <textarea name="contact" id="inputContent" rows="10" class="form-control" required><?php echo htmlspecialchars($post['contact'],ENT_QUOTES,'UTF-8'); ?></textarea>
                  <?php if($error['contact'] === 'blank'): ?>
                    <p class="error_msg">※お問い合わせ内容をご記入ください</P>
                  <?php endif; ?>
              </div>
          </div>
        
            <div class="thanks">
              <button class="c-btn c-btn__send" type="submit">確認画面へ</button>
            </div>
        
        </form>
    </div>



    <p class="more-link"><a href="index.php">TOP</a>へ戻る</p>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11.1.4/swiper-bundle.min.js"></script>
<script src="./js/main.js"></script>
</body>
</html>