<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php 
			include 'adminheader.php'; 
			include 'database.php'; 
			$usermsg="";
			
			if(isset($_GET['category']) && ($_GET['category']!="")){
				$categoryid=$_GET['category'];
			}

			//get data
			$sql = "SELECT category_name, category_image FROM categories WHERE category_id='$categoryid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$categoryname=$row['category_name'];
				$categoryimage=$row['category_image'];
			}

			//update data
			if((isset($_POST['categoryname']))){
				if($_POST['categoryname']!=""){
					$name= $_POST['categoryname'];
				}else{
					$name="";
				}

				if($_FILES["categoryimage"]["name"]!=""){
					//new image

					$target_dir = "uploadscat/";
					$target_file = $target_dir . basename($_FILES["categoryimage"]["name"]);
					$uploadOk = 1;
					$fileuploaded=0;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 	
   					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			    		$uploadOk = 0;
					}
					if ($uploadOk == 1) {
    					if (move_uploaded_file($_FILES["categoryimage"]["tmp_name"], $target_file)) {
       		 				$fileuploaded=1;
    					} else {
       		 				$fileuploaded=0;
    					}
    				}
    				$newcatimage=$target_file;
				}else{
					$newcatimage=$categoryimage;
				}
			 	//update data
				$sql = "UPDATE categories SET category_name='$name',category_image='$newcatimage' WHERE category_id=$categoryid";
			    $query = mysqli_query($conn, $sql);
			    header("Location: category_listing.php");
	
		    	//close connection
	    		mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
			<h2>Edit Category</h2>
			<?php echo $usermsg;?>
			<form action="" method="post" class="formdemo" id="editproductform" enctype="multipart/form-data">
				<div class="label">Category Name: </div>
				<input type="text" name="categoryname" value="<?php echo $categoryname; ?>" required>
				<div class="imagoutrblock">
					<img class="smallimg" src="<?php echo $categoryimage; ?>">
					<div class="changeimageblock">
						<div class="label">Change Category Image: </div>
						<input type="file" name="categoryimage" >
					</div>
				</div>
				<div>
					<input type="submit" class="submitbtn" value="Edit Category"/>
				</div>
			</form>
		</section>
					<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>

	</body>
</html>