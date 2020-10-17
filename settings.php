<?php 
    include 'core/init.php';
    $user_id = $_SESSION['user_id'];
    $user = $userObj->userData($user_id);

    if(isset($_POST['update'])){
        $required = array('firstName','lastName','username','email','password');
        foreach($_POST as $key => $value){
            if(empty($value) && in_array($key, $required)){
                $errors['allFields'] = "All fields are required";
                break;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Login Settings Page</title>
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>
<body class="body2">
<div class="home-nav">
	<a href="<?php echo BASE_URL;?>home.php">Home</a>
</div>
<div class="p2-wrapper">
	<div class="sign-up-wrapper">
		<div class="sign-up-inner">
			<div class="sign-up-div">
			  <form method="POST">
				<div class="name">
				<h3>Change Name</h3>
				<input type="text" name="firstName" placeholder="First Name" value="<?php echo Validate::escape($user->firstName);?>"/>
				<input type="text" name="lastName" placeholder="Last Name" value="<?php echo Validate::escape($user->lastName);?>"/>
				</div>
				<!-- Name Error -->
				<?php if(isset($errors['names'])):?>
				 <span class="error-in"><?php echo $errors['names'];?></span>
			    <?php endif;?>
				<div>
				<h3>Change User Name</h3>
				<input type="text" name="username" placeholder="UserName" value="<?php echo Validate::escape($user->username);?>"/>
 				</div>
				<!-- Username Error -->
				<?php if(isset($errors['username'])):?>
				 <span class="error-in"><?php echo $errors['username'];?></span>
			    <?php endif;?>
				<div>
				<h3>Change Email</h3>
				<input type="email" name="email" placeholder="Email" value="<?php echo Validate::escape($user->email);?>"/>
				<!-- Email Error -->
				<?php if(isset($errors['email'])):?>
				 <span class="error-in"><?php echo $errors['email'];?></span>
			    <?php endif;?>	
				</div>


				<div>
				<h3>Enter your password to update your account</h3>
				<input type="password" name="password" placeholder="Password"/>
				
				<!-- Password Errors -->
				<?php if(isset($errors['password'])):?>
				 <span class="error-in"><?php echo $errors['password'];?></span>
			    <?php endif;?>	
				</div>

				<!-- Required Fields Errors -->
				<?php if(isset($errors['allFields'])):?>
 				 <span class="error-in"><?php echo $errors['allFields'];?></span>
				<?php endif;?>
				<div class="btn-div">
				<button value="sign-up" name="update">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div><!--WRAPPER ENDS-->
</body>
</html>
