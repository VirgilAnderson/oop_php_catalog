<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<main>
  <?php
    $session->logout();
    redirect_to(url_for('/user/login.php'));
  ?>
</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
