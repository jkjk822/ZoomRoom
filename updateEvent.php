<?php
	
	# main
	if ($_POST['action'] == 'Update event') {
		updateEvent();
	} else if ($_POST['action'] == 'Delete event') {
	    deleteEvent();
	}

	function updateEvent(){

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
		$stmt->bind_param("sssss", $eventName, $location, $description, $startTime, $endTime, $_GET['event']);
		$stmt->execute();

		if (!$stmt) {
			die($conn->error);
		}
		$stmt->close();
		$conn->close();
	}

	function deleteEvent(){

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   die($conn->error);
		}

		$stmt = $conn->prepare("DELETE FROM Event WHERE eventID = ?;");
 		if(!$stmt) die($conn->error);
		$stmt->bind_param("s", $_GET['event']);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

?>
