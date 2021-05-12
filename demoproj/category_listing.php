<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php include 'adminheader.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<div class="page-content">	
		<h2>Categories</h2>

		<?php
			include 'database.php'; 
			$sql = "SELECT category_id, category_name, category_image FROM categories";
			$result = mysqli_query($conn,$sql);

			if ($result->num_rows > 0) {
				?>
				<table border="1" class="productlisting">
					<tr>
						<th>Sr No.</th>
						<th>Category</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				<?php
				$count=0;
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo ++$count;?></td>
						<td><?php echo $row["category_name"]; ?></td>
						<td><img class="smallimg" src="<?php echo $row["category_image"]; ?>"></td>
						<td>
							<div><a href="edit-category.php?category=<?php echo $row["category_id"];?>" class="btn">Edit</a></div>
							<div><a href="delete-category.php?category=<?php echo $row["category_id"];?>" class="btn">Delete</a></div>
						</td>
					</tr>
					<?php
				}
				?>
				</table>
				<?php
			} else {
			echo "No data found";
			}

		?>
		</div>
			<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>
<?php include 'footer.php'; ?>

	</body>
</html>