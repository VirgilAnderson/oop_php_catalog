<?php require_once('../../../private/initialize.php'); ?>
<?php
  $uid = $_SESSION['user_id']; // PHP > 7.0
  $cat = $_GET['cat'] ?? NULL;
  $user = User::find_by_id($uid);
  if(!isset($uid)) {
    redirect_to(url_for('/user/login.php'));
  }

  // Find all listings
  //  $listings = Listing::find_all();
  // Use pagination instead
    $current_page = $_GET['page'] ?? 1;
    $per_page = 15;
    $total_count = Listing::count_all_user_listings($uid);


    $pagination = new Pagination($current_page, $per_page, $total_count);

    $sql = "SELECT * FROM listings ";
    $sql .= "WHERE user_id={$uid} ";
    $sql .= "ORDER BY id DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()} ";
    $listings = Listing::find_by_sql($sql);

    $total_pages = $pagination->total_pages();

?>
<?php $page_title = 'My Listings'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1><i class="fas fa-dove"></i> My Listings</h1>
      <p>Check out all your magic listings here</p>
      <p id='add_listing'><a href='new.php'><i class="fas fa-plus-circle"></i> New Listing</a></p>
        <p>Page <?php echo $current_page; ?> of <?php echo $total_pages; ?></p>

      <table id="magic_listings">
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Location</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach($listings as $listing) { ?>

        <tr>
          <td><?php echo h($listing->name); ?></td>
          <td><?php echo '$' . h($listing->price); ?></td>
          <td><?php echo h($listing->location); ?></td>
          <td><a href="details.php?id=<?php echo $listing->id; ?>">View</a></td>
        </tr>
        <?php } ?>
      </table>
      <div class='pagination'>

        <?php
          if($total_pages > 1) {
            echo "<div class=\"pagination\">";

            $url = url_for('/user/account_listings/index.php');

            echo $pagination->previous_link($url, $cat);
            echo $pagination->number_links($url, $cat);
            echo $pagination->next_link($url, $cat);


            echo "</div>";
          }
        ?>
      </div>
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
