<?php

include 'database.php'; 

if (isset($_GET['customer']) && ($_GET['customer'] != "")) {
    $deleterecord = $_GET['customer'];

	$sql = "DELETE FROM `users` WHERE user_id ='$deleterecord'";
	$query = mysqli_query($conn, $sql);
	header("Location: customers_listing.php");
}

?>
