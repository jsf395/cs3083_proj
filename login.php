<?php
	# Check if session existed ? reset : nothing
	if (session_status() != PHP_SESSION_NONE) {
    	session_unset();
    	session_destroy();
	}
	if(isset($_SESSION))
		echo "existing session";
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
	<div class="container-fluid">
		<form class="_login" method="POST" action="login_sess.php">
			<h2> Login Here! </h2>
			<div class="_user">
				<label for="username"> Username:</label>
				<input type="text" name="username" id="username" maxlength="50">
			</div>
			<div class="_pass">
				<label for="password"> Password:</label>
				<input type="password" name="password" id="password" maxlength="50">
			</div>
			<div>
				<input type="submit" name="submit" value="Login">
				<input type="button" value="Go Back" class="button_active" onclick="location.href='main.php';">
			</div>
		</form>
	</div>
</body>
</html>