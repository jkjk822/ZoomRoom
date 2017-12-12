<?php
	

	echo "hi";
	# main
	// if(!empty($_POST['name']))
	// {
	// 	echo json_encode(addEvent());
	// }

	function addEvent(){
		$data = array();
		$errors = array();

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   databaseError($conn->error);
		}

		$eventName = get_post($conn, 'name');
		$host = get_post($conn, 'host');
		$location = get_post($conn, 'room');
		$description = get_post($conn, 'desc');
		$startTime = get_post($conn, 'start');
		$endTime = get_post($conn, 'end');

		if(!isValid($conn, 'Room', 'roomID', $location)){
			$errors['room'] = "Invalid room";
		}
		if(!isValid($conn, 'User', 'netID', $host)){
			$errors['host'] = "Invalid host";
		}
		if(!empty($errors)){
			$data['errors'] = $errors;
			$conn->close();
			return $data;
		}


		# set up query and post it to database
		$stmt = $conn->prepare("INSERT INTO Event VALUES(0, ?, ?, ?, ?, STR_TO_DATE(?, '%Y-%m-%dT%H:%i'), STR_TO_DATE(?, '%Y-%m-%dT%H:%i'), 'Other');");
 		if(!$stmt) databaseError($conn->error);
		$stmt->bind_param("ssssss", $eventName, $host, $location, $description, $startTime, $endTime);
		$stmt->execute();

		if (!$stmt) {
			databaseError($conn->error);
		}
		$stmt->close();
		$conn->close();

		$data['message'] = "New event created successfully";
		return $data;
	}

    function databaseError($error){
        $errors['database'] = $error;
        $data['errors'] = $errors;
        return $data;
    }

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

	# Check if in database
    function isValid($database, $table, $fieldName, $fieldValue){

        # set up query and post it to database
        $stmt = $database->prepare("SELECT $fieldName FROM $table WHERE $fieldName = ?");
        if(!$stmt) databaseError($database->error);
        $stmt->bind_param("s", $fieldValue);
        $stmt->execute();
        $stmt->store_result();
        # found item
        if($stmt->num_rows > 0){
            $stmt->close();
            return true;
        }
        $stmt->close();
        return false;
    }

?>
