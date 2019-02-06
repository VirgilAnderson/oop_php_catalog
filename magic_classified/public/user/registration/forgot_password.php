<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Edit My Account'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Forgot My Password</h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form>
              <dl>
                <dt><label for='email'>Email Address:</label></dt>
                <dd><input type="text" name="email" value="" /></dd>
              </dl>
              <input type='submit' value='Forgot Password' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/login.php'); ?>'>Login</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
