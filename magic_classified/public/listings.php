<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1>Newest Listings</h1>
      <img src='images/DSC_0065RT.jpg' alt='magic listings' width='100px' style='float: left; margin: 0 5px 5px 0; border-radius: 50%;'>
      <p>Check out all the newest magic listings here</p>
      <p>Contact the listing owner and you can buy your magical treasure or create an account to list your own used gear!</p>

      <table id="magic_listings">
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Description</th>
          <th>Price</th>
          <th>View</th>
        </tr>
        <tr>
          <td>Name</td>
          <td>Category</td>
          <td>Description</td>
          <td>Price</td>
          <td>Details</td>
        </tr>
      </table>
  </article>

  <aside class='column'>Column</aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
