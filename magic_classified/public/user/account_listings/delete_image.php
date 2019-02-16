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

  // Find Listing Photos
  $sql = "SELECT * FROM photos WHERE ";
  $sql .= "listing_id='" . $id . "'";
  $photos = Photo::find_by_sql($sql);

  // If no photos, redirect to details page
  if(!$photos){
    redirect_to(url_for('/user/account_listings/details.php?id=' . $id));
  }

  // display the form
  $listing = Listing::find_by_id($id);
  if($listing == false) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

  if(is_post_request()) {
    // Remove the image
    $image_to_delete = $_GET['photo_id'];
    $image_link = '../../user_images/' . $_GET['link'];

    if(unlink($image_link)) {
      // Remove the record from the database
      $photo = Photo::find_by_id($image_to_delete);
      $result = $photo->delete();
      if($result) {
        $session->message('The image was successfully deleted.');
        redirect_to(url_for('/user/account_listings/delete_image.php?id=' . $id));
      }
    }

  } else {
    // Display the form
  }

?>


<?php $page_title = 'Edit ' . $listing->name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Edit: <?php echo $listing->name; ?></h1>
          <p><a href="details.php?id=<?php echo $id; ?>">&laquo; Return to <?php echo $listing->name; ?></a></p>

          <!-- Messages -->
          <div class='errors'>
            <?php  echo display_errors($listing->errors); ?>
          </div>

          <?php echo display_session_message(); ?>

        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>

            <!-- Display All Images Form -->
            <?php foreach($photos as $photo) {?>
              <form action="<?php echo url_for('/user/account_listings/delete_image.php?id=' . h(u($id)) . '&photo_id=' . $photo->id . '&link=' . $photo->link); ?>" method="post">
                <div class="delete_container">
                  <img src="<?php echo "../../user_images/" . $photo->link; ?>" style="width:100%" alt='<?php echo $photo->id; ?>' >
                  <input type='submit' value='Delete'>
                </div><!-- .delete_container -->

              </form>
            <?php }?>


          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/account_listings/index.php'); ?>'> <i class="fas fa-dove"></i></i> My Listings</a></li>
            <li><a href="<?php echo url_for('/user/account_listings/edit.php?id=' . $listing->id); ?>"><i class="fas fa-edit"></i> Edit</a></li>
            <li><a href='delete.php?id=<?php echo $listing->id; ?>'><i class="far fa-trash-alt"></i> Delete <?php echo $listing->name; ?></a></li>
            <li><a href='<?php echo url_for('/user/account_listings/new_image.php?id=' .$listing->id); ?>'><i class="far fa-images"></i> Add image</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
