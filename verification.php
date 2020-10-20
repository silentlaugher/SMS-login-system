<?php 
   include 'core/init.php';
   $user_id = $_SESSION['user_id'];
   $user = $userObj->userData($user_id);

   if(isset($_POST['email'])){
        $link = Verify::generateLink();
        $message = "{$user->firstName}, Your account has been created. Please vist this link to verify your account allowing you site access : <a href='http://localhost/SMSlogin/verification/{$link}'>Verify Link</a>";
        $verifyObj->sendToMail($user->email, $message);
        $userObj->insert('verification', array('user_id' => $user_id, 'code' => $link));
        $userObj->redirect('verification?mail=sent');
   }

   if(isset($_GET['verify'])){
    $code = Validate::escape($_GET['verify']);
    $verify = $verifyObj->verifyCode($code);

    if($verify){
        if(date('Y-m-d', strtotime($verify->createdAt)) < date('Y-m-d')){
            $errors['verify'] = "Your verification link has expired";
        }else{
            $userObj->update('verification',array('status' => '1'), array('user_id' => $user_id,'code' => $code));
            $userObj->redirect('home.php');
        }
    }else{
        $errors['verify'] = "Invalid verification link";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Login Verification Page</title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>
<body class="body2">
<div class="p2-wrapper">
	<div class="sign-up-wrapper">
		<div class="sign-up-inner">
			<div class="sign-up-div">
				<div class="name">
				<?php 
					if(isset($_GET['verify']) || !empty($_GET['verify'])){
						if(isset($errors['verify'])){
							echo '<h4>'.$errors['verify'].'</h4>';
						}
					}else{
				?>
				<h4>Your account has been created, you need to activate your account by one of the following methods:</h4>
				<fieldset>
				<legend>Method 1</legend>
				<?php if(isset($_GET['mail'])):?>
					<h4>A verification email has been sent to your email, please check your email to verify your account</h4>
				<?php else:?>
					<h3>Email verificaiton</h3>
					<form method="post">
					<input type="email"  placeholder="<?php echo $user->email;?>" value="<?php echo $user->email;?>" />
	 				<button type="submit" name="email" class="suc">Send me verification email</button>
					</form>
			   <?php endif;?>
				</fieldset>
				</div>
 				<!-- Email error field -->
 				<?php if(isset($errors['email'])):?>
				 <span class="error-in"><b><?php echo $errors['email'];?></b></span>
			    <?php endif;?>
				<fieldset>
					<legend>Method 2</legend>
				<div>
					<h3>Phone verificaiton</h3>
					<form method="POST">
					<input type="tel" name="number" placeholder="Enter your Phone number"/>
						<button type="submit" name="phone" class="suc">Send verification code via SMS</button>
					</form>
				</div>
 				</fieldset>
 				<!-- Phone error field -->
				<?php if(isset($errors['phone'])):?>
				 <span class="error-in"><b><?php echo $errors['phone'];?></b></span>
			    <?php endif;?>
			</div>
			<?php }?>
		</div>
	</div>
</div><!--WRAPPER ENDS-->
</body>
</html>
>