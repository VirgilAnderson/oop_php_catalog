<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Edit My Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2><i class="fas fa-plus-circle"></i> New Listing</h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form>
              <?php include('form_fields.php'); ?>
              <input type='submit' value='New account' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/account_listings/index.php'); ?>'><i class="fas fa-dove"></i> My Listings</a></li>
            <li><a href='<?php echo url_for('/user/registration/index.php'); ?>'><i class="far fa-user-circle"></i> My Account</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
