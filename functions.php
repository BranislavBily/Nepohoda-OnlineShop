<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'multi_login');

$username = "";
$email = "";
$errors = array();


if(isset($_POST['register-btn'])) {
	register();
}

function register() {
	global $db, $username, $email, $errors;

	$username = e($_POST['username']);
	$email = e($_POST['email']);
	$password_1 = e($_POST['passowrd_1']);
	$password_2 = e($_POST['password_2']);

	if(empty($username)) {
		array_push($errors, "Username is required");
	}
	if(empty($email)) {
		array_push($errors, "email is required");
	}
	if(empty($password_1)) {
		array_push($errors, "Password is required");
	}
	if($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
					  console.log("Nahratie uspesne");
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

function getUserById($id) {
	global $db;
	$query = "SELECT * FROM Users WHERE id =" .$id;
	$result = mysqli_query($db, $query);

	return mysqli_fetch_assoc($result);
}

function e($val) {
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if(count($errors) > 0) {
		echo '<div class="error">';
			foreach ($errors as $error) {
				echo $error .'<br>';
			}
			echo '</div>';
	}
}

function isLoggedIn(){
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}