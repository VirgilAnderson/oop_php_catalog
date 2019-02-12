<?php require_once('../private/initialize.php'); ?>

<?php
  // Find requested id
  $id = $_GET['id'] ?? false;
  if(!$id){
    redirect_to('listings.php');
  }
  // Find listing by id
  $listing = Listing::find_by_id($id);
  $user = $listing->user_id;
  $user = User::find_by_id($user);
?>
<?php $page_title = 'Contact Owner: Listing Name'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Contact Owner: <?php echo $listing->name; ?></h1>
          <p><a href="<?php echo url_for('details.php?id=' . $id); ?>">&laquo; Return to Listing</a></p>
          <p><i class="fas fa-phone"></i> Call: </p>
          <p><i class="far fa-envelope"></i> Email: <a href="mailto:<?php echo $user->email; ?>?Subject=<?php echo $listing->name; ?>" target="_top"><?php echo $user->email; ?></a></p>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='' method='post'>

              <dl>
                <dt><label for="">Subject:</label></dt>
                <dd><input type="text" name="" value="re: <?php echo $listing->name; ?>" size="80"/></dd>
              </dl>

              <dl>
                <dt><label for="">Body:</label></dt>
                <dd><textarea name="" rows="30" cols="81"></textarea></dd>
              </dl>

              <dl>
                <dt><label for="">Return Email Address:</label></dt>
                <dd><input type="text" name="" value=""/></dd>
              </dl>

              <input type='submit' value='Email Listing Owner' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/login.php'); ?>'>Login</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
