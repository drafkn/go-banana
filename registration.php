<?php require_once('/includes/config.php'); ?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registration Form Page</title>
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="grid.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="login">
    	<a href="index.php"><<< Back</a>
        <center><h2>Registration Form</h2></center>
        <?php
        //if form has been submitted process it
        if(isset($_POST['submit'])){
            extract($_POST);
            //very basic validation
            if($username ==''){
                $error[] = 'Please enter the username.';
            }
            if($password ==''){
                $error[] = 'Please enter the password.';
            }
            if($passwordConfirm ==''){
                $error[] = 'Please confirm the password.';
            }
            if($password != $passwordConfirm){
                $error[] = 'Passwords do not match.';
            }
            if($email ==''){
                $error[] = 'Please enter the email address.';
            }else if($email !=''){
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					//
				} else {
					$error[] = 'invalid email address';
				}
			}
            if(!isset($error)){
                $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
                try {
                    $stmt = $db->prepare('INSERT INTO users (username,password,email,role) VALUES (:username, :password, :email, :role)') ;
                    $stmt->execute(array(
                        ':username' => $username,
                        ':password' => $hashedpassword,
                        ':email' => $email,
						':role' => 'User'
                    ));
                    header('Location: admin/login.php?action=added');
                    exit;
    
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }

        if(isset($error)){
            foreach($error as $error){
                echo '<p class="error">'.$error.'</p>';
            }
        }
        ?>
        <form action='' method='post'>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Username</label></div>
                <div class="col-md-4"><input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Password</label></div>
                <div class="col-md-4"><input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Confirm Password</label></div>
                <div class="col-md-4"><input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Email</label></div>
                <div class="col-md-4"><input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"></div>
                <div class="col-md-4"><input type='submit' name='submit' value='Add User'></div>
                <div class="col-md-3"></div>
            </div> 
	 </form>
    </div>
</div>
</body>
</html>