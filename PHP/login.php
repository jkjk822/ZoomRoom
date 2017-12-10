<html>
	<head>
		<meta charset="utf-8">
		<title>Log In</title>
	</head>
	<body id="login">
		<div class="box">
			<h1>Log In</h1>

			<form action="authenticate.php"  method="post">
			  <label>Username:<br>
			  	<input type="text" name="username" required>
			  </label>
			  <br>
			  <label>Password:<br>
			  	<input type="password" name="password" required>
			  </label>
			  <br>
			  <br>
			  <input type="submit" value="Submit" class="btn btn-default">
			</form>
		</div>
	</body>
</html>

<?php
	if($_COOKIE["loggedIn"]){
		#Redirect browser
		header("Location: show_relations.html"); 
		exit();
	}
?>
