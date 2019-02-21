<?php require_once('../../../private/initialize.php'); ?>

<?php
  require_login();
  $uid = $_SESSION['user_id'];

  if(is_post_request()) {

    // Create record using post parameters
    $args =  $_POST['listing'];
    $listing = new Listing($args);
    $result = $listing->save();

    if($result === true) {
      $new_id = $listing->id;
      $session->message('The listing was created successfully.');
      redirect_to(url_for('/user/account_listings/details.php?id=' . $new_id));
    } else {
      // show errors
    }

  } else {
    // display the form
    $listing = new Listing;
  }

?>
<?php $page_title = 'Create New Listing'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1><i class="fas fa-plus-circle"></i> New Listing</h1>
          <p><a href='index.php'>&laquo; Return to <i class="fas fa-dove"></i> My Listings</a></p>

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
              <?php include('form_fields.php'); ?>
              <input type='submit' class='button' value='Create New Listing' />
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
