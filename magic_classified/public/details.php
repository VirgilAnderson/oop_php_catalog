<?php require_once('../private/initialize.php'); ?>

<?php
  // Find requested id
  $id = $_GET['id'] ?? false;
  if(!$id){
    redirect_to('listings.php');
  }
  // Find listing by id
  $listing = Listing::find_by_id($id);
?>

<?php $page_title = 'Details'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2><i class="fas fa-frog"></i> <?php echo h($listing->name); ?></h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <dl>
              <dt>Description:</dt>
              <dd><?php echo h($listing->description); ?></dd>
            </dl>
            <dl>
              <dt>Category:</dt>
              <dd><?php echo h($listing->category); ?></dd>
            </dl>
            <dl>
              <dt>Price:</dt>
              <dd><?php echo h($listing->price); ?></dd>
            </dl>
            <dl>
              <dt>Manufacturer:</dt>
              <dd><?php echo h($listing->manufacturer); ?></dd>
            </dl>
            <dl>
              <dt>Condition:</dt>
              <dd><?php echo h($listing->condition()); ?></dd>
            </dl>
            <dl>
              <dt>Location:</dt>
              <dd><?php echo h($listing->location); ?></dd>
            </dl>
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
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/contact_owner.php'); ?>'><i class="far fa-envelope"></i> Contact Owner</a></li>
            <li><a href='<?php echo url_for('/listings.php'); ?>'><i class="fas fa-frog"></i> Listings</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
