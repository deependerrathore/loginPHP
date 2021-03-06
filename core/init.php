<?php

session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host'=>'127.0.0.1',
		'username' =>'root',
		'password' => 'root',
		'db' => 'loginphp'
		),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 864000
		),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
		)
	);

//Auto load the classes

spl_autoload_register(function($class){
	require_once 'classes/'. $class . '.php';
});

require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session',array('hash','=',$hash));

	if($hashCheck->count()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();

	}
}