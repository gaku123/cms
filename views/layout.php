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

  <div id="header">
    <h1><a href="<?php echo $base_url; ?>/">Awitter</a></h1>
  </div>

  <div id="main">
    <?php echo $_content; ?>
  </div>

</body>
</html>
