<?php require_once('../private/initialize.php'); ?>

<?php
  // Find requested id
  $id = $_GET['id'] ?? false;
  if(!$id){
  //  redirect_to('listings.php');
  }
  // Find listing by id
  $listing = Listing::find_by_id($id);
  $listing_owner = $listing->user_id;
  $listing_owner = User::find_by_id($listing_owner);


?>
<?php $page_title = 'Thanks: Message Sent'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Message Sent</h1>
          <p><a href="<?php echo url_for('details.php?id=' . $id); ?>">&laquo; Return to Listing</a></p>


        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <p>Thank you. Your message has been sent.</p>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <?php if(!$session->is_logged_in()) { ?>
            <li><a href='<?php echo url_for('/user/login.php'); ?>'>Login</a></li>
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
