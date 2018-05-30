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
	<title>Update Prize</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="image">
		<a href="home.php"><img src="../images/logo3.png" style="width: 15%;margin: 10px 42.5% 0px 42.5%"></a>
	</div>
	<div class="header">
		<h2>Admin - update prize</h2>
	</div>
	
	<form method="post" action="update.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Name of product</label>
			<input type="text" name="nameOfProduct" placeholder="Enter exact name of product">
		</div>
		<div class="input-group">
			<label>New prize</label>
			<input type="text" name="prize" placeholder="€">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="update_btn">Update prize</button>
		</div>
	</form>
</body>
</html>