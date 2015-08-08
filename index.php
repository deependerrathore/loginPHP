<?php 
require_once 'core/init.php';

//$user = DB::getInstance()->query("select * from users");
$user = DB::getInstance()->get('users',array('username','=','deepak'));

if(!$user->count()){
	echo 'No user';
}else{
	echo 'Ok!';
}