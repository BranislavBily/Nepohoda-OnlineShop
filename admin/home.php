<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="image">
		<a href="home.php"><img src="../images/logo1.png" style="width: 15%;margin: 10px 42.5% 0px 42.5%"></a>
	</div>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" name="logout" style="color: #ff3838;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
						<a href="delete_user.php"> - delete user</a>
						<a href="create_product.php"> + add product</a>
						<a href="delete_product.php"> - delete product</a>
						<a href="../search.php"> search products</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
		
</body>
</html>