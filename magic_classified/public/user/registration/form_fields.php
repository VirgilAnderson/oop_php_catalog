<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to(url_for('/user/registration/index.php'));
}
?>

<dl>
  <dt><label class='col_25' for='user[first_name]'>First Name:</label></dt>
  <dd><input class='col_75' type="text" name="user[first_name]" value="<?php echo h($user->first_name); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='user[last_name]'>Last Name:</label></dt>
  <dd><input class='col_75' type="text" name="user[last_name]" value="<?php echo h($user->last_name); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='user[username]'>Username:</label></dt>
  <dd><input class='col_75' type="text" name="user[username]" value="<?php echo h($user->username); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='user[email]'>Email:</label></dt>
  <dd><input class='col_75' type="text" name="user[email]" value="<?php echo h($user->email); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='user[password]'>Password:</label></dt>
  <dd><input class='col_75' type="password" name="user[password]" value="<?php echo h($user->password); ?>" /></dd>
</dl>

<dl>
  <dt><label class='col_25' for='user[confirm_password]'>Confirm Password:</label></dt>
  <dd><input class='col_75' type="password" name="user[confirm_password]" value="<?php echo h($user->confirm_password); ?>" /></dd>
</dl>
