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
	<title>Admin - Delete product</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
		<style>
		.header {
			background: linear-gradient(318deg, rgba(24,24,145,1) 0%, rgba(84,98,255,1) 100%);
		}
	</style>
</head>
<body>
	<div class="image">
		<a href="home.php"><img src="../images/logo1.png" style="width: 15%;margin: 10px 42.5% 0px 42.5%"></a>
	</div>
	<div class="header">
		<h2>Admin - Delete product</h2>
	</div>
	
	<form method="post" action="delete_product.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Product name</label>
			<input type="text" name="product_name">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="delete_product_btn"> - Delete product</button>
		</div>
		
	</form>
</body>
</html>