<?php require_once('../../../private/initialize.php'); ?>

<?php

  // Find all users
  $uid = $_GET['uid']; // PHP > 7.0
  if(!isset($uid)) {
    redirect_to(url_for('/user/registration/new.php'));
  }
  $user = User::find_by_id($uid);

?>

<?php $page_title = 'Show User: ' . h($user->username); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1><i class="far fa-user-circle"></i> My Account: <?php echo h($user->username); ?></h1>
          <p><a href='<?php echo url_for('/user/account_listings/new.php?uid=') . $user->id; ?>'><i class="fas fa-plus-circle"></i> New Listing</a></p>
          <p><a href='<?php echo url_for('/user/account_listings/index.php?uid=') . $user->id; ?>'> <i class="fas fa-dove"></i> My Listings</a></p>
        </div><!-- .listing_title -->
        <div class='listing_body'>
          <div class='listing_info'>
            <dl>
              <dt>First Name:</dt>
              <dd><?php echo h($user->first_name); ?></dd>
            </dl>
            <dl>
              <dt>Last Name:</dt>
              <dd><?php echo h($user->last_name); ?></dd>
            </dl>
            <dl>
              <dt>Username:</dt>
              <dd><?php echo h($user->username); ?></dd>
            </dl>
            <dl>
              <dt>Email:</dt>
              <dd><?php echo h($user->email); ?></dd>
            </dl>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/registration/edit.php?uid=') . $user->id; ?>'><i class="fas fa-edit"></i> Edit Account</a></li>
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
