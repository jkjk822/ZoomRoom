<?php
	
	# main
	if(!empty($_POST['user-input']))
	{
		$data = array();
		$errors = array();
		echo json_encode(search($_POST['user-input']));
	}

	function search($query){
		global $data;
		global $errors;

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   return databaseError($conn->error);
		}

		$table = get_post($conn, 'table');
		$field = get_post($conn, 'field');
		$query = "%{$query}%";

		# set up query and post it to database
		$stmt = $conn->prepare("SELECT * FROM $table WHERE $field LIKE ?");
 		if(!$stmt) return databaseError($conn->error);
		$stmt->bind_param("s", $query);
		$stmt->execute();

		#store result
		$result = $stmt->get_result();
		$results = array();
		$i = 0;
		while($row = $result->fetch_assoc()){
			$results[i] = $row;
			i++;
		}

		$stmt->close();
		$conn->close();

		$data['results'] = $results;
		return $data;
	}

    function databaseError($error){
    	global $data;
		global $errors;
        $errors['database'] = $error;
        $data['errors'] = $errors;
        return $data;
    }

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

?>
