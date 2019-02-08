<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($listing)) {
  redirect_to(url_for('/user/account_listings/index.php'));
}
?>

<dl>
  <dt><label for='name'>Name:</label></dt>
  <dd><input type="text" name="name" value="<?php echo h($listing->name); ?>" /></dd>
</dl>

<dl>
  <dt><label for='description'>Description:</label></dt>
  <dd><textarea name="description" rows="5" cols="50"><?php echo h($listing->description); ?></textarea></dd>
</dl>

<dl>
  <dt><label for='category'>Category:</label></dt>
  <dd>
    <select name="category">
    <?php foreach(Listing::CATEGORIES as $category) { ?>
      <option value="<?php echo $category; ?>" <?php if($listing->category == $category) { echo 'selected'; } ?>><?php echo $category; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for='price'>Price:</label></dt>
  <dd>$ <input type="text" name="price" size="18" value="<?php echo h($listing->price); ?>" /></dd>
</dl>

<dl>
  <dt><label for='manufacturer'>Manufacturer:</label></dt>
  <dd><input type="text" name="manufacturer" value="<?php echo h($listing->manufacturer); ?>" /></dd>
</dl>

<dl>
  <dt><label for='condition_id'>Condition:</label></dt>
  <dd>
    <select name="condition_id">
      <option value="<?php echo $listing->condition(); ?>"></option>
      <?php foreach(Listing::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
      <option value="<?php echo $cond_id; ?>"<?php if($listing->condition_id == $cond_id) {echo 'selected'; }?>><?php echo $cond_name; ?></option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for='location'>Location:</label></dt>
  <dd><input type="text" name="location" value="<?php echo h($listing->location); ?>" /></dd>
</dl>
