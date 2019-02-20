<?php require_once('../../../private/initialize.php'); ?>

<?php
  // Get the random number

  // Search database for account with matching number

  // If Post request, update password and set verified email to true 
?>
<?php $page_title = 'Reset password'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Reset My Password</h2>
          <?php
            // Display errors
            if(isset($error)) {
              echo "<p class='errors'>" . $error . "</p>";
              unset($error);
            }
            // Display Message
            if(isset($message)) {
              echo "<p id='message'>" . $message . "</p>";
              unset($message);
            }
          ?>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='forgot_password.php' method='post'>
              <dl>
                <dt><label for='email'>Email Address:</label></dt>
                <dd><input type="text" name="email" value="" /></dd>
              </dl>
              <input type='submit' value='Forgot Password' />
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
