<dl>
  <dt><label for='name'>Name:</label></dt>
  <dd><input type="text" name="name" value="" /></dd>
</dl>

<dl>
  <dt><label for='description'>Description:</label></dt>
  <dd><textarea name="description" rows="5" cols="50"></textarea></dd>
</dl>

<dl>
  <dt><label for='category'>Category:</label></dt>
  <dd>
    <select name="category">
      <option value=""></option>
      <?php foreach(Listing::CATEGORIES as $category) { ?>
      <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for='price'>Price:</label></dt>
  <dd>$ <input type="text" name="price" size="18" value="" /></dd>
</dl>

<dl>
  <dt><label for='manufacturer'>Manufacturer:</label></dt>
  <dd><input type="text" name="manufacturer" value="" /></dd>
</dl>

<dl>
  <dt><label for='condition_id'>Condition:</label></dt>
  <dd>
    <select name="condition_id">
      <option value=""></option>
      <?php foreach(Listing::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
      <option value="<?php echo $cond_id; ?>"><?php echo $cond_name; ?></option>
      <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for='location'>Location:</label></dt>
  <dd><input type="text" name="location" value="" /></dd>
</dl>
