<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		array_push($errros, "You must log in first");
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class="image">
		<a href="admin/home.php"><img src="images/logo3.png" style="width: 15%;margin: 10px 42.5% 0px 42.5%"></a>
	</div>
	<div class="header">
		<div class="text">
			<h2>Home Page</h2>
		</div>	
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
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
			<img src="images/user_profile.png">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
						<a href="search.php" style="margin-left: 5px"> Search products </a>
						<a href="searchCategory.php" style="margin-left: 5px"> Search Category </a>
					</small>

				<?php endif ?>
			</div>
			
		</div>
	</div>
</body>
</html>