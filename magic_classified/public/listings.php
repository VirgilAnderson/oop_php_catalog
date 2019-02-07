<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Magic Listings'; ?>
<?php include(SHARED_PATH . '/side_nav.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1><i class="fas fa-frog"></i> Newest Listings</h1>
      <p>Check out all the newest magic listings here</p>
      <p>Contact the listing owner and you can buy your magical treasure or create an account to list your own used gear!</p>
      <p><span class='sidenav_button' style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Categories</span></p>
      <p>Page 3 of 10</p>

      <table id="magic_listings">
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Condition</th>
          <th>Price</th>
          <th>Location</th>
        </tr>
        <?php $listings = Listing::find_all(); ?>
        <?php foreach($listings as $listing) { ?>

        <tr>
          <td><?php echo h($listing->name); ?></td>
          <td><?php echo h($listing->category); ?></td>
          <td><?php echo h($listing->condition()); ?></td>
          <td><?php echo h($listing->price); ?></td>
          <td><?php echo h($listing->location); ?></td>
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
