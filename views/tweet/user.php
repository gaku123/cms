<?php $this->setLayoutVar('title', 'User') ?>

<?php echo 'this is ' . $user['user_name'] . '\'s timeline' ?>
<div id="tweets">
<?php foreach ($tweets as $tweet): ?>
  <?php echo $this->render('tweet/tweet', array('tweet' => $tweet)); ?>
<?php endforeach; ?>
</div>


