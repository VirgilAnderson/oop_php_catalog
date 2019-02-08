<?php require_once('../../../private/initialize.php'); ?>

<?php
  if(is_post_request()) {

    // Create record using post parameters
    $args = [];
    $args['name'] = $_POST['name'] ?? NULL;
    $args['description'] = $_POST['description'] ?? NULL;
    $args['category'] = $_POST['category'] ?? NULL;
    $args['price'] = $_POST['price'] ?? NULL;
    $args['manufacturer'] = $_POST['manufacturer'] ?? NULL;
    $args['condition_id'] = $_POST['condition_id'] ?? NULL;
    $args['location'] = $_POST['location'] ?? NULL;

    $listing = new Listing($args);
    $result = $listing->create();

    if($result === true) {
      $new_id = $listing->id;
      $_SESSION['message'] = 'The listing was created successfully.';
      redirect_to(url_for('/user/account_listings/details.php?id=' . $new_id));
    } else {
      // show errors
    }

  } else {
    // display the form
    $listing = [];
  }

?>
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
            <form action="<?php echo url_for('/user/account_listings/new.php'); ?>" method="post">
              <?php include('form_fields.php'); ?>
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
