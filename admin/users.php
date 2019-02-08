<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){ 

	//if user id is 1 ignore
	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM users WHERE memberID = :memberID') ;
		$stmt->execute(array(':memberID' => $_GET['deluser']));

		header('Location: users.php?action=deleted');
		exit;

	}
} 

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Users</title>
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid.css" rel="stylesheet">
  <script language="JavaScript" type="text/javascript">
  function deluser(id, title){
	  if (confirm("Are you sure you want to delete '" + title + "'")){
	  	window.location.href = 'users.php?deluser=' + id;
	  }
  }
  </script>
</head>
<body>
<div class="container">
	<?php include('menu.php');?>

	<?php 
	//show message from add / edit page
	if(isset($_GET['action'])){ 
		echo '<h3>User '.$_GET['action'].'.</h3>'; 
	} 
	?>
	<div class="row menutitle" style="background-color:#999;">
        <div class="col-md-3"><h3>Username</h3></div>
        <div class="col-md-3"><h3>Email</h3></div>
        <div class="col-md-2"><h3>Role</h3></div>
    	<div class="col-md-2"><h3>Action</h3></div>
    </div>
	<?php
		try {

			$stmt = $db->query('SELECT memberID, username, email, role FROM users ORDER BY username');
			while($row = $stmt->fetch()){
				echo '<div class="row">';
					echo '<div class="col-md-3">'.$row['username'].'</div>';
					echo '<div class="col-md-3">'.$row['email'].'</div>';
					echo '<div class="col-md-2">'.$row['role'].'</div>';
					echo '<div class="col-md-2">';
				?>
					<a href="edit-user.php?id=<?php echo $row['memberID'];?>">Edit</a> 
					<?php if($row['memberID'] != 1){?>
						| <a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
					<?php } ?>
				<?php 
					echo '</div>';
				echo '</div><hr />';
			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	<br />
	<p><a href='add-user.php'>Add User</a></p>

</div>

</body>
</html>
