<?php require_once('../../../private/initialize.php'); ?>

<?php
  // Get the random number
  $rand = $_GET['rand'];

  // Search database for account with matching number
  $user = User::find_by_forgot_password($rand);
  if($user == false) {
    redirect_to('../login.php');
  } else {
    // If Post request, update password and set verified email to true
    if(is_post_request()) {
      // Create record using post parameters
      $args = $_POST['user'];
      $args['forgot_password'] = 'false';
      $user->merge_attributes($args);
      $result = $user->save();

      if($result === true) {
        // Log user in
        $session->login($user);
        $session->message('The password was updated successfully.');
        redirect_to(url_for('/user/registration/index.php'));
      } else {
        // show errors
      }

    } else {
      // Display the form
    }
  }

?>
<?php $page_title = 'Reset password'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Reset My Password</h1>
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
            <form action='password_reset.php?rand=<?php echo $rand; ?>' method='post'>
              <dl>
                <dt><label class='col_25' for='user[password]'>Password:</label></dt>
                <dd><input class='col_75' type="password" name="user[password]" value="<?php echo h($user->password); ?>" /></dd>
              </dl>

              <dl>
                <dt><label class='col_25' for='user[confirm_password]'>Confirm Password:</label></dt>
                <dd><input class='col_75' type="password" name="user[confirm_password]" value="<?php echo h($user->confirm_password); ?>" /></dd>
              </dl>
              <input type='submit' value='Update Password' />
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
