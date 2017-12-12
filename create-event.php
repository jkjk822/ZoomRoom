<!doctype html>

<html lang="en">

<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="js/addEvent.js"></script>

	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Create Event</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Create an event:</h2>

	<form action="addEvent.php" method="post">
			<label for="name">Event Name:</label>
			<input type="text" name="name" id="name" placeholder="Event name" required>
		<br><br>
			<label for="host">Host's NetID:</label>
			<input type="text" name="host" id="host" placeholder="Host" required>
			<span id="host-error" class="error"></span>
		<br><br>
			<label for="desc">Description:</label>
			<textarea name="desc" id="desc" placeholder="Description"></textarea>
		<br><br>
			<label for="start">Event Begin:</label>
			<input type="datetime-local" id="start" name="start">
		<br><br>
			<label for="end">Event End:</label>
			<input type="datetime-local" id="end" name="end">
		<br><br>
			<label for="room">Room: </label>
			<input type="text" name="room" id="room" placeholder="Room" required>
			<span id="room-error" class="error"></span>
		<br><br>
		<input type="submit" value="Submit" class="button">
	</form>

    <p id="message"></p>
    <p class="error"></p>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>
