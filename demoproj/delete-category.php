<?php

include 'database.php'; 

if (isset($_GET['category']) && ($_GET['category'] != "")) {
    $deleterecord = $_GET['category'];

	$sql = "DELETE FROM `categories` WHERE category_id ='$deleterecord'";
	$query = mysqli_query($conn, $sql);
	header("Location: category_listing.php");
}

?>
