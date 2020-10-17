<?php 
	include 'core/init.php';
	Database::instance()->prepare('select * from users')->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and registration system with sms verification</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>
<body class="body">
	<div class="wrapper">
	<div class="wrapper-inner">
		<div class="header-wrapper">
			<h1>Welcome</h1>
			<h3>This is an simple Login and Registration system with Email & SMS Mobile verification</h3>			
		</div><!--HEADER WRAPPER ENDS-->
		<div class="sign-div">
		<div class="sign-in">
			<form method="POST">
			<div class="signIn-inner">
				<div class="input-div">
				<input type="email" name="email" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" name="login">Login</button>
				</div>
				<div class="error shake-horizontal">Errors shows here</div>
			</form>
			</div>
		</div>
		<div class="r-pass">
			<a href="account/recovery/">I forget my Password</a>
		</div>
		</div><!--CONTENT WRAPPER ENDS-->
		<div class="footer-wrapper">
			<div class="inner-footer-wrap">
			<div class="sign-up"><button class="sign-up-btn" onclick="location.href='account/settings';" type="submit">Sign Up</button></div>
			</div>
		</div><!--FOOTER WRAPPER ENDS-->
	</div>
	</div><!--WRAPPER ENDS-->
</body>
</html>