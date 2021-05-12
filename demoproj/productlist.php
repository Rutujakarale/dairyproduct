<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php 
			include 'header.php';
			include 'database.php';
			if(isset($_GET['action']) && $_GET['action']=="add"){
				$id=intval($_GET['id']);
				if(isset($_SESSION['cart'][$id])){
					$_SESSION['cart'][$id]['quantity']++;
					header('location:my-cart.php');
				}else{
					$sql="SELECT * FROM products WHERE product_id=$id";
					$result=mysqli_query($conn,$sql);
					if($result->num_rows>0){
						while($row = mysqli_fetch_assoc($result)) {
							$_SESSION['cart'][$row['product_id']]=array(
								"quantity" => 1,
								"price" => $row['product_price']);

						}
						header('location:my-cart.php');
					}else{
						$message="Product ID is invalid";
					}
				}
			}


			if(isset($_GET['category']) && ($_GET['category']!="")){
				$categoryid=$_GET['category'];
			}
			//get category details
			$sql = "SELECT category_name, category_image FROM categories WHERE category_id='$categoryid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$categoryname=$row['category_name'];
				$categoryimage=$row['category_image'];
			}
// get product details

			$sql = "SELECT product_id, product_title,product_desc,product_price,product_image,product_stock FROM products WHERE category_id='$categoryid'";
			$productresults = mysqli_query($conn,$sql);

			?> 
		<div class="page-content" id="productspage">	
		<h2><?php echo $categoryname;?></h2>
		<?php if($productresults->num_rows>0){ ?>	
		<div class="products-outer">
				<?php
				$count=0;
				while($row = mysqli_fetch_assoc($productresults)) {
					?>
					<div class="productblock">
						<a href="product-details.php?product=<?php echo $row['product_id'];?>">
						<img src="<?php echo $row["product_image"]; ?>"></a>
						<h2><a href="product-details.php?product=<?php echo $row['product_id'];?>">
						<?php echo $row["product_title"]; ?></a></h2>
						<div class="productprice">Rs. <?php echo $row["product_price"]; ?></div>
						<a href="productlist.php?page=product&action=add&id=<?php echo $row['product_id']; ?>">
						<button class="btn btn-primary" type="button">Add to cart</button></a>
					</div>
					<?php
				}
			?>
	</div>
<?php } else { echo "<h2>No products found in this category...</h2>";} ?>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>