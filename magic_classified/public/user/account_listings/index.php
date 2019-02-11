<?php require_once('../../../private/initialize.php'); ?>
<?php
  $uid = $_GET['uid']; // PHP > 7.0
  $user = User::find_by_id($uid);
  if(!isset($uid)) {
    redirect_to(url_for('/user/registration/new.php'));
  }
  $listings = Listing::find_all();

?>
<?php $page_title = 'My Listings'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1><i class="fas fa-dove"></i> My Listings</h1>
      <p>Check out all your magic listings here</p>
      <p><a href='new.php'><i class="fas fa-plus-circle"></i> New Listing</a></p>
      <p>Page 3 of 10</p>

      <table id="magic_listings">
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Location</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach($listings as $listing) { ?>

        <tr>
          <td><?php echo h($listing->name); ?></td>
          <td><?php echo h($listing->category); ?></td>
          <td><?php echo '$' . h($listing->price); ?></td>
          <td><?php echo h($listing->location); ?></td>
          <td><a href="details.php?id=<?php echo $listing->id; ?>?uid=<?php echo $user->id; ?>">View</a></td>
        </tr>
        <?php } ?>
      </table>
      <div class='pagination'>
        <p><< 1 2 <strong>3</strong> 4 5 6 7 8 9 10 >></p>
      </div>
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
