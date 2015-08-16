<?php 
	require_once 'core/init.php';
	if(Input::exists()){
		if(Token::check(Input::get('token'))){
			$validate = new Validate();
			$validation = $validate->check($_POST,array(
				'username' => array('required' =>true),
				'password' => array('required' =>true)
				));

			if($validation->passed()){
				$user = new User();

				$remember = (Input::get('remember') === 'on') ? true : false;
				$login = $user->login(Input::get('username'),Input::get('password'),$remember);

				if($login){
					Redirect::to('index.php');
				}else{
					echo 'Sorry login failed';
				}
			}else{
				foreach ($validation->errors() as $error) {
					echo '<label class="alert-box alert radius">'. $error . '</label><br>';
				}
			}
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , intial-scale=1.0 , maximum-scale=1.0">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/normalize.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/foundation.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/app-screen.css" media="screen">
	
</head>
<body id="login">
	<form action="" method="POST">
		<div class="field">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" autocomplete="off">
		</div>
		<div class="field">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" autocomplete="off">
		</div>
		<div class="field">
			<label for="remember">
				<input type="checkbox" name="remember" id="remember">Remember me
			</label>
		</div>
		<input type="hidden" name="token" value="<?php echo Token::generate();?>">
		<input type="submit" class="button" value="Log in">
		<a href="register.php" class="button">Go for Registration</a>

	</form>
</body>
</html>
	