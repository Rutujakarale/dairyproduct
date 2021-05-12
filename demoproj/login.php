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
		if((isset($_POST['user_username']))){
			//to fetch data
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
		 	$sql = "SELECT * FROM users WHERE user_username = '" . $username . "' AND user_password = '" . $password . "' ";

		    $query = mysqli_query($conn, $sql);
		    if($query->num_rows==1){
		        $row = mysqli_fetch_assoc($query);
		        $_SESSION['login'] = true;
		        $_SESSION['session_userid'] = $row['user_id'];
		        $_SESSION['session_username'] = $row['user_name'];
		        header("Location:index.php");
		    }else{
		    	$usermsg="Enter Correct Username and Password";		    	
		    }
	
		    //close connection
	    	mysqli_close($conn);

		}

		?>
		<section class="page-content" id="register_page">
			<h2>Login</h2>
			<?php
			if($usermsg!=""){ 
				echo '<h3 class="usermsg">'.$usermsg.'<h3>';
			}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="formdemo" id="loginform">
				<div class="label">Username: </div>
				<input type="text" name="user_username" required>
				<div class="label">Password: </div>
				<input type="password" name="user_password" required>
				<div>
					<input type="submit" class="submitbtn" value="Sign In"/>
				</div>
			</form>
		</section>
					<?php include 'footer.php'; ?>
	</body>
</html>