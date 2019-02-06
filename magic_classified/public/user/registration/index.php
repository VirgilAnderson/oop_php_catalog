<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'My Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Listing Name</h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <p>Name: blank</p>
            <p>Description: blank</p>
            <p>Category: blank</p>
            <p>Price: blank</p>
            <p>Manufacturer: blank</p>
            <p>Condition: blank</p>
            <p>Location: blank</p>
          </div><!-- .listing_info -->
          <div class='listing_gallery'>
            <div class='row'>
              <div class='column featured'>Img 0</div>
            </div>
            <div class='row'>
              <div class='column thumb'>Img 1</div>
              <div class='column thumb'>Img 2</div>
              <div class='column thumb'>Img 3</div>
              <div class='column thumb'>Img 4</div>
            </div>
          </div><!-- .listing_gallery -->
        </div><!--listing_body -->
        <div class='listing_footer'>
          <p>Listing Footer</p>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>Column</aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
