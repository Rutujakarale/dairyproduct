<!DOCTYPE html>
	<head>
		<title>Form Demo</title>
		<link rel="stylesheet" type="text/css" href="css/projstyle.css">
	</head>
	<body>
			<?php 
			include 'adminheader.php'; 
			include 'database.php'; 
			$usermsg="";
			
			if(isset($_GET['customer']) && ($_GET['customer']!="")){
				$custid=$_GET['customer'];
			}

			//get data
			$sql = "SELECT user_name, user_mail, user_contact FROM users WHERE user_id='$custid'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)) {
				$username=$row['user_name'];
				$usermail=$row['user_mail'];
				$usercontact=$row['user_contact'];
			}

			//update data
			if((isset($_POST['user_name']))){
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
					$contact= $_POST['user_phone'];
				}else{
					$contact="";
				}

				$sql = "UPDATE users SET user_name='$name',	user_mail='$email',user_contact='$contact' WHERE user_id=$custid";
			    $query = mysqli_query($conn, $sql);
			    header("Location: customers_listing.php");
	
		    	//close connection
	    		mysqli_close($conn);

		}

		if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
		<section class="page-content admin-page-content">
			<h2>Edit Customer</h2>
			<?php echo $usermsg;?>

			<form action="" method="post" class="formdemo" id="editproductform" >
				<div class="label">Name: </div>
				<input type="text" name="user_name" value="<?php echo $username; ?>" required>
				<div class="label">Email: </div>
				<input type="email" name="user_email" value="<?php echo $usermail; ?>" required>
				<div class="label">Contact No: </div>
				<input type="text" name="user_phone" value="<?php echo $usercontact;?>" required>
				<div>
					<input type="submit" class="submitbtn" value="Edit Customer"/>
				</div>
			</form>
		</section>
					<?php }else{
		echo "<h1>You don't have rights to access this page..</h1>";
	} ?>
<?php include 'footer.php'; ?>

	</body>
</html>