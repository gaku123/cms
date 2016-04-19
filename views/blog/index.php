<?php $this->setLayoutVar('title', '爽コード') ?>

<div id="entries">
<?php foreach ($entries as $entry): ?>
  <?php echo $this->render('blog/entry', array('entry' => $entry)); ?>
<?php endforeach; ?>
</div>



