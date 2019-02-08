<?php require_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="grid.css" rel="stylesheet">
	<!-- by: Kenneth F. Melicado Feb 2019 -->
</head>
<body>
<style>
a.links {
	font-weight:bold;
	padding:10px;
}
</style>
    <div class="container">
		<h1>Blog</h1>
        <?php include('main_menu.php');?>
		<hr />
		<div class="row">
		<?php

			try {
				
				$limit = 10;
				$query = "SELECT * FROM blog_posts";
				
				$s = $db->prepare($query);
				$s->execute();
				$total_results = $s->rowCount();
				$total_pages = ceil($total_results/$limit);
				
				if (!isset($_GET['page'])) {
					$page = 1;
				} else{
					$page = $_GET['page'];
				}
				
				$starting_limit = ($page-1)*$limit;
				$show  = "SELECT * FROM blog_posts ORDER BY postID DESC LIMIT $starting_limit, $limit";
				
				$r = $db->prepare($show);
				$r->execute();
				
				for ($page=1; $page <= $total_pages ; $page++):?>
					<a href='<?php echo "?page=$page"; ?>' class="links"><?php  echo $page; ?></a>
				<?php endfor; ?>
				
				<?php
				// blog post query start
				$stmt = $db->query('SELECT postID, postTitle, postDesc, fileuploaded, postDate FROM blog_posts ORDER BY postID DESC ');
				//while($row = $stmt->fetch()){
				while($row = $r->fetch()){
					
					echo '<div class="col-md-12">';
						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						if(!empty($row['fileuploaded'])){
							echo '<p><img class="img-responsive" style="height:auto !important;" src="admin/uploads/'.$row['fileuploaded'].'"></p>';
						}
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div><hr />';

				}
				
				for ($page=1; $page <= $total_pages ; $page++):?>
					<a href='<?php echo "?page=$page"; ?>' class="links"><?php  echo $page; ?></a>
				<?php endfor; ?>
				
			<?php
			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>
		</div>
	</div>        
</body>
</html>