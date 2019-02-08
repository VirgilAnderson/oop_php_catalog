<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Delete My Listing'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Delete Listing</h1>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form>
              <h2>Are you sure you want to delete?</h2>
              <input type='submit' value='Delete Listing' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href="details.php?id=<?php echo $id; ?>"><< Return to Listing</a></li>
            <li><a href='<?php echo url_for('/user/account_listings/edit.php'); ?>'><i class="fas fa-edit"></i> Edit Listing</a></li>
            <li><a href='<?php echo url_for('/user/account_listings/index.php'); ?>'> <i class="fas fa-dove"></i></i> My Listings</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
