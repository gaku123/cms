<?php $this->setLayoutVar('title', 'Top') ?>

<h2>Wellcome</h2>

<?php if($session->isAuthenticated()): ?>
<?php echo "hello " . $user['user_name']; ?><br />
<a href="<?php echo $base_url; ?>/account/logout">ログアウト</a>
<?php else: ?>
<a href="<?php echo $base_url; ?>/account/login">ログイン</a>
<a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a>
<?php endif; ?>

