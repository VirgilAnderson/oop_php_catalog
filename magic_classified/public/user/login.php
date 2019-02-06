<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h2>Login to My Account</h2>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form>
              <dl>
                <dt><label for='username'>Username:</label></dt>
                <dd><input type="text" name="username" value="" /></dd>
              </dl>
              <dl>
                <dt><label for='password'>Password:</label></dt>
                <dd><input type="text" name="password" value="" /></dd>
              </dl>
              <input type='submit' value='Login' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <li><a href='<?php echo url_for('/user/registration/forgot_password.php'); ?>'>Forgot my Password</a></li>
            <li><a href='<?php echo url_for('/user/registration/new.php'); ?>'>Create Account</a></li>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>

  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
