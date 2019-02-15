<?php require_once('../../../private/initialize.php'); ?>

<?php
  require_login();

  // Make sure ID & UID are set
  $uid = $_SESSION['user_id'];
  $id = $_GET['id'];

  if(!isset($uid)) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

  if(!isset($_GET['id'])) {
      redirect_to(url_for('/user/account_listings/index.php'));
  }

  $listing = Listing::find_by_id($id);
  if($listing == false) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

  // If post request, process form
    if(is_post_request()) {
      require_once('../../../private/image_upload.php');
    }
?>
<?php $page_title = 'Add image: ' .  $listing->name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1><i class="far fa-images"></i> Add Image</h1>
          <p><a href='<?php echo url_for('/user/account_listings/details.php?id=' . $id) ?>'>&laquo; Return to <?php echo $listing->name; ?></a></p>

          <!-- Messages -->

          <!-- Messages -->
            <?php echo display_session_message(); ?>
        
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <?php
              if(isset($new_name)){
                echo '<img src="' . $new_name . '">';
              }
            ?>

            <form action="<?php echo url_for('/user/account_listings/new_image.php?id=' . $id); ?>" method="post" enctype="multipart/form-data">

              <form action="<?php echo url_for('/user/account_listings/new_image.php'); ?>" method="post" enctype="multipart/form-data">

                <dl>
                  <dd><label for='fileToUpload'>Select image to upload:</label></dd>
                  <dt><input type="file" name="fileToUpload" id="fileToUpload"></dt>
                </dl>

                  <input type="submit" value="Upload Image" name="submit">
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
