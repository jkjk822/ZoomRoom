<!doctype html>

<html lang="en">

<head>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - View Events</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>All Events</h2>

<?php
	require_once('db_setup.php');
	$sql = "USE jjaco16;";
	if ($conn->query($sql) !== TRUE) {
	   echo "Error using  database: " . $conn->error;
	}
	// Query:
	$sql = "SELECT * FROM Event";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
?>

	<table>
		<tr>
			<th>Event Name</th>
			<th>Starts</th>
			<th>Ends</th>
			<th>Room</th>
			<th>Host</th>
			<th>Description</th>
			<th>Type</th>
		</tr>
<?php
	while($row = $result->fetch_assoc()){
?>
    	<tr>
			<td><?php echo $row['eventName']?></td>
			<td><?php echo $row['startTime']?></td>
			<td><?php echo $row['endTime']?></td>
			<td><?php echo $row['location']?></td>
			<td><?php echo $row['host']?></td>
			<td><?php echo $row['description']?></td>
			<td><?php echo $row['type']?></td>
      	</tr>

<?php
	}
	}
	else {
		echo "Nothing to display";
	}
?>
    </table>
<?php
	$conn->close();
?>

	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>
