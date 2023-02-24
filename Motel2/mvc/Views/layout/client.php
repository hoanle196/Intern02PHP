<?php require_once('./mvc/views/layout/client/headerClient.php'); ?>
<main>
  <?php require_once('./mvc/views/layout/alert.php'); ?>
  <?php echo $this->content ?>
</main>
<?php require_once('./mvc/views/layout/modal.php'); ?>
<?php require_once('./mvc/views/layout/client/footerClient.php'); ?>