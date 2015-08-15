<?php 

 ?>

<form action="" method="POST">
	<div class="field">
		<label for="password_current">Current Password</label>
		<input type="password" name="password_current" id="password_current">
	</div>
	<div class="field">
		<label for="password_new">New Password</label>
		<input type="password" name="password_new" id="password_new">
	</div>
	<div class="field">
		<label for="password_new_again">Current Password</label>
		<input type="password" name="password_new_again" id="password_new_again">
	</div>
	<input type="submit" value="Change">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>