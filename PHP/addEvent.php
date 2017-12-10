<html>
<body>
<?php

	# main
	if(!empty($_POST['eventName']) && !empty($_POST['type'])
	{
		addEvent();
	}

	function addEvent(){

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) === TRUE) {
		   // echo "using Database tbiswas2_company";
		} else {
		   echo "Error using  database: " . $conn->error;
		}

		$eventName = get_post($conn, 'eventName');
		$host = get_post($conn, 'host');
		$location = get_post($conn, 'location');
		$description = get_post($conn, 'description');
		$startTime = get_post($conn, 'startTime');
		$endTime = get_post($conn, 'endTime');
		$type = get_post($conn, 'type');

		$stmt = $conn->query("INSERT INTO Event VALUES(0, $eventName, $host, $location, $description, $startTime, $endTime, $type)");

		if ($stmt === TRUE) {
			echo "New user created successfully";
		} else{
			echo "Error: " . $conn->error;
		}

		$conn->close();
	}

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

?>

</body>
</html>
