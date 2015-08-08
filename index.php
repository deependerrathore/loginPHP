<?php 
require_once 'core/init.php';
DB::getInstance()->query("Select username from users where username =?",array("deepak"));
