<?php 
	include 'config.php';
	include 'classes/PHPMailer.php';	
	include 'classes/SMTP.php';	
	include 'classes/Exception.php';
	//add your local time zone below	
	date_default_timezone_set('America/New_York');
   	//autoload
	spl_autoload_register(function($class){
		require_once "classes/{$class}.php";
	});

	$userObj   = new Users;
	$verifyObj = new Verify;
  	//session
	session_start();
 ?>