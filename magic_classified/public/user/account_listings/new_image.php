<?php require_once('../../../private/initialize.php'); ?>

<?php
  require_login();
  $uid = $_SESSION['user_id'];
  $id = $_GET['id'];
  // Make sure ID is set
  if(!isset($uid)) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }
  if(!isset($_GET['id'])) {
      redirect_to(url_for('/user/account_listings/index.php'));
  }

  // display the form
  $listing = Listing::find_by_id($id);
  if($listing == false) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }


?>
<?php $page_title = 'Add Photo to Listing'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1><i class="far fa-images"></i> Add Image</h1>
          <p><a href='<?php echo url_for('/user/account_listings/details.php?id=' . $id) ?>'>&laquo; Return to <?php echo $listing->name; ?></a></p>

          <!-- Messages -->
          <div class='errors'>
            <?php  echo display_errors($listing->errors); ?>
          </div>
          <div class='session_messages'>
            <?php echo display_session_message(); ?>
          </div>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action="<?php echo url_for('/user/account_listings/new.php'); ?>" method="post">
              
              <input type='submit' value='Create New Listing' />
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
