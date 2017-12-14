<!doctype html>

<?php	
	# Redirect to login page if not logged in
	if(!$_COOKIE['loggedIn']){
		# Redirect browser
		header('Location: unauthorized.html'); 
		exit();
	}

	require_once('db_setup.php');
    $sql = "USE jjaco16;";
    if ($conn->query($sql) !== TRUE) die("Error using  database: " . $conn->error);
	
	# set up query and post it to database
	$stmt = $conn->prepare("SELECT * FROM Event WHERE eventID = ?;");
	if(!$stmt) die("Error: " . $conn->error);
	$stmt->bind_param("s", $_GET['event']);
	$stmt->execute();

	#store result
	$result = $stmt->get_result()->fetch_assoc();

	# cleanup
	$stmt->close();
	$conn->close();
?>


<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Manage Event</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Manage Event #12345</h2>

<?php
	if($result['host'] === $_COOKIE['loggedIn']){
?>
	<form action="update-event.php" method="POST">
		<label for="event-name">Event Name:</label>
		<input type="text" name="event-name" id="event-name" value="<?php echo htmlspecialchars($result['eventName']) ?>"><br><br>

		<label for="datetime-start">Starts:</label>
		<input type="datetime-local" name="datetime-start" id="datetime-start" value="<?php echo htmlspecialchars($result['startTime']) ?>"><br><br>

		<label for="datetime-end">Ends:</label>
		<input type="datetime-local" name="datetime-end" id="datetime-end" value="<?php echo htmlspecialchars($result['startEnd']) ?>"><br><br>

		<label for="room">Room:</label>
		<input type="text" name="room" id="room" value="<?php echo htmlspecialchars($result['location']) ?>"><br><br>

		<label for="desc">Description:</label>
		<textarea name="desc" id="desc"><?php echo $result['description'] ?></textarea><br><br>

		<input type="submit" value="Update event" class="button">
		<input type="submit" value="Delete event" class="button"><br><br>
	</form>
	
	<div id="validate"></div>
<?php
	} else{
		echo "This is not your event to manage.";
	}
?>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>