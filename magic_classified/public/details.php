<?php require_once('../private/initialize.php'); ?>

<?php
  // Find requested id
  $id = $_GET['id'] ?? false;
  if(!$id){
    redirect_to('listings.php');
  }
  // Find listing by id
  $listing = Listing::find_by_id($id);

  // Find Listing Photos
  $sql = "SELECT * FROM photos WHERE ";
  $sql .= "listing_id='" . $id . "'";
  $photos = Photo::find_by_sql($sql);
?>

<?php $page_title = 'Details: ' . $listing->name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1><?php echo h($listing->name); ?></h1>
          <p><a href='<?php echo url_for('/listings.php'); ?>'>&laquo; Return to <i class="fas fa-frog"></i> Listings</a></p>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>

            <dl>
              <dt>Date Posted:</dt>
              <?php $date = date_create($listing->listing_date); ?>
              <dd><?php echo date_format($date, "m/d/Y"); ?></dd>
            </dl>
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
              <dd>$<?php echo h($listing->price); ?></dd>
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
            <!-- Featured Image -->
            <div style="text-align:center">
              <h2><?php echo $listing->name; ?> Gallery</h2>
              <p>Click on the images below:</p>
            </div>

            <div class="gallery_container">
              <img id="expandedImg" style="width:100%">
            </div>

            <!-- The four columns -->
            <div class="gallery_row">

              <?php foreach($photos as $photo) {?>
              <div class="gallery_column">
                <img src="<?php echo "user_images/" . $photo->link; ?>" style="width:100%" onclick="myGallery(this);">
              </div><!-- .gallery_column -->
              <?php }?>

            </div><!-- .gallery_row -->
          </div><!-- .listing_gallery -->
        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/contact_owner.php?id=' . $listing->id); ?>'><i class="far fa-envelope"></i> Contact Owner</a></li>
            <li><a href='<?php echo url_for('/share_with_friend.php?id=' . $listing->id); ?>'><i class="fas fa-share"></i> Share With A Friend</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>


<?php include(SHARED_PATH . '/footer.php'); ?>
