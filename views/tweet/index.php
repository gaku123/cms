<?php $this->setLayoutVar('title', 'Top') ?>

<h2>Wellcome</h2>

<?php //エラーがあった場合の処理 ?>
<?php if (isset($errors) && count($errors) > 0): ?>
  <?php echo $this->render('errors', array('errors' => $errors)); ?>
<?php endif; ?>

<?php if($session->isAuthenticated()): ?>
<form action="/tweet/post" method="post">
  <p><input type="text" name="body" value="<?php echo $this->escape($body); ?>"></p>
  <p><input type="submit" value="ツイート"></p>
  <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
</form>
<?php endif; ?>


<?php if($session->isAuthenticated()): ?>
  <?php echo "hello " . $user['user_name']; ?><br />
  <a href="<?php echo $base_url; ?>/account/logout">ログアウト</a>
<?php else: ?>
  <a href="<?php echo $base_url; ?>/account/login">ログイン</a>
  <a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a>
<?php endif; ?>

<?php if($session->isAuthenticated()): ?>
  <div id="tweets">
  <?php foreach ($tweets as $tweet): ?>
    <div class="tweet">
    <?php echo $this->escape($tweet['user_name']); ?>
    <?php echo $this->escape($tweet['body']); ?>
    </div>
  <?php endforeach; ?>
  </div>
<?php endif; ?>


