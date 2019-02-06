<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Edit My Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Delete My Account</h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form>
              <h2>Are you sure you want to delete?</h2>
              <input type='submit' value='Delete account' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/registration/index.php'); ?>'>My Account</a></li>
            <li><a href='<?php echo url_for('/user/registration/edit.php'); ?>'>Edit Account</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>Column</aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
