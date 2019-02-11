<?php require_once('../../../private/initialize.php'); ?>

<?php
  if(is_post_request()) {

    // Create record using post parameters
    $args =  $_POST['user'];
    $user = new User($args);
    $result = $user->save();

    if($result === true) {
      $new_id = $user->id;
      $_SESSION['message'] = 'The account was created successfully.';
      redirect_to(url_for('/user/registration/index.php?uid=' . $new_id));
    } else {
      // show errors
    }

  } else {
    // display the form
    $user = new User;
  }

?>
<?php $page_title = 'Create New Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Create New Account</h1>
          <div class='errors'>
            <?php  echo display_errors($user->errors); ?>
          </div>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='<?php echo url_for('/user/registration/new.php'); ?>' method='post'>
              <?php include('form_fields.php'); ?>
              <input type='submit' value='New account' />
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
