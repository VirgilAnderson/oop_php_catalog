<?php require_once('../../../private/initialize.php'); ?>

<?php

  // Make Sure Logged In
  require_login();

  // Make sure ID is set
  $uid = $_SESSION['user_id'];
  if(!isset($uid)) {
    redirect_to(url_for('/user/account_listings/index.php'));
  }

  // Get ID
  $id = $_GET['uid'];
  $user = User::find_by_id($id);
  if($user == false) {
    redirect_to(url_for('/user/registration/index.php'));
  }

  // If Post Request Delete Listing or else display form
  if(is_post_request()) {
    // Delete
    $result = $user->delete();
    //$session->message('The account was successfully deleted.');
    $session->logout();
    redirect_to(url_for('/user/registration/index.php'));

  } else {
    // Display Form

  }
?>
<?php $page_title = 'Delete '. $user->username; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Delete:   <?php echo $user->username; ?></h1>
          <p><a href='<?php echo url_for('/user/registration/index.php?uid=') . $user->id; ?>'>&laquo; Return to <i class="far fa-user-circle"></i> My Account</a></p>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='<?php echo url_for('/user/registration/delete.php?uid=' . h(u($id))); ?>' method='post'>
              <h2>Are you sure you want to delete <?php echo $user->username;?>?</h2>
              <input type='submit' value='Delete account' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/registration/edit.php?uid=') . $user->id; ?>'><i class="fas fa-edit"></i> Edit Account</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
