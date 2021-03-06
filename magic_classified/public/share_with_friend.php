<?php require_once('../private/initialize.php'); ?>

<?php
  // Find requested id
  $id = $_GET['id'] ?? false;
  if(!$id){
  //  redirect_to('listings.php');
  }
  // Find listing by id
  $listing = Listing::find_by_id($id);
  $listing_owner = $listing->user_id;
  $listing_owner = User::find_by_id($listing_owner);
  $email_to=$_POST['email_to'];

  $errors = [];
  $missing = [];
  if (isset($_POST['send'])) {
      $expected = ['body', 'return_email', 'email_to', 'listing_link'];
      $required = ['body', 'return_email', 'email_to', 'listing_link'];
      $to = $email_to;
      $subject = $listing->name;
      $headers = [];
      $headers[] = 'From: webmaster@the-magic-exchange.com';
      $headers[] = 'Content-type: text/plain; charset=utf-8';
      $authorized = null;
      require_once('../private/email_validation.php');
      if($mailSent) {
        header('Location: thanks.php?id=' . $id);
        exit;
      }
  }
?>
<?php $page_title = 'Share: ' . $listing->name; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<main class='row'>
  <aside class='column'><?php include(SHARED_PATH . '/sidebar.php'); ?></aside>

  <article class='column listings'>
      <div class="listing_details">
        <div class='listing_title'>
          <h1>Share: <?php echo $listing->name; ?></h1>
          <p><a href="<?php echo url_for('details.php?id=' . $id); ?>">&laquo; Return to Listing</a></p>

          <?php
            // Output Email Errors
            if ($_POST && $suspect) {
              echo "<p class='errors'>Sorry, your mail couldn't be sent.</p>";
            } elseif($errors || $missing) {
                echo "<p class='errors'>Please fix item(s) indicated</p>";
            }
          ?>
        </div><!-- .listing_title -->

        <div class='listing_body'>
          <div class='listing_info'>
            <form action='<?php echo url_for('share_with_friend.php?id=' . $id); ?>' method='post'>

              <dl>
                <dt><label class='col_25' for="email_to">Send To:
                  <?php
                    if($missing && in_array('email_to', $missing)) {
                      echo "<span class='errors'>Please tell us where to send.</span>";
                    }
                   ?>
                </label></dt>
                <dd><input class='col_75' type="email_to"
                  <?php
                    if($errors || $missing) {
                      echo 'value="' . ent($email_to) . '"';
                    }
                  ?>

                  name="email_to"/></dd>
              </dl>


              <dl>
                <dt><label class='col_25' for="body">Body:
                  <?php
                    if($missing && in_array('body', $missing)) {
                      echo "<span class='errors'>Please fill in the body.</span>";
                    }
                   ?>
                </label></dt>
                <dd><textarea id='body' name="body" class='col_75'><?php if($errors || $missing){echo ent($body);}?></textarea></dd>
              </dl>

              <dl>
                <dt><label class='col_25' for="return_email">Return Email Address:
                  <?php
                    if($missing && in_array('return_email', $missing)) {
                      echo "<span class='errors'>Please enter a return email.</span>";
                    } elseif(isset($errors['return_email'])) {
                      echo "<span class='errors'>Invalid email address.</span>";
                    }
                   ?>
                </label></dt>
                <dd><input class='col_75' type="email"
                  <?php
                    if($errors || $missing) {
                      echo 'value="' . ent($return_email) . '"';
                    } elseif($session->is_logged_in()) {
                        echo 'value="' . ent($session->email) . '"';
                    }
                  ?>

                  name="return_email"/></dd>
              </dl>


              <dl>
                <dt><label class='col_25' for='listing_link'>Listing Link:</label></dt>
                <dd>
                  <select class='col_75' name='listing_link'>
                    <option value='http://www.the-magic-exchange.com/public/details.php?id=<?php echo $id; ?>' selected>http://www.the-magic-exchange.com/public/details.php?id=<?php echo $id; ?></option>
                  </select>
                </dd>
              </dl>

              <input type="submit" name="send" id="send" value='Share Listing' />
            </form>
          </div><!-- .listing_info -->

        </div><!--listing_body -->
        <div class='listing_footer'>
          <ul class='footer_menu'>
            <?php if(!$session->is_logged_in()) { ?>
            <li><a href='<?php echo url_for('/user/login.php'); ?>'>Login</a></li>
            <?php } ?>
          </ul>
        </div><!-- listing_footer -->
      </div><!-- listing_details -->
  </article>
  <aside class='column'>
      <?php include(SHARED_PATH . '/advertisements.php'); ?>
  </aside>

</main>



<?php include(SHARED_PATH . '/footer.php'); ?>
