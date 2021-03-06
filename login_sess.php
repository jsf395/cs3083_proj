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
		$usern = htmlspecialchars(strip_tags(trim($_POST['username'])));
		$passw = htmlspecialchars(strip_tags(trim($_POST['password'])));
		$fields = array('username', 'password');
		
		# Check field errors
		foreach($fields AS $index) {
			if(!isset($_POST[$index]) || empty($_POST[$index])) {
				$error = 'Required field is missing!';
				break;
			}
		}
		
		# Check password matching
		$selUser = "SELECT * FROM member WHERE username = '$usern'";
		if($result = mysqli_query($conn, $selUser)) {
			if($result && mysqli_num_rows($result) === 1) {			
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);			
				if(password_verify($passw, $row['password'])) {
					$_SESSION['user'] = $usern;
					header("Location: meetindex.php");
				}
				else {
					$error = 'Invalid login or password';
				}
			}
			else {
				$error = 'Invalid login or password';
			}		
		}
		else
			echo 'ERROR: '.mysqli_error($conn);	
	}
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
				echo "<a href='login.php'> Click here to go back </a>";
			}
		?> 
	</div>
</body>
</html>