<html>
	<head>
		<meta charset="utf-8">
		<title>Log Out</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body id="login">
		<div class="box">
			<h1>You have been logged out!</h1>
			<a href="login.php">Click here to log in again</a>
		</div>
	</body>
</html>

<?php
setcookie("loggedIn", "", time()-3600, "/");
?>