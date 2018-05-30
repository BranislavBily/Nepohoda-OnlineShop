<?php 
	include('functions.php');
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OnlineShop - Search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<style>
		.products tr:hover {
		background-color: #94b7ef
		}
		.error {
			width: 96%;
		}

	</style>
</head>
<body id="body">
	<div class="image">
		<a href="admin/home.php"><img src="images/logo3.png" style="width: 15%;margin: 10px 42.5% 0px 42.5%"></a>
	</div>
	<div class="header">
		<h2>Search for Category</h2>
	</div>
	
	<form method="post" action="searchCategory.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<input type="text" name="product_name" placeholder="Name of product">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="searchCategory_btn" id="search_product_btn"> Search</button>
		</div>
	</form>
	</div>
	<script>
		let tableDiv = document.getElementById("tableDiv");
		let main = document.getElementById("body"); 
		main.appendChild(tableDiv);
	</script>
</body>
</html>