<!doctype html>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Manage Event</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Manage Event #12345<!-- should grab event value --></h2>

	<form action="update-event.php" method="POST">
		<label for="event-name">Event Name:</label>
		<input type="text" name="event-name" id="event-name" value="GRAB VALUE FROM DATABASE"><br><br>

		<label for="datetime-start">Starts:</label>
		<input type="datetime-local" name="datetime-start" id="datetime-start" value="2017-12-11T19:40"><br><br><!-- GRAB VALUE FROM DATABASE -->

		<label for="datetime-end">Ends:</label>
		<input type="datetime-local" name="datetime-end" id="datetime-end" value="2017-12-11T19:40"><br><br><!-- GRAB VALUE FROM DATABASE -->

		<label for="room">Room:</label>
		<input type="text" name="room" id="room" value="GRAB VALUE FROM DATABASE"><br><br>

		<label for="desc">Description:</label>
		<textarea name="desc" id="desc">GRAB VALUE FROM DATABASE</textarea><br><br>

		<input type="submit" value="Update event" class="button">
		<input type="submit" value="Delete event" class="button"><br><br>
	</form>
	
	<div id="validate"></div>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>

<?php 	
	# Redirect to login page if not logged in
	if(!$_COOKIE['loggedIn']){
		# Redirect browser
		header('Location: unauthorized.html'); 
		exit();
	}
?>