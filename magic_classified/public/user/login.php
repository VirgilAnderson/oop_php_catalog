<?php require_once('../../private/initialize.php'); ?>
<?php
  $errors = [];
  $username = '';
  $password = '';
  $verification_code = '';

  if(is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if(is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if(empty($errors)) {
      $user = User::find_by_username($username);
      // test if user found and password is correct
      if($user != false && $user->verify_password($password)) {
        // Mark user as logged in
        $session->login($user, $verification_code);
        redirect_to(url_for('/user/registration/index.php'));
      } else {
        // username not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }

    }

  }
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Login to My Account</h1>
          <!-- Messages -->
          <?php echo display_session_message(); ?>
          <?php echo display_errors($errors); ?>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='login.php' method='post'>
              <dl>
                <dt><label class='col_25' for='username'>Username:</label></dt>
                <dd><input class='col_75' type="text" name="username" value="<?php echo h($username); ?>" /></dd>
              </dl>
              <dl>
                <dt><label class='col_25' for='password'>Password:</label></dt>
                <dd><input class='col_75' type="password" name="password" value="" /></dd>
              </dl>
              <input type='submit' class='button' name='submit' value='Login' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/registration/forgot_password.php'); ?>'>Forgot my Password</a></li>
            <li><a href='<?php echo url_for('/user/registration/new.php'); ?>'>Create Account</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
