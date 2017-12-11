<?php
	require_once('core/init.php');

	$user = new User();

	if(!$user->isLoggedIn()) {
		Redirect::to('index.php');
	}

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'current-password' => array(
					'required' => true
				),
				'new-password' => array(
					'required' => true,
					'min' => 8
				),
				'new-password-confirm' => array(
					'required' => true,
					'min' => 8,
					'matches' => 'new-password'
				)
			));

			if ($validation->passed()) {

				if(Hash::make(Input::get('current-password'), $user->data()->vSalt) !== $user->data()->vPassword) {

				} else {
					$salt = Hash::salt(32);
					$user->update(array(
						'vPassword' => Hash::make(Input::get('new-password'), $salt),
						'vSalt' => $salt
					));

					Session::flash('home', 'Your password has been changed!');
					Redirect::to('index.php');
				}

			} else {
				foreach($validaton->errors() as $error) {
					echo $error . "<br/>";
				}
			}
		}
	}
?>

<form action="" method="post">
	
	<div class="field">
		<label for="current-password">Current Password</label>
		<input type="password" name="current-password" id="current-password">
	</div>

	<div class="field">
		<label for="new-password">Password</label>
		<input type="password" name="new-password" id="new-password">
	</div>

	<div class="field">
		<label for="new-password-confirm">Confirm Password</label>
		<input type="password" name="new-password-confirm" id="new-password-confirm">
	</div>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" name="Change">

</form>