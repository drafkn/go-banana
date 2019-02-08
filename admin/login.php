<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="login">
    <a href="../index.php"><<< Back</a>
        <?php
        if(isset($_POST['submit'])){
    
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            
            if($user->login($username,$password)){ 
                //logged in return to index page
                header('Location: index.php');
                exit;
            } else {
                $message = '<p class="error">Wrong username or password</p>';
            }
    
        }//end if submit
        if(isset($message)){ echo $message; }
        ?>
        <form action="" method="post">
        <div class="row">
        	<div class="col-md-3"></div>
	        <div class="col-md-1"><label>Username</label></div>
            <div class="col-md-4"><input type="text" name="username" value=""  /></div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
        	<div class="col-md-3"></div>
	        <div class="col-md-1"><label>Password</label></div>
            <div class="col-md-4"><input type="password" name="password" value=""  /></div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
        	<div class="col-md-3"></div>
	        <div class="col-md-1"></div>
            <div class="col-md-4"><input type="submit" name="submit" value="Login"  /></div>
        	<div class="col-md-3"></div>
        </div>    
        </form>
    </div>
</div>
</body>
</html>
