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

  <header id="header">
    <nav id="nav">
      <ul>
        <li class="nav-item"><a class="nav-itemName" href="<?php echo $base_url; ?>/">Gpress</a></li>
        <?php if($session->isAuthenticated()): ?>
        <li class="nav-item"><a class="nav-itemName" href="<?php echo $base_url; ?>/account/logout">ログアウト</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <h1>爽コード</h1>
  <h2>ラムネ、風鈴、田舎、新緑、こいのぼり</h2>

  <div id="main" class="content" id="timeline">
    <?php echo $_content; ?>
  </div>

  <div class="footer">
    <ul class="footer-list">
      <li class="footer-item"><a href="/about">Gpressについて</a></li>
      <li class="footer-item footer-copyright">© 2016 Gpresss</li>
    </ul>
  </div>

</body>
</html>
