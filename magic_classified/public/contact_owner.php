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

  $errors = [];
  $missing = [];
  if (isset($_POST['send'])) {
      $expected = ['subject', 'body', 'return_email'];
      $required = ['subject', 'return_email', 'body'];
      require_once('../private/email_validation.php');
  }
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
          <p><i class="far fa-envelope"></i> Email: <a href="mailto:<?php echo $listing_owner->email; ?>?Subject=<?php echo $listing->name; ?>" target="_top"><?php echo $listing_owner->email; ?></a></p>

          <?php
            // Output Email Errors
            if($errors || $missing) {
                echo "<p class='errors'>Please fix item(s) indicated</p>";
            }
          ?>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='<?php echo url_for('contact_owner.php?id=' . $id); ?>' method='post'>

              <dl>
                <dt><label for="subject">Subject:
                  <?php
                    if($missing && in_array('subject', $missing)) {
                      echo "<span class='errors'>Please enter a subject.</span>";
                    }
                   ?>
                </label></dt>
                <dd><input type="text" name="subject" value="re: <?php echo $listing->name; ?>" size="80"/></dd>
              </dl>

              <dl>
                <dt><label for="body">Body:
                  <?php
                    if($missing && in_array('body', $missing)) {
                      echo "<span class='errors'>Please fill in the body.</span>";
                    }
                   ?>
                </label></dt>
                <dd><textarea name="body" rows="30" cols="81"></textarea></dd>
              </dl>

              <dl>
                <dt><label for="return_email">Return Email Address:
                  <?php
                    if($missing && in_array('return_email', $missing)) {
                      echo "<span class='errors'>Please enter a return email.</span>";
                    }
                   ?>
                </label></dt>
                <dd><input type="email" value="<?php if($session->is_logged_in()) {echo $session->email;} ?>" name="return_email"/></dd>
              </dl>

              <input type="submit" name="send" id="send" value='Email Listing Owner' />
            </form>
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
