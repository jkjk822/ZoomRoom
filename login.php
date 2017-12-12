<!doctype html>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Login</title>
</head>

<body>
	<h3>Login:</h3>

	<form action="authenticate.php" method="post">
		
		<label for="username"><strong>Username:</strong></label>
		<input type="text" name="username" id="username" placeholder="Enter username" required><br><br>

		<label for="password"><strong>Password:</strong></label>
		<input type="password" name="password" id="password" placeholder="Enter password" required><br><br>

		<input type="submit" value="Login" class="button"><br><br>
		
		<div id="validate"></div>
	</form>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>

</body>
</html>

<?php
	if($_COOKIE["loggedIn"]){
		#Redirect browser
		header("Location: home.php"); 
		exit();
	}
?>
