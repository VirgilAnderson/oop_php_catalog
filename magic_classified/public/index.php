<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'Magic Classifieds'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main>
  <section id='main_menu'>
    <ul id='menu'>
      <li><a href='<?php echo url_for('/user/login.php'); ?>'><i class="far fa-user-circle"></i> My Account</a></li>
      <li><a href='<?php echo url_for('/listings.php'); ?>'><i class="fas fa-frog"></i> Listings</a></li>
    </ul>
  </section>
</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
