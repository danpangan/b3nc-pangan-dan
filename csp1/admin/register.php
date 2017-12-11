<?php
	require_once('core/init.php');

	if(Input::exists()) {

		if(Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username' => array(
					'required' => true,
					'min' => 4,
					'max' => 20,
					'unique' => 'users'
				),
				'password' => array(
					'required' => true,
					'min' => 8
				),
				'password-confirm' => array(
					'required' => true,
					'matches' => 'password'
				),
				'name' => array(
					'required' => true,
					'min' => 8,
					'max' => 50
				)
			));

			if($validation->passed()) {
				

				$user = new User;

				$salt = Hash::salt(32);

				try {

					$user->create(array(
						'vUsername' => Input::get('username'),
						'vPassword' => Hash::make(Input::get('password'), $salt),
						'vSalt' 	=> $salt,
						'vName' 	=> Input::get('name'),
						'dtJoined' 	=> date('Y-m-d H:i:s'),
						'iGroup' 	=> 1
					));

					/*Session::flash('home','Your registered successfully!');*/
					/*Redirect::to('index.php');*/
					/*header('Location: index.php');*/
					echo "<script>window.location='index.php?page=user-settings'</script>";

				} catch(Exception $e) {
					die($e->getMessage());
				}

			} else {
				//print_r($validation->errors());
			}
		}
	}
?>
<div class="container">
	<h3>Create New User</h3>
	<div class="row">
		<div class="col s12 m8 offset-m2 center">
			<div class="card">
				<form action="" method="post">
					<div class="card-content">
						<span class="card-title">Add User Form</span>
						<div class="row">
							<div class="input-field col s12">
								<input class="validate" type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" data-length="20">
								<label for="username">Username</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input class="validate" type="password" name="password" id="password".>
								<label for="password">Password</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input class="validate" type="password" name="password-confirm" id="password-confirm">
								<label for="password-confirm">Confirm Password</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input class="validate" type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" data-length="50">
								<label for="name">Name</label>
							</div>
						</div>
					</div>

					<div class="card-action">
						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
						<button class="btn" type="submit" name="register">
							<i class="material-icons">save</i>
							Create User
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>