<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php include 'adminheader.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<div class="page-content">	
		<h2>Products</h2>

		<?php
			include 'database.php'; 
		    // fetch data
			//$sql = "SELECT product_id, product_title, product_desc,product_image,product_stock,product_price FROM products";
			$sql = "SELECT product_id,category_name, product_title, product_desc,product_image,product_stock,product_price FROM products,categories WHERE products.category_id=categories.category_id";
			
			$result = mysqli_query($conn,$sql);

			//var_dump($result);

			//display data
			if ($result->num_rows > 0) {
				// output data of each row
				?>
				<table border="1" class="productlisting">
					<tr>
						<th>Title</th>
						<th>Category</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Image</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				<?php
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["product_title"]; ?></td>
						<td><?php echo $row["category_name"]; ?></td>
						<td><?php echo $row["product_price"]; ?></td>
						<td><?php echo $row["product_stock"]; ?></td>
						<td><img class="smallimg" src="<?php echo $row["product_image"]; ?>"></td>
						<td><?php echo $row["product_desc"]; ?></td>
						<td>
							<div><a href="edit-product.php?product=<?php echo $row["product_id"];?>" class="btn">Edit</a></div>
							<div><a href="delete-product.php?product=<?php echo $row["product_id"];?>" class="btn">Delete</a></div>
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