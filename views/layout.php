<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>
<?php if (isset($title)): ?>
  <?php echo $this->escape($title) . "-"; ?>
<?php endif ?>
Awitter
</title>
</head>
<body>

  <header>

    <h1><a href="<?php echo $base_url; ?>/">Awitter</a></h1>

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

  </header>

  <div id="main">
    <?php echo $_content; ?>
  </div>

</body>
</html>
