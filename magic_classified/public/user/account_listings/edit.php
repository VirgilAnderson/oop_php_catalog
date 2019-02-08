<?php require_once('../../../private/initialize.php'); ?>


<?php

  if(!isset($_GET['id'])) {
      redirect_to(url_for('/user/account_listings/index.php'));
  }
  $id = $_GET['id'];
  // display the form
  $listing = Listing::find_by_id($id);
  if($listing == false) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

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

    $listing->merge_attributes($args);
    $result = $listing->update();

    if($result === true) {
      $new_id = $listing->id;
      $_SESSION['message'] = 'The listing was updated successfully.';
      redirect_to(url_for('/user/account_listings/details.php?id=' . $new_id));
    } else {
      // show errors
    }

  } else {
    // Display the form
  }

?>


<?php $page_title = 'Edit My Listing'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Edit My Listing</h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action="<?php echo url_for('/user/account_listings/edit.php?id=' . h(u($id))); ?>" method="post">
              <?php include('form_fields.php'); ?>
              <input type='submit' value='Edit Listing' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/account_listings/details.php'); ?>'>My Listing</a></li>
            <li><a href='<?php echo url_for('/user/account_listings/delete.php'); ?>'>Delete Listing</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
