<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'My Listings'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1>Newest Listings</h1>
      <img src='images/DSC_0065RT.jpg' alt='magic listings' width='100px' style='float: left; margin: 0 5px 5px 0; border-radius: 50%;'>
      <p>Check out all the newest magic listings here</p>
      <p>Contact the listing owner and you can buy your magical treasure or create an account to list your own used gear!</p>
      <p>Page 3 of 10</p>

      <table id="magic_listings">
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Description</th>
          <th>Price</th>
          <th>Details</th>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
        <tr>
          <td>This one</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td><a href='details.php'>View</a></td>
        </tr>
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
