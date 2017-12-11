<?php

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username' => array('required' => true),
				'password' => array('required' => true)
			));

			if($validation->passed()) {
				$user = new User();

				$remember = (Input::get('remember')) ? true : false;
				$login = $user->login(Input::get('username'), Input::get('password'), $remember);

				if($login) { 
					Redirect::to('index.php');
				}

			} else {
				foreach($validation->errors() as $error) {

				}
			}
		}
	}

?>

<style type="text/css">
body {
	background: linear-gradient(to right, #a0b4bd 0%,#bbced5 50%);
	background-image: url('img/bg.jpeg') !important;
	background-repeat: no-repeat;
	background-position: bottom;
	background-size: cover;
	background-attachment: fixed;
}

#login-panel {
	margin-top: 5%;
}
</style>




    <div class="container-fluid center">
    	<div class="row" id="login-panel">
    


      <h5 class="teal-text">Please, login into your account</h5>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' id='username' autocomplete="off" />
                <label for='username'>Enter your Username</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' autocomplete="off" />
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Forgot Password?</b></a>
							</label>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
              	<input type="checkbox" class="filled-in" name="remember" id="filled-in-box"/>
      			<label for="filled-in-box">Remember Me</label>
              </div>
            </div>

            <br />
            <center>
              <div class='row'>
              	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect teal darken-4'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      </div>
</div>
