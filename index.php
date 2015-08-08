<?php 
require_once 'core/init.php';

$user = DB::getInstance()->update('users',3,array(
	'password' => 'new password',
	'salt' =>'new salt'
	));

//This will successfully insert the new record