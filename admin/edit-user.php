<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Edit User</title>
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="login">
        <?php include('menu.php');?>
        <p><a href="users.php">User Admin Index</a></p>
        <h2>Edit User</h2>
        <?php
        if(isset($_POST['submit'])){
            extract($_POST);
            if($username ==''){
                $error[] = 'Please enter the username.';
            }
            if( strlen($password) > 0){
                if($password ==''){
                    $error[] = 'Please enter the password.';
                }
                if($passwordConfirm ==''){
                    $error[] = 'Please confirm the password.';
                }
                if($password != $passwordConfirm){
                    $error[] = 'Passwords do not match.';
                }
            }
            if($email ==''){
                $error[] = 'Please enter the email address.';
            }
            if(!isset($error)){
                try {
                    if(isset($password)){
                        $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
                        $stmt = $db->prepare('UPDATE users SET username = :username, password = :password, email = :email, role = :role WHERE memberID = :memberID') ;
                        $stmt->execute(array(
                            ':username' => $username,
                            ':password' => $hashedpassword,
                            ':email' => $email,
							':role' => $role,
                            ':memberID' => $memberID
                        ));
                    } else {
                        $stmt = $db->prepare('UPDATE users SET username = :username, email = :email, role = :role WHERE memberID = :memberID') ;
                        $stmt->execute(array(
                            ':username' => $username,
                            ':email' => $email,
							':role' => $role,
                            ':memberID' => $memberID
                        ));
                    }
                    header('Location: users.php?action=updated');
                    exit;
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        if(isset($error)){
            foreach($error as $error){
                echo $error.'<br />';
            }
        }
            try {
                $stmt = $db->prepare('SELECT memberID, username, email, role FROM users WHERE memberID = :memberID') ;
                $stmt->execute(array(':memberID' => $_GET['id']));
                $row = $stmt->fetch(); 
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>
       
        <form action='' method='post'>
        	<input type='hidden' name='memberID' value='<?php echo $row['memberID'];?>'>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Username</label></div>
                <div class="col-md-4"><input type='text' name='username' value='<?php echo $row['username'];?>'></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>New Password</label></div>
                <div class="col-md-4"><input type='password' name='password' value=''></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Confirm Password</label></div>
                <div class="col-md-4"><input type='password' name='passwordConfirm' value=''></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Email</label></div>
                <div class="col-md-4"><input type='text' name='email' value='<?php echo $row['email'];?>'></div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"><label>Role</label></div>
                <div class="col-md-4">
                	<select required class="role" id="role" name="role" >	
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-1"></div>
                <div class="col-md-4"><input type='submit' name='submit' value='Update User'></div>
                <div class="col-md-3"></div>
            </div> 
	 </form>

</div>

</body>
</html>	
