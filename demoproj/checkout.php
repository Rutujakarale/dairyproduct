<!DOCTYPE html>
	<head>
		<title>My Cart</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
		<?php 
		include 'header.php';
		include 'database.php';
		?> 
		<div class="page-content" id="checkoutpage">	
			<h2>Checkout Page</h2>
			<?php
					if((isset($_POST['cus_id']))){
			//to fetch data
			if($_POST['cus_id']!=""){
				$custid= $_POST['cus_id'];
			}
			if($_POST['shipping_address']!=""){
				$shippingaddress= $_POST['shipping_address'];
			}
			if($_POST['paymentmethod']!=""){
				$paymentmethod= $_POST['paymentmethod'];
			}
			if($_POST['order_total']!=""){
				$ordertotal= $_POST['order_total'];				
			}
		    $order_date = date("Y-m-d_H-i-s");
		    $order_status = "In Progress";

		 	//insert query
		 	$sql = "INSERT INTO `order_details`(`customer_id`,`order_total`,`order_payment_method`,`shipping_address`,`order_date`,`order_status`) VALUES('" . $custid . "','" . $ordertotal . "','" . $paymentmethod . "','" . $shippingaddress . "','" . $order_date . "','".$order_status."')";
		    $query = mysqli_query($conn, $sql);

		    if($query){
		    	$orderid= mysqli_insert_id($conn);
				foreach($_SESSION['cart'] as $key => $value){
					$prid=$key;
					$quantity=$value['quantity'];
				 	$sql1 = "INSERT INTO `order_products`(`order_id`,`product_id`,`product_qty`) VALUES('" . $orderid . "','" . $prid . "','" . $quantity . "')";
				    $query1 = mysqli_query($conn, $sql1);
				}
				unset($_SESSION['cart']);
				header('location:my-orders.php');
			}else{
		    	$usermsg="Something went wrong";		    	
		    }
		    //close connection
	    	mysqli_close($conn);
		}

			if(isset($_SESSION['login']) && ($_SESSION['login']==true)){
			$currentuserid=$_SESSION['session_userid'];
			//get details of loggedin user
			$sql = "SELECT user_name, user_mail, user_contact FROM users WHERE user_id='$currentuserid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$username=$row['user_name'];
				$usermail=$row['user_mail'];
				$usercontact=$row['user_contact'];
			}

			if(isset($_POST['ordersubmit']) && $_POST['ordersubmit']=="ordersubmit"){
			if(!empty($_SESSION['cart'])){ ?>
				<form method="post" action="" id="checkoutform">
				<div class="Shipping_block">
					<h3>Order Details</h3>
					<hr>
					<div class="label">Name: </div>
					<input type="text" name="user_name" value="<?php echo $username;?>" readonly>
					<div class="label">Email: </div>
					<input type="email" name="user_email" value="<?php echo $usermail; ?>" readonly>
					<div class="label">Contact No: </div>
					<input type="text" name="user_phone" value="<?php echo $usercontact; ?>"   readonly>
					<div class="label">Shipping Address: </div>
					<textarea name="shipping_address" rows="3" required></textarea>
					<div class="label">Payment Details: </div>
					<input type="radio" name="paymentmethod" value="cod" checked>Cash On Delivery
				</div>
				<div class="products_block">
					<h3>Your Order</h3>
					<hr>
					<table class="carttable" border="1">
					<thead>
						<tr>
							<th class="cart-product-name item">Product Name</th>
							<th class="cart-sub-total item">Price</th>
							<th class="cart-qty item">Quantity</th>
							<th class="cart-total last-item">Sub Total</th>
						</tr>
					</thead>
					<tbody>
 					<?php
 					$idarr=array();
 					$totalprice=0;
					foreach($_SESSION['cart'] as $key => $value){
						$totalprice+=($value['price']*$value['quantity']);
						$idarr[]=$key;
					}
					$idstring=implode(',',$idarr);

    				$sql = "SELECT * FROM products WHERE product_id IN($idstring)";
					$result = mysqli_query($conn,$sql);
					if(!empty($result)){
						while($row = mysqli_fetch_assoc($result)) {
							$productid=$row['product_id'];
							$productname=$row['product_title'];
							$productprice=$row['product_price'];
							$productqty=$_SESSION['cart'] [$productid]['quantity'];
						?>

						<tr>
							<td class="cart-product-name-info">
								<h3 class="name"><?php echo $row['product_title']; ?></h3>
							</td>
							<td class="cart-product-price">
								<div class="prod_price">Rs.<?php echo $productprice; ?></div>
		            		</td>
							<td class="cart-product-quantity">
								<div class="prod_qty"><?php echo $productqty;?></div>
		            		</td>
							<td class="cart-product-subtotal">
								<div class="prod_price_subtotal">Rs. <?php echo $productprice*$productqty; ?></div>
		            		</td>
						</tr>

					<?php 	
						}
				 	}
					?>					
					</tbody><!-- /tbody -->
					<tfoot>
						<tr>
							<td colspan="4">
								<strong>Grant Total : <?php echo $totalprice;?></strong>
							</td>
						</tr>
					</tfoot>
				</table>
				</div>
				<div  class="checkoutbtn">
					<input type="hidden" name="cus_id" value="<?php echo $currentuserid; ?>">
					<input type="hidden" name="order_total" value="<?php echo $totalprice;?>">
					<input type="submit" class="submitbtn" value="place order"</a> 
					
				</div>

			</form>
			<?php } else {
			echo "<h2>Your shopping Cart is empty !!</h2>";
		}
	}else{
			echo "<h2>Please Go to shopping cart !!</h2>";		
	}
}else{
			echo "<h2>Please Login first !!</h2>";		

}
		?>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>