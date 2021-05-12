<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php include 'adminheader.php'; 
		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<div class="page-content">	
		<h2>Customers</h2>

		<?php
			include 'database.php'; 
			$sql = "SELECT user_id, user_name, user_mail,user_contact,registered_on FROM users";
			$result = mysqli_query($conn,$sql);

			if ($result->num_rows > 0) {
				?>
				<table border="1" class="productlisting">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Contact No.</th>
						<th>Registered On</th>
						<th>Action</th>
					</tr>
				<?php
				while($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["user_name"]; ?></td>
						<td><?php echo $row["user_mail"]; ?></td>
						<td><?php echo $row["user_contact"]; ?></td>
						<td><?php echo $row["registered_on"]; ?></td>
						<td>
							<div><a href="edit-customer.php?customer=<?php echo $row["user_id"];?>" class="btn">Edit</a></div>
							<div><a href="delete-customer.php?customer=<?php echo $row["user_id"];?>" class="btn">Delete</a></div>
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