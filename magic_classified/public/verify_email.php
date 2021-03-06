<?php require_once('../private/initialize.php'); ?>

<?php

  $uid = $_GET['user_id'];
  $user = User::find_by_id($uid);

  if(is_post_request()) {
    $code = $_POST['code'];
    if($code == $user->verified_email) {
      // Update verified email in database and log user in
      $args['verified_email'] = 'true';
      $user->merge_attributes($args);
      $result = $user->save();
      if($result === true) {
        $session->login($user);
        $session->message('The account was created successfully.');
        redirect_to(url_for('/user/registration/index.php'));
      } else {
        // show errors
      }
    } else {
     // Send error
     $verification_error ="Verification code didn't match, please ensure it was entered correctly";
     }
   }
?>


<?php $page_title = 'Verify Email Address'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Check your email for a verification code</h1>
          <p>This may take a moment; check your spam folder</p>
          <?php if(!is_null($verification_error)) {
            echo $verification_error; unset($verification_error);
          } ?>

        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='verify_email.php?user_id=<?php echo $uid; ?>' method='post'>
              <dl>
                <dt><label class='col_25' for='code'>Enter code to verify:</label></dt>
                <dd><input class='col_75' type="text" name="code" /></dd>
              </dl>
              <input type='submit' class='button' value='Verify Email' />
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
