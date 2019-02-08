<?php require('includes/config.php'); 

$stmt = $db->prepare('SELECT postID, postTitle, postCont, fileuploaded, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="grid.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<h1>Blog</h1>
		<hr />
		<p><a href="./">Blog Index</a></p>
		<?php	
			echo '<div>';
				echo '<h1>'.$row['postTitle'].'</h1>';
				echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
				if(!empty($row['fileuploaded'])){
					echo '<p><img class="img-responsive" style="height:auto !important;" src="admin/uploads/'.$row['fileuploaded'].'"></p>';
				}
				echo '<p>'.$row['postCont'].'</p>';				
			echo '</div><hr />';
		?>
	</div>
</body>
</html>