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
					<?php if(isset($_SESSION['login']) && $_SESSION['login']==true){ ?>
					<span>Welcome <?php echo $_SESSION['session_username'];?></span> | 
					<a href="logout.php" >Logout</a>
				<?php }else { ?>
					<a href="register.php" >Register</a> |
					<a href="login.php" >Login</a>
				<?php } ?>
				</div>
			</div>
		</div>
		<div class="main-header">
			<ul class="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
			<div class="top-cart-row">
			<?php
			if(!empty($_SESSION['cart'])){
				$prtotalprice=0;
				$idarr=array();
				foreach($_SESSION['cart'] as $key => $value){
					$prtotalprice+=($value['price']*$value['quantity']);
					$idarr[]=$key;
				}
				$idstring=implode(',',$idarr);
				?>
				<div class="cart-outer">
					<div class="dropdown-cart" onclick="displaycartfull();">
						<div class="items-cart-inner">
							<span class="lbl">Cart - Rs. <?php echo $prtotalprice;?></span>
							<img src="images/shopping-cart.png">
		    			</div>
					</div>
					<div class="cart-summary" id="cartfull">
					<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
	
					$conn = new mysqli($servername, $username, $password);
					mysqli_select_db($conn, "phpdemo");	

    				$sql = "SELECT * FROM products WHERE product_id IN($idstring)";
					$result = mysqli_query($conn,$sql);
					if(!empty($result)){
						while($row = mysqli_fetch_assoc($result)) {
							$productid=$row['product_id'];
							$productimg=$row['product_image'];
							$productname=$row['product_title'];
							$productprice=$row['product_price'];
							$productqty=$_SESSION['cart'] [$productid]['quantity'];
							?>
								<div class="productrow">
									<img class="smallimg" src="<?php echo $productimg; ?>">
									<div class="proddetails">
										<h3 class="name"><?php echo $row['product_title']; ?></h3>
										<div class="price">Rs.<?php echo $productprice; ?> * <?php echo $productqty;?></div>
									</div>

								</div>
								<hr>
					<?php 
					} 
				}?>





						<div class="cart-total">
							<span class="text">Total :</span>
							<span class='price'>Rs. <?php echo $prtotalprice;?></span>					
							<hr>
							<a href="my-cart.php" class="btn btn-primary">My Cart</a>	
						</div>									
					</div>
				</div>
			<?php
			}else { 
				// if no product in cart
				?>
				<div class="cart-outer">
					<div class="dropdown-cart" onclick="displaycartempty();">
						<div class="items-cart-inner">
							<span class="lbl">Cart - Rs. 00.00</span>
							<img src="images/shopping-cart.png">
		    			</div>
					</div>
					<div class="cart-summary" id="cartempty">
						Your Shopping Cart is Empty.
						<hr>
						<a href="products.php" class="btn btn-primary">Continue Shooping</a>	
					</div>
				</div>
			<?php 
			}
			?>
		</div>
	</div>
	<script>
		function displaycartempty(){
			document.getElementById('cartempty').style.display="block";
			document.getElementById('cartfull').style.display="none";
		}
		function displaycartfull(){
			document.getElementById('cartfull').style.display="block";
			document.getElementById('cartempty').style.display="none";
		}
	</script>
</header>
