<?php 
require_once 'core/init.php';

$user = DB::getInstance()->insert('users',array(
	'username' =>'Indu',
	'password' => 'password',
	'salt' => 'salt'
	));

//This will successfully insert the new record