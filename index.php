<?php 
require_once 'core/init.php';

if(Session::exists('home')){
	echo '<p>' .Session::flash('home') . '<p>';
}

$user = new User();


if($user->isLoggedIn()){
	include 'includes/homeiflogined.php';
	if($user->hasPermission('admin')){
		echo '<p>You are an Adminstrator!</p>';
	}

}else{
	include 'includes/homeifnotlogined.php';
}
