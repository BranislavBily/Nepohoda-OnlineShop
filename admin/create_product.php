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
	<title>Admin - add product</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: linear-gradient(318deg, rgba(24,24,145,1) 0%, rgba(84,98,255,1) 100%);
		}
		button[name=create_product_btn] {
			background: linear-gradient(318deg, rgba(24,24,145,1) 0%, rgba(84,98,255,1) 100%);
		}
	</style>
</head>
<body>
	<div class="image">
		<img src="../images/logo1.png" style="width: 15%;margin: 10px 42.5% 0px 42.5%">
	</div>
	<div class="header">
		<h2>Admin - add product</h2>
	</div>
	
	<form method="post" action="create_product.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Product Name</label>
			<input type="text" name="product_name">
		</div>
		<div class="input-group">
			<label>Product type</label>
			<select name="product_type" id="user_type" >
				<option value=""></option>
				<option value="hardware">Hardware</option>
				<option value="software">Software</option>
			</select>
		</div>
		<div class="input-group">
			<label>Category</label>
			<input type="text" name="category">
		</div>
		
		<div class="input-group">
			<label>Cost</label>
			<input type="text" name="cost">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="create_product_btn"> + add product</button>
		</div>
	</form>
</body>
</html>