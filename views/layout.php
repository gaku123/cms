<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>
<?php if (isset($title)): ?>
  <?php echo $this->escape($title) . "-"; ?>
<?php endif ?>
Awitter
</title>
<link rel="stylesheet" href="/css/style.css">
</head>

<body class="" dir="ltr">

  <div id="doc">

<<<<<<< HEAD
    <header id="header-container">
      <div class="header">
        <div class="header-top">
          <div class="header-img" style="background-image: url(/images/header.png);"></div>
          <div class="header-buttons">
            <h1 class="reset"><a href="/" class="icon">Awitter</a></h1>
            <a class="button" href="https://twitter.com/signup">新規登録</a>
            <button class="login button" type="submit">ログイン</button>
          </div>
          <div class="header-content">
            <h2 class="header-title">「いま」起きていることを見つけよう。</h2>
              <p class="header-blurb">好きなものについてのコミュニティや会話、ひらめきを見つけよう。</p>
          </div>
        </div>
        <nav id="nav">
          <ul>
            <li class="nav-item">
              <div class="nav-itemInner">
                <a class="nav-itemName" href="<?php echo $base_url; ?>/">ホーム</a>
              </div>
            </li>
            <?php if($session->isAuthenticated()): ?>
            <li class="nav-item">
              <div class="nav-itemInner">
                <a class="nav-itemName" href="<?php echo $base_url; ?>/account/logout">ログアウト</a>
              </div>
            </li>
            <?php else: ?>
            <li class="nav-item">
              <div class="nav-itemInner">
                <a class="nav-itemName" href="<?php echo $base_url; ?>/account/login">ログイン</a>
              </div>
            </li>
            <li class="nav-item">
              <div class="nav-itemInner">
                <a class="nav-itemName" href="<?php echo $base_url; ?>/account/signup">アカウント登録</a>
              </div>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </header>

    <div id="main" class="content" id="timeline">
      <?php echo $_content; ?>
    </div>
=======
    <nav>
      <ul>
        <li><a href="<?php echo $base_url; ?>/">ホーム</a></li>
        <li><a href="<?php echo $base_url; ?>/tweet/all">全体のタイムライン</a></li>
        <?php if($session->isAuthenticated()): ?>
        <li><a href="<?php echo $base_url; ?>/account/logout">ログアウト</a></li>
        <?php else: ?>
        <li><a href="<?php echo $base_url; ?>/account/login">ログイン</a></li>
        <li><a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a></li>
        <?php endif; ?>
      </ul>
    </nav>
>>>>>>> 339dae96004b0b81aea183678fa560c6048ece4b

    <div class="footer">
      <ul class="footer-list">
        <li class="footer-item"><a href="/about">Awitterについて</a></li>
        <li class="footer-item footer-copyright">© 2016 Awitter</li>
      </ul>
    </div>

  </div>

</body>
</html>
