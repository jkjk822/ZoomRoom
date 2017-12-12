<!doctype html>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Home</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Welcome<?php if($_COOKIE["loggedIn"]){echo ", {$_COOKIE['loggedIn']}"} ?></h2>

	<a href="view-events.php">View events</a>
	<br><br>
	<a href="search-events.php">Search for events</a>
	<?php if($_COOKIE["loggedIn"]){ ?>
	<br><br>
	<a href="my-events.php">My events</a>
	<br><br>
	<a href="create-event.html">Create event</a>
	<br><br>
	<a href="manage-event.php">Manage event</a>
	<br><br>
	<a href="manage-account.php">Manage account</a>
	<br><br>
	<?php } ?>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>