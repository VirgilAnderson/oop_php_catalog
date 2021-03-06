<?php require_once('../private/initialize.php'); ?>

<?php
  $cat = $_GET['cat'] ?? NULL;
  $search = $_GET['search'] ?? NULL;

  // Find all listings
  //  $listings = Listing::find_all();
  // Use pagination instead
    $current_page = $_GET['page'] ?? 1;
    $per_page = 8;
    $total_count = Listing::count_all();
    if(!is_null($cat)){
      // If category selection
      $total_count = Listing::count_all_in_category($cat);
    } elseif (!is_null($search)) {
      // If search
      $total_count = Listing::count_all_in_search($search);
    }



    $pagination = new Pagination($current_page, $per_page, $total_count);

    $sql = "SELECT * FROM listings ";
    if(!is_null($cat)){
      $sql .= "WHERE category='{$cat}' ";
    } elseif(!is_null($search)) {
      $sql .= " WHERE name LIKE '%{$search}%' OR ";
      $sql .= "description LIKE '%{$search}%' OR ";
      $sql .= "location LIKE '%{$search}%'";
    }
    $sql .= "ORDER BY id DESC ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()} ";
    $listings = Listing::find_by_sql($sql);

    $total_pages = $pagination->total_pages();

?>

<?php $page_title = 'Magic Listings'; ?>
<?php include(SHARED_PATH . '/side_nav.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1><i class="fas fa-frog"></i> Newest Listings</h1>
      <h2><?php echo $cat; ?></h2>
      <?php if(isset($search)) {
        echo "<h2>Search: " . $search . "</h2>";
      }  ?>
      <p>Check out all the newest magic listings here</p>
      <p>Contact the listing owner and you can buy your magical treasure</a>
      <p id='add_listing'><a href='<?php echo url_for('user/registration/new.php'); ?>'>Create a FREE account</a> to sell your new or used gear!</p>
      <p><span class='sidenav_button' style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Categories</span></p>
      <p>Page <?php echo $current_page; ?> of <?php echo $total_pages; ?></p>

      <table id="magic_listings">
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Image</th>
          <th>&nbsp;</th>
        </tr>


        <?php foreach($listings as $listing) {?>
          <?php
          // Find Listing Photos
          $photo = Photo::find_by_listing_id($listing->id);
          ?>
        <tr>
          <td><?php echo h($listing->name); ?></td>
          <td><?php echo '$' . h($listing->price); ?></td>
          <?php if($photo != false) { ?>
            <td><img src="<?php echo "user_images/" . $photo->link; ?>" style="width:50px; height:50px;"></td>
          <?php } else { echo "<td></td>"; } ?>
          <td><a href="details.php?id=<?php echo $listing->id; ?>">Details...</a></td>
        </tr>
        <?php } ?>
      </table>

      <div class='pagination'>

        <?php
          if($total_pages > 1) {
            echo "<div class=\"pagination\">";

            $url = url_for('/listings.php');

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
