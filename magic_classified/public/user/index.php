<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<main>
  <section id='main_menu'>
    <ul id='menu'>
      <li><a href='<?php echo url_for('/about.php'); ?>'>About Us</a></li>
      <li><a href='<?php echo url_for('/listings.php'); ?>'>View Listings</a></li>
    </ul>
  </section>
</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
