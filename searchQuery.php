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
		$stmt = $conn->prepare("SELECT * FROM ? WHERE ? LIKE ?");
 		if(!$stmt) return databaseError($conn->error);
		$stmt->bind_param("sss", $table, $field, $query);
		$stmt->execute();

		#store result
		$data['result'] = $stmt->get_result();

		$stmt->close();
		$conn->close();

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
