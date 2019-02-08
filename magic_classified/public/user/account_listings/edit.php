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
    $args = $_POST['listing'];
    $listing->merge_attributes($args);
    $result = $listing->save();

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


<?php $page_title = 'Edit ' . $listing->name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Edit <?php echo $listing->name; ?></h1>
          <p><a href="details.php?id=<?php echo $id; ?>"><< Return to <?php echo $listing->name; ?></a></p>
          <div class='errors'>
            <?php  echo display_errors($listing->errors); ?>
          </div>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action="<?php echo url_for('/user/account_listings/edit.php?id=' . h(u($id))); ?>" method="post">
              <?php include('form_fields.php'); ?>
              <input type='submit' value='Edit <?php echo $listing->name; ?>' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/account_listings/index.php'); ?>'> <i class="fas fa-dove"></i></i> My Listings</a></li>
            <li><a href='<?php echo url_for('/user/account_listings/delete.php'); ?>'><i class="far fa-trash-alt"></i> Delete <?php echo $listing->name; ?></a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
