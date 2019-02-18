<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($listing)) {
  redirect_to(url_for('/user/account_listings/index.php'));
}
?>

<dl>
  <dt><label class='col_25' for='listing[name]'>Name:</label></dt>
  <dd><input class='col_75' type="text" name="listing[name]" value="<?php echo h($listing->name); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[phone_number]'>Phone Number:</label></dt>
  <dd><input class='col_75' type="text" name="listing[phone_number]" value="<?php echo h($listing->phone_number); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[description]'>Description:</label></dt>
  <dd><textarea id='body' class='col_75' name="listing[description]"><?php echo h($listing->description); ?></textarea></dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[category]'>Category:</label></dt>
  <dd>
    <select class='col_75' name="listing[category]">
    <?php foreach(Listing::CATEGORIES as $magic_category) { ?>
      <option value="<?php echo $magic_category; ?>" <?php if($listing->category == $magic_category) { echo 'selected'; } ?>><?php echo $magic_category; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[price]'>Price:</label></dt>
  <dd><input class='col_75' type="text" name="listing[price]" size="18" value="<?php echo h($listing->price); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[manufacturer]'>Manufacturer:</label></dt>
  <dd><input class='col_75' type="text" name="listing[manufacturer]" value="<?php echo h($listing->manufacturer); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[condition_id]'>Condition:</label></dt>
  <dd>
    <select class='col_75' name="listing[condition_id]">
      <option value="<?php echo $listing->condition(); ?>"></option>
      <?php foreach(Listing::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
      <option value="<?php echo $cond_id; ?>"<?php if($listing->condition_id == $cond_id) {echo 'selected'; }?>><?php echo $cond_name; ?></option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[location]'>Location:</label></dt>
  <dd><input class='col_75' type="text" name="listing[location]" value="<?php echo h($listing->location); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[user_id]'>Owner:</label></dt>
  <dd>
    <select class='col_75' name='listing[user_id]'>
      <option value='<?php echo $_SESSION['user_id']; ?>' selected><?php echo $_SESSION['username']; ?></option>
    </select>
  </dd>
</dl>

<dl>
  <dt><label class='col_25' for='listing[listing_date]'>Listing Date:</label></dt>
  <dd>
    <select class='col_75' name='listing[listing_date]'>
      <option value='<?php
        if($listing->listing_date) {
          echo $listing->listing_date;
        } else {
          echo date("Y/m/d");
        }
        ?>' selected><?php
        if($listing->listing_date) {
          echo "$listing->listing_date";
        } else {
          echo date("Y/m/d");
        }
        ?></option>
    </select>

  </dd>
</dl>
