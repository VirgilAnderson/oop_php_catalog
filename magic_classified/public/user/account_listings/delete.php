<?php require_once('../../../private/initialize.php'); ?>
<?php
  require_login();
  $uid = $_SESSION['user_id'];
  $id = $_GET['id'];
  // Make sure ID is set
  if(!isset($uid)) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

  $listing = Listing::find_by_id($id);
  if($listing == false) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }
  // Find Listing Photos
  $sql = "SELECT * FROM photos WHERE ";
  $sql .= "listing_id='" . $id . "'";
  $photos = Photo::find_by_sql($sql);

  // If Post Request Delete Listing or else display form
  if(is_post_request()) {

    // Delete listing Images
    foreach($photos as $image_to_delete) {
      $image_link = '../../user_images/' . $image_to_delete->link;
      unlink($image_link);
    }

    // Delete listing
    $result = $listing->delete();
    //$session->message('The listing was successfully deleted.');
    redirect_to(url_for('/user/account_listings/index.php'));

  } else {
    // Display Form

  }
?>
<?php $page_title = 'Delete ' . $listing->name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Delete <?php echo $listing->name; ?>?</h1>
          <p><a href="<?php echo url_for('/user/account_listings/details.php?id=' . $listing->id); ?>">&laquo; Return to <?php echo $listing->name; ?></a></p>

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
            <form action="<?php echo url_for('/user/account_listings/delete.php?id=' . h(u($id))); ?>" method='post'>
              <h2>Are you sure you want to delete?</h2>
              <input type='submit' value='Delete <?php echo $listing->name; ?>' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
          <li><a href='<?php echo url_for('/user/account_listings/index.php'); ?>'> <i class="fas fa-dove"></i></i> My Listings</a></li>
              <li><a href="<?php echo url_for('/user/account_listings/edit.php?id=' . $listing->id); ?>"><i class="far fa-trash-alt"></i> Edit</a></li>
              <li><a href='<?php echo url_for('/user/account_listings/new_image.php?id=' .$listing->id); ?>'><i class="far fa-images"></i> Add image</a></li>

              <!-- Display delete link conditionally -->
              <?php if($photos) { ?>
              <li><a href='<?php echo url_for('/user/account_listings/delete_image.php?id=' .$listing->id); ?>'><i class="fas fa-minus-circle"></i> Delete Image</a></li>
              <?php } ?>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
