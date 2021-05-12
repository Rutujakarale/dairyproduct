<!DOCTYPE html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
	<?php 
		include 'header.php';
		include 'database.php';
	?>
		<?php
		$usermsg="";
		if((isset($_POST['user_name']))){
			//to fetch data
			if($_POST['user_name']!=""){
				$name= $_POST['user_name'];
			}else{
				$name="";
			}
			if($_POST['user_email']!=""){
				$email= $_POST['user_email'];
			}else{
				$email="";
			}
			if($_POST['user_phone']!=""){
				$contactno= $_POST['user_phone'];
			}else{
				$contactno="";
			}
			if($_POST['user_username']!=""){
				$username= $_POST['user_username'];
			}else{
				$username="";
			}
			if($_POST['user_password']!=""){
				$password= $_POST['user_password'];
			}else{
				$password="";
			}
		    $current_date_time = date("Y-m-d_H-i-s");

		 	//insert query
		 	$sql = "INSERT INTO `users`(`user_name`,`user_mail`,`user_contact`,`user_username`,`user_password`,`registered_on`) VALUES('" . $name . "','" . $email . "','" . $contactno . "','" . $username . "','" . $password . "','".$current_date_time."')";
		    $query = mysqli_query($conn, $sql);
		    if($query){
		    	$usermsg="You have registered successfully. Please login to your account.";
		    }else{
		    	$usermsg="Something went wrong";		    	
		    }
		    //close connection
	    	mysqli_close($conn);
		}

		?>
		<section class="page-content" id="register_page">
			<h2>Register</h2>
			<?php
			if($usermsg!=""){ 
				echo '<h3 class="usermsg">'.$usermsg.'<h3>';
			}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="formdemo" id="registerform">
				<div class="label">Name: </div>
				<input type="text" name="user_name" required>
				<div class="label">Email: </div>
				<input type="email" name="user_email" required>
				<div class="label">Contact No: </div>
				<input type="text" name="user_phone" required>
				<div class="label">Username: </div>
				<input type="text" name="user_username" required>
				<div class="label">Password: </div>
				<input type="password" name="user_password" required>
				<div>
					<input type="submit" class="submitbtn" value="Register"/>
				</div>
			</form>
		</section>
					<?php include 'footer.php'; ?>
	</body>
</html>