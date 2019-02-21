<?php require_once('../../../private/initialize.php'); ?>

<?php
  require_login();

  // Make sure ID & UID are set
  $uid = $_SESSION['user_id'];
  $id = $_GET['id'];
  $error = isset($_GET['error']) ? $_GET['error'] : null;

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

  // Find Listing Photos
  $sql = "SELECT * FROM photos WHERE ";
  $sql .= "listing_id='" . $id . "'";
  $photo = Photo::find_by_sql($sql);


  // If post request, upload image and process form
    if(is_post_request() && !isset($error)) {
      // Upload image & assign name
      require_once('../../../private/image_upload.php');

      // If photo uploaded successfully create database record
      if($uploadOk == 1) {
        // process form
        $args['link'] = $database_name;
        $args['listing_id'] = $id;
        $photo = new Photo($args);
        $result = $photo->save();

        if($result === true) {
          $new_id = $photo->id;
          $session->message('The Photo was added to listing.');
        } else {
          // show errors
        }
      }


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


          <!-- error -->
          <div class='errors'>
            <?php
            if(isset($error)) {
              echo $error;
            }
            if(isset($image_upload_error)) {
              foreach($image_upload_error as $x => $x_value) {
                echo  $x_value . "<br>";
              }
              unset($image_upload_error);
            }
            ?>
          </div>

          <!-- Messages -->
            <?php echo display_session_message(); ?>

        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <?php
              if(isset($new_name)){
                echo '<div class="preview"><img src="' . $new_name . '" width=100%;></div>';
              }
            ?>
            <div class='preview'>
              <form action="<?php echo url_for('/user/account_listings/new_image.php?id=' . $id); ?>" method="post" enctype="multipart/form-data">

                <form action="<?php echo url_for('/user/account_listings/new_image.php'); ?>" method="post" enctype="multipart/form-data">

                  <dl>
                    <dd><label for='fileToUpload'>Select image to upload:</label></dd>
                    <dt><input type="file" name="fileToUpload" id="fileToUpload"></dt>
                  </dl>

                    <input type="submit" value="Upload Image" name="submit">
                </form>
              </div>


          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/account_listings/index.php'); ?>'><i class="fas fa-dove"></i> My Listings</a></li>
            <li><a href='<?php echo url_for('/user/registration/index.php'); ?>'><i class="far fa-user-circle"></i> My Account</a></li>
            <li><a href="<?php echo url_for('/user/account_listings/edit.php?id=' . $listing->id); ?>"><i class="far fa-trash-alt"></i> Edit</a></li>

            <!-- Display delete link conditionally -->
            <?php if($photo) { ?>
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
