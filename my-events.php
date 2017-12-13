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
	$stmt = $conn->prepare("SELECT * FROM Event WHERE host = ?;");
	if(!$stmt) die("Error: " . $conn->error);
	$stmt->bind_param("s", $_COOKIE['loggedIn']);
	$stmt->execute();

	#store result
	$result = $stmt->get_result();

	# cleanup
	$stmt->close();
	$conn->close();
?>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - My Events</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>My Events</h2>
<?php
	if($result->num_rows > 0){
?>
		<table>
			<tr>
				<th>Event Name</th>
				<th>Starts</th>
				<th>Ends</th>
				<th>Room</th>
				<th>Description</th>
				<th>Type</th>
			</tr>
	<?php
		while($row = $result->fetch_assoc()){
	?>
	      <tr>
	        <td><a href="manage-event.php/?event=<?php echo htmlspecialchars($row['eventID']) ?>"><?php echo $row['eventName']?></td>
	        <td><?php echo $row['startTime']?></td>
	        <td><?php echo $row['endTime']?></td>
	        <td><?php echo $row['location']?></td>
	        <td><?php echo $row['description']?></td>
	        <td><?php echo $row['type']?></td>
	      </tr>
	<?php
		}
	?>
		</table>
<?php		
	}
?>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>