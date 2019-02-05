<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <h1>Newest Listings</h2>
        <table id="magic_listings">
          <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
          </tr>

          <tr>
            <td>Name</td>
            <td>Category</td>
            <td>Description</td>
            <td>Price</td>
          </tr>

        </table>
  </article>

  <aside class='column'>Column</aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
