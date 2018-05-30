<?php 
	session_start();

	// pripojenie k databaze
	$db = mysqli_connect('localhost', 'root', '', 'onlineshop');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// volanie funkcii vzhladom k  tomu aky button bol stlaceny
	if (isset($_POST['register_btn'])) {
		register();
	}

	if (isset($_POST['login_btn'])) {
		login();
	}

	if(isset($_POST['create_product_btn'])) {
		createProduct();
	}

	if(isset($_POST['delete_user_btn'])) {
		deleteUser();
	}

	if(isset($_POST['delete_product_btn'])) {
		deleteProduct();
	}

	if(isset($_POST['search_product_btn'])) {
		search();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}


	// Registracia
	function register(){
		global $db, $errors;

		// inputy z form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// kontrola ci bol form spravne vyplneni
		if (empty($username)) { 
			array_push($errors, "Username is required!"); 
		}

		$query = "SELECT * FROM Users WHERE username = '$username'";
		$result = mysqli_query($db, $query);
		if(mysqli_affected_rows($db) > 0) {
			array_push($errors, "Username already taken!");
		}

		if (empty($email)) { 
			array_push($errors, "Email is required!"); 
		}

		$query = "SELECT * FROM Users WHERE email = '$email'";
		$result = mysqli_query($db, $query);
		if(mysqli_affected_rows($db) > 0) {
			array_push($errors, "There is an account with this email!");
		}

		if (empty($password_1)) { 
			array_push($errors, "Password is required!"); 
		} else if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match!");
			
		} else {
			checkPassword($password_1);
		}

		// zaregistruj ked nenastal ziaden error
		if (count($errors) == 0) {
			$password = md5($password_1);//hashovanie hesla

			if (isset($_POST['user_type'])) { // vlozenie admina do databazy
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user " . $username . " successfully created! You will face lawsuits or admin " .$username ." if you in any way damage Nepohoda Shop!";
				header('location: home.php');
			}else{ //vlozenie usera do databazy
				$query = "INSERT INTO users (username, email, user_type, password) 
						  VALUES('$username', '$email', 'user', '$password')";
				mysqli_query($db, $query);
				$logged_in_user_id = mysqli_insert_id($db);	
				$_SESSION['success']  = "Your account was successfully created!";	
				header('location: login.php');		
			}
		}
	}

	function createProduct() {
		global $db, $errors;

		$product_name = e($_POST['product_name']);
		$product_type = e($_POST['product_type']);
		$category = e($_POST['category']);
		$cost = e($_POST['cost']);

		if (empty($product_name)) {
			array_push($errors, "Product name is required!");
		}
		if (empty($product_type)) {
			array_push($errors, "Product type is required!");
		}
		if (empty($category)) {
			array_push($errors, "Category is required!");
		}
		if (empty($cost)) {
			array_push($errors, "Cost is required!");
		}

		if(count($errors) == 0) {
			echo $cost;
			$query = "INSERT INTO Products (name_of_product, product_type, category, cost) VALUES ('$product_name', '$product_type', '$category', '$cost')";
			$result = mysqli_query($db, $query);
			$_SESSION['success'] = $product_name . " was successfully added!";
			header('location: home.php');
		}
	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	//Delete User
	//ajked nevymaze nic nevrati error
	function deleteUser() {
		global $db, $errors;
		$username = e($_POST['username']);

		if(empty($username)) {
			array_push($errors, "Username is required!");
		}
		$query = "SELECT user_type FROM Users WHERE username = '$username'";
		$result = mysqli_query($db, $query);
		while($row = $result->fetch_assoc()) {
			foreach ($row as $usertype) {
				if(strcmp($usertype, "admin") == 0) {
					array_push($errors, "You can not delete an admin!");
				}
			}
		}

		if(count($errors) == 0) {
			$query = "DELETE FROM Users WHERE username = '$username' LIMIT 1";
			$result = mysqli_query($db, $query);
			if(mysqli_affected_rows($db) > 0) {
				$_SESSION['success'] = "User " . $username . " was successfully deleted from the database!";
				header('location: home.php');
			}
			array_push($errors, $username . " was not located in the database!");
		}
	}

	function deleteProduct() {
		global $db, $errors;
		$product_name = e($_POST['product_name']);
		if(empty($product_name)) {
			array_push($errors, "Product name is required!");
		}
		if(count($errors) == 0) {
			$query = "DELETE FROM Products WHERE name_of_product = '$product_name'";
			$result = mysqli_query($db, $query);
			if(mysqli_affected_rows($db) > 0) {
				$_SESSION['success'] = $product_name . " was successfully deleted from the database!";
					header('location: home.php');
			} else {
				array_push($errors, $product_name ." was not located in the database!");
			}
		}
	}

	function search() {
		global $db, $errors;

		$name_of_product = e($_POST['product_name']);

		if(empty($name_of_product)) {
			array_push($errors, "Please enter the name of product!");
		}
		if(count($errors) == 0) {
			$query = "SELECT name_of_product, product_type, category, cost FROM Products WHERE name_of_product LIKE '%$name_of_product%'";
			$result = $db ->query($query);
			if(mysqli_num_rows($result) > 0) {
			echo '<div class="tableDiv" id="tableDiv"></div>';
			echo '<table class="products" id="table">';
			 echo '<tr>';
			 	echo '<th>Name of products</th>';
			 	echo '<th>Type of product </th>';
			 	echo '<th>Category</th>';
			 	echo '<th>Cost [€]</th>';
			 echo '</tr>';
			while($row=$result->fetch_assoc()) {
				echo '<tr>';
				foreach($row as $thing) {
					echo '<td>' .$thing. '</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
			echo '</div>';
			} else {
				array_push($errors, "No product found!");
			} 

			?>
			<script>
				let table = document.getElementById("table");
				let div = document.getElementById("tableDiv");
				let body = document.getElementById("body");
				div.appendChild(table);
			</script>

			<?php
		}	
	}	

	function checkPassword($password) {
		global $errors;
		if(strlen($password) < 8) {
			array_push($errors, "Your password is too short!");
		}

		if(!preg_match("#[0-9]+#", $password)) {
			array_push($errors, "Your password must include at least one number!");
		}

		if(!preg_match("#[a-zA-Z]+#", $password)) {
			array_push($erorrs, "Your password must include at least one letter!"); 
		}

	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required!");
		}
		if (empty($password)) {
			array_push($errors, "Password is required!");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in!";
					header('location: admin/home.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in!";
					header('location: index.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination!");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	


?>
