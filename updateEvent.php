<?php
	
	# main
	if ($_POST['action'] == 'Update event') {
		updateEvent($_POST['eventID']);
	} else if ($_POST['action'] == 'Delete event') {
	    deleteEvent($_POST['eventID']);
	}
	header('Location: my-events.php'); 
	exit();

	function updateEvent($event){

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   die($conn->error);
		}

		$eventName = get_post($conn, 'event-name');
		$location = get_post($conn, 'room');
		$description = get_post($conn, 'desc');
		$startTime = get_post($conn, 'datetime-start');
		$endTime = get_post($conn, 'datetime-end');

		$stmt = $conn->prepare("UPDATE Event SET eventName = ?, location = ?, description = ?, startTime = STR_TO_DATE(?, '%Y-%m-%dT%H:%i'), endTime = STR_TO_DATE(?, '%Y-%m-%dT%H:%i') WHERE eventID = ?;");
 		if(!$stmt) die($conn->error);
		$stmt->bind_param("ssssss", $eventName, $location, $description, $startTime, $endTime, $event);
		$stmt->execute();

		if (!$stmt) {
			die($conn->error);
		}
		$stmt->close();
		$conn->close();
	}

	function deleteEvent($event){

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   die($conn->error);
		}

		$stmt = $conn->prepare("DELETE FROM Event WHERE eventID = ?;");
 		if(!$stmt) die($conn->error);
		$stmt->bind_param("s", $event);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

?>
