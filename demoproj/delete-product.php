<?php

include 'database.php'; 

if (isset($_GET['product']) && ($_GET['product'] != "")) {
    $deleterecord = $_GET['product'];

	$sql = "DELETE FROM `products` WHERE product_id ='$deleterecord'";
	$query = mysqli_query($conn, $sql);
	header("Location: product_listing.php");
}

?>
