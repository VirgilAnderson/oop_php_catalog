<?php require_once('../../../private/initialize.php'); ?>

<?php
  // Make Sure Logged In
  require_login();

  // Make sure ID is set
  $uid = $_SESSION['user_id'];
  if(!isset($uid)) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

  $user = User::find_by_id($uid);
  if($user == false) {
    redirect_to(url_for('../login.php'));
  }



  if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['user'];
    $user->merge_attributes($args);
    $result = $user->save();

    if($result === true) {
      $new_id = $user->id;
      $session->message('The user was updated successfully.');
      redirect_to(url_for('/user/registration/index.php?uid=' . $new_id));
    } else {
      // show errors
    }

  } else {
    // Display the form
  }
?>
<?php $page_title = 'Edit My Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Edit:   <?php echo $user->username; ?></h1>
          <p><a href='<?php echo url_for('/user/registration/index.php?uid=') . $user->id; ?>'>&laquo; Return to <i class="far fa-user-circle"></i> My Account</a></p>
          <div class='errors'>
            <?php  echo display_errors($user->errors); ?>
          </div>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='<?php echo url_for('/user/registration/edit.php?uid=' . h(u($uid))); ?>' method='post'>
              <?php include('form_fields.php'); ?>
              <input type='submit' value='edit account' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/registration/delete.php?uid=') . $user->id; ?>'><i class="far fa-trash-alt"></i> Delete Account</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
