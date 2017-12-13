<html>
	<head>
		<meta charset="utf-8">
		<title>Log Out</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body id="login">
		<div class="box center">
			<h1>You have been logged out!</h1>
			<a href="login.php"><button type="button" class="button logout">Click here to log in again</button></a>
		</div><!-- .box .center -->
	</body>
</html>

<?php
setcookie("loggedIn", "", time()-3600, "/");
?>