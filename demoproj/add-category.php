<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php include 'adminheader.php'; ?>
		<?php
		$usermsg="";
		if((isset($_POST['catgoryname']))){
			//to fetch data
			if($_POST['catgoryname']!=""){
				$name= $_POST['catgoryname'];
			}else{
				$name="";
			}
			
			include 'database.php'; 

			$target_dir = "uploadscat/";
			$target_file = $target_dir . basename($_FILES["catgoryimage"]["name"]);
			$uploadOk = 1;
			$fileuploaded=0;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 	
   			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			    $uploadOk = 0;
			}
			if ($uploadOk == 1) {
    			if (move_uploaded_file($_FILES["catgoryimage"]["tmp_name"], $target_file)) {
       		 		$fileuploaded=1;
    			} else {
       		 		$fileuploaded=0;
    			}
    		}
    		if($fileuploaded==1){
    			$catgoryimage=$target_file;
    		}
    		else{
    			$catgoryimage="";	
    		}
		 	//insert query
		 	 $sql = "INSERT INTO `categories`(`category_name`,`category_image`) VALUES('" . $name . "','" . $catgoryimage . "')";
		    $query = mysqli_query($conn, $sql);
		    if($query){
		    	$usermsg="Category added successfully";
		    }else{
		    	$usermsg="Something went wrong";		    	
		    }
	
		    //close connection
	    	mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
			<h2>Add Category</h2>
			<?php echo $usermsg;?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="formdemo" id="addproductform" enctype="multipart/form-data">
				<div class="label">Category Name: </div>
				<input type="text" name="catgoryname" required>
				<div class="label">Category Image: </div>				
				<input type="file" name="catgoryimage" required>
				<div>
					<input type="submit" class="submitbtn" value="Add Category"/>
				</div>
			</form>
		</section>
	<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>
	<?php include 'footer.php'; ?>

	</body>
</html>