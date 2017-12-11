<html>
<body>
<?php

	# main
	if(!empty($_POST['name']))
	{
		addEvent();
	}

	function addEvent(){

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   die("Error using  database: " . $conn->error);
		}

		$eventName = get_post($conn, 'name');
		$host = get_post($conn, 'host');
		$location = get_post($conn, 'room');
		$description = get_post($conn, 'desc');
		$startTime = get_post($conn, 'start');
		$endTime = get_post($conn, 'end');

		# set up query and post it to database
		$stmt = $conn->prepare("INSERT INTO Event VALUES(0, ?, ?, ?, ?, STR_TO_DATE(?, '%Y-%m-%dT%H:%i'), STR_TO_DATE(?, '%Y-%m-%dT%H:%i'), 'Other');");
 		if(!$stmt) die("Error: " . $conn->error);
		$stmt->bind_param("ssssss", $eventName, $host, $location, $description, $startTime, $endTime);
		$stmt->execute();

		if ($stmt) {
			echo "New event created successfully";
		} else{
			die("Error: " . $conn->error);
		}

		$conn->close();
	}

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

?>

</body>
</html>
