<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php 
			include 'header.php';
			include 'database.php';
			?> 
		<div class="page-content" id="productspage">	
		<h2>Products - Categories</h2>

		<div class="categories-outer">
		<?php
			 
			$sql = "SELECT category_id, category_name, category_image FROM categories";
			$result = mysqli_query($conn,$sql);

			if ($result->num_rows > 0) {
				?>
				<?php
				$count=0;
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<div class="categoryblock">
						<img src="<?php echo $row["category_image"]; ?>">
						<h2><?php echo $row["category_name"]; ?></h2>
						<a href="productlist.php?category=<?php echo $row["category_id"];?>">View Products</a>
					</div>
					<?php
				}
				?>
				<?php
			} else {
			echo "No data found";
			}

		?>
	</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>