<?php
	require('connect.php');

	# Check if session existed ? reset : start
	if (session_status() != PHP_SESSION_NONE) {		
		session_unset();
		session_destroy();
	}
	else {
		session_start();
	}
	
	if(isset($_POST['submit'])) {
		$fname = ucfirst(htmlspecialchars(strip_tags(trim($_POST['fname']))));
		$lname = ucfirst(htmlspecialchars(strip_tags(trim($_POST['lname']))));
		$email = htmlspecialchars(strip_tags(trim($_POST['email'])));
		$usern = htmlspecialchars(strip_tags(trim($_POST['username'])));
		$zipco = htmlspecialchars(strip_tags(trim($_POST['zipcode'])));
		$passw = password_hash(htmlspecialchars(strip_tags(trim($_POST['password']))), PASSWORD_DEFAULT); #bcrypt
		$valid = htmlspecialchars(strip_tags(trim($_POST['pass_valid'])));
		#var_dump($passw);
		# Check field errors
		$fields = array('fname', 'lname', 'email', 'username', 'password', 'pass_valid', 'zipcode');
		foreach($fields AS $index) {
			if(!isset($_POST[$index]) || empty($_POST[$index])) {
				$error = 'Required field is missing!';
				break;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = 'Invalid email';
				break;
			}
			if(strlen($_POST['password']) < 6) {
				$error = 'Password too short';
				break;
			}
			if($_POST['password'] != $_POST['pass_valid']) {
				$error = "Passwords do no match";
				break;
			}
		}
		# Check same username in db
		$selUser = "SELECT * FROM member WHERE username = '$usern'";
		if($userQuery = mysqli_query($conn, $selUser)) {
			if($userQuery && mysqli_num_rows($userQuery) > 0) 
				$error = 'Username taken.';		
		}
		else
			echo 'ERROR: '.mysqli_error($conn);	
		
		# Insert into db
		if(!isset($error) && empty($error)) {
			$insUser = "INSERT INTO member (username, password, firstname, lastname, zipcode) 
				VALUES ('$usern', '$passw', '$fname', '$lname', '$zipco')";
			if(mysqli_query($conn, $insUser)) {
				echo "<h2> Successfully registered.";
				echo "<a href='login.php'> Click here to go login </a> </h2>";
			}
			else
				echo 'ERROR: '.mysqli_error($conn);
		}
	}
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="main.css">
</head>
<body>
	<div class="_error">
		<?php 
			if(isset($error)) {
				echo 'ERROR: '.$error.'<br>';
				echo "<a href='registration.php'> Click here to go back </a>";
			}
		?> 
	</div>
</body>
</html>