<?php require_once('./mvc/views/layout/header.php'); ?>
<?php require_once('./mvc/views/layout/alert.php'); ?>
<main class="container">
    <?php echo $this->content ?>
</main>
<?php require_once('./mvc/views/layout/modal.php'); ?>
<?php require_once('./mvc/views/layout/footer.php'); ?>