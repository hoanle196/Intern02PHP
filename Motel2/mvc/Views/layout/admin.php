<?php require_once('./mvc/views/layout/admin/headerAdmin.php'); ?>
<main>
  <?php require_once('./mvc/views/layout/alert.php'); ?>
  <?php echo $this->content ?>
</main>
<?php require_once('./mvc/views/layout/modal.php'); ?>
<?php require_once('./mvc/views/layout/admin/footerAdmin.php'); ?>