<?php 
	include 'config.php';
	include 'classes/PHPMailer.php';	
	include 'classes/SMTP.php';	
	include 'classes/Exception.php';
   	//autoload
	spl_autoload_register(function($class){
		require_once "classes/{$class}.php";
	});

	$userObj = new Users;

  	//session
	session_start();
 ?>