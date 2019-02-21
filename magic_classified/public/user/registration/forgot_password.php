<?php require_once('../../../private/initialize.php'); ?>

<?php
  // if post request
  if(is_post_request()) {
    // Find user by email
    $email = $_POST['email'];
    $user = User::find_by_email($email);
    
    if($user == false) {
      // display error message
      $error = 'Error: account not found';
    } else {
      // Generate random Number
      $rand = mt_rand();

      // Assign verified email variable to it
      $args['forgot_password'] = $rand;
      $user->merge_attributes($args);
      $result = $user->save();

      if($result === true) {
          // Send reset email
          $expected = [];
          $required = [];
          $to = $user->email;
          $subject = 'Reset your password';
          $headers = [];
          $headers[] = 'From: webmaster@the-magic-exchange.com';
          $headers[] = 'Content-type: text/plain; charset=utf-8';
          $message = 'Click the link to reset your password ';
          $message .= 'http://www.the-magic-exchange.com/public/user/registration/password_reset.php?rand=' . $rand;
          $authorized = null;
          require_once('../../../private/email_validation.php');
          if($mailSent) {
            // display success message
            $message = 'Reset email sent. Check your inbox.';
          }
        } else {
          // Display error message
          $error = ' Email not sent';
        }

    }


  }

?>
<?php $page_title = 'Forgot my password'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Forgot My Password</h2>
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
