<?php $this->setLayoutVar('title', 'Top') ?>

<h2>Wellcome</h2>

<?php if(isset($user)): ?>
<?php echo "hello " . $user['user_name']; ?>
<?php else: ?>
<a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a>
<?php endif; ?>

