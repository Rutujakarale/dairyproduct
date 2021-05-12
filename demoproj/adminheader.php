<?php
	session_start();
?>
	<header>
		<div class="top-header">
			<div class="logo">
				<h2>Dairy Products</h2>
			</div>
			<div class="contact">
				<a href="mailto:info@test.com" target="_blank">Email : info@test.com</a> |
				<a href="tel:9890989809" target="_blank">Contact No : 9890989809</a>
				<div class="head_links">
					<?php if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
					<span>Welcome <?php echo $_SESSION['session_systemuser_name'];?></span> |
					<a href="logout.php">Logout</a>

				<?php }?>
				</div>
			</div>
		</div>
					<?php if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<ul class="nav">
			<li><a href="category_listing.php">Categories</a></li>
			<li><a href="add-category.php">Add Category</a></li>
			<li><a href="product_listing.php">Products</a></li>
			<li><a href="add-product.php">Add Product</a></li>
			<li><a href="customers_listing.php">Customers</a></li>
			<li><a href="manage-orders.php">Orders</a></li>
			
		</ul>
	<?php }?>
	</header>
