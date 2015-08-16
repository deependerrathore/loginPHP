<?php 
date_default_timezone_set('Asia/Calcutta');
require_once 'core/init.php';

if(Input::exists()){
	//echo $_POST['username'] === Input::get('username');
	if(Token::check(Input::get('token'))){
		//echo "I am not running"; if url is like this http://localhost/loginPHP/register.php?username=deepe
		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'username' => array(
				'required' => true,
				'min' => 2,
				'max' => 20,
				'unique' => 'users'
				),
			'password' => array(
				'required' => true,
				'min' => 5
				),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'
				),
			'name' => array(
				'required' => true,
				'min' => 2,
				'max'=>50
				)
			));

		if($validation->passed()){
			$user = new User();

			$salt = Hash::salt(32);
			
			try{

				$user->create(array(
					'username' =>Input::get('username'),
					'password' => Hash::make(Input::get('password'),$salt),
					'salt' =>$salt,
					'name' =>Input::get('name'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1

					));
				Session::flash('home','You have been registered and can now login!');
				Redirect::to('login.php');

			}catch(Expception $e){
				die($e->getMessage());
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
<body id="register">

	<form action="" method="POST">
		<div class="field">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">	
		</div>
		<div class="field">
			<label for="password">Choose a password</label>
			<input type="password" name="password" id="password">
		</div>
		<div class="field">
			<label for="password again">Enter your password again</label>
			<input type="password" name="password_again" id="password_again">
		</div>
		<div class="field">
			<label for="name"> Your Name</label>
			<input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>">	
		</div>
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<input type="submit" class="button" value="Register">
		<a href="login.php" class="button">Go for LogIn</a>
	</form>
</body>
</html>
	
