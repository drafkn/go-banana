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
  <title>Admin - Edit Post</title>
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid.css" rel="stylesheet">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>
<div class="container">
	<?php include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>
	<h2>Edit Post</h2>
	<?php 
	//if form has been submitted process it
	if(isset($_POST['submit'])){
		$_POST = array_map( 'stripslashes', $_POST );
		extract($_POST);
		//very basic validation
		if($postID ==''){
			$error[] = 'This post is missing a valid id!.';
		}
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}
		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}
		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}
		
		if(!isset($error)){
			if(($_FILES["fileToUpload"]["error"] == 4) && ($fileuploadedval == '')){
				$uploadfilename = '';
			}else if(($_FILES["fileToUpload"]["error"] == 4) && ($fileuploadedval != '')){
				$uploadfilename = $fileuploadedval;
			}else{
			// upload image start
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$uploadfilename = $_FILES['fileToUpload']['name'];
				
				// Check if image file is a actual image or fake image
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
				
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}
				
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}	
			
			
				// upload image end
			
			
			try {
				$stmt = $db->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont, fileuploaded = :fileuploaded WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':fileuploaded' => $uploadfilename,
					':postID' => $postID
				));
				header('Location: index.php?action=updated');
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
			$stmt = $db->prepare('SELECT postID, postTitle, postDesc, postCont, fileuploaded FROM blog_posts WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch(); 
		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
		
		
	?>

	<form action='' method='post' enctype="multipart/form-data">
		<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>
		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>
		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo $row['postDesc'];?></textarea></p>
		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo $row['postCont'];?></textarea></p>
		<p><label>Upload Featured Image</label><br /> <?php echo $row['fileuploaded']; ?>
        <input type='hidden' name="fileuploadedval" id="fileuploadedval" value="<?php echo $row['fileuploaded']; ?>">
		<input type='file' name='fileToUpload' id="fileToUpload" ></p>
		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>

</body>
</html>	
