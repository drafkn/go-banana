<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){ 

	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
} 

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid.css" rel="stylesheet">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title){
	  if (confirm("Are you sure you want to delete '" + title + "'")){
	  	window.location.href = 'index.php?delpost=' + id;
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
            echo '<h3>Post '.$_GET['action'].'.</h3>'; 
        } 
        ?>
   		<div class="row menutitle" style="background-color:#999;">
        	<div class="col-md-6"><h3>Title</h3></div>
            <div class="col-md-2"><h3>Date</h3></div>
            <div class="col-md-2"><h3>Action</h3></div>
        </div>	     

            <?php
                try {
                    //$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
					if($_SESSION['role'] == 'User'){
						$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts WHERE memberID = '.$_SESSION['memberID'].' ORDER BY postID DESC');
					}else{
						$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
					}
					
                    while($row = $stmt->fetch()){
                        if($row){
						echo '<div class="row">';
							echo '<div class="col-md-6">'.$row['postTitle'].'</div>';
							echo '<div class="col-md-2">'.date('jS M Y', strtotime($row['postDate'])).'</div>';
							echo '<div class="col-md-2">';
							?>
								<a href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> | 
								<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
							<?php 
							echo '</div>';
						echo '</div><hr />';
						}else{
							echo 'no post';
						}
                    }
					
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            ?>
    	<br />
        <p><a href='add-post.php'>Add Post</a></p>
	</div>
</body>
</html>
