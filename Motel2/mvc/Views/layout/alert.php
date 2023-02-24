<?php
$message = '';
$class = '';
if (!empty($_SESSION['success'])) {
  $message = $_SESSION['success'];
  unset($_SESSION['success']);
  $class = 'success';
} else if (!empty($_SESSION['error'])) {
  $message = $_SESSION['error'];
  unset($_SESSION['error']);
  $class = 'danger';
}
?>
<?php if ($message) : ?>
  <div class="alert alert-<?= $class ?> mt-3"><?= $message ?></div>
<?php endif ?>