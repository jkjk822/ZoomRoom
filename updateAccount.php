<?php
	
	# main
	$data = array();
	$errors = array();
	echo json_encode(updateAccount());

	function updateAccount(){
		global $data;

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   return databaseError($conn->error);
		}

		if(!empty($_POST['current-pass'])
			&& !empty($_POST['new-pass'])
			&& !empty($_POST['confirm-pass'])
			&& ($_POST['new-pass'] === $_POST['confirm-pass']))
		{
			$data['password'] = updatePassword($conn, get_post($conn, 'current-pass'), get_post($conn, 'confirm-pass'));
		}
		if(!empty($_POST['new-email'])){
			$data['email'] = updateEmail($conn, get_post($conn, 'new-email'));
		}
		if(!empty($_POST['new-phone'])){
			$data['phone'] = updatePhone($conn, get_post($conn, 'new-phone'));
		}
		if(!empty($_POST['office'])){
			$data['office'] = updateOffice($conn, get_post($conn, 'office'));
		}
		$conn->close();
		return $data;
	}

    function databaseError($error){
    	global $errors;
    	global $data;
        $errors['database'] = $error;
        $data['errors'] = $errors;
        return false;
    }

	function get_post($database, $var){
		return $database->real_escape_string($_POST[$var]);
	}

	function updatePassword($conn, $password, $newPassword){
	
		# set up query and post it to database
		$stmt = $conn->prepare("SELECT password FROM User WHERE netID = ?;");
		if(!$stmt) return databaseError($conn->error);
		$stmt->bind_param("s", $_COOKIE['loggedIn']);
		$stmt->execute();

		#store result
		$stmt->store_result();
		$stmt->bind_result($result);
		$stmt->fetch();

		# cleanup
		$stmt->close();
		
		# verify password
		if($result === $password){
			$stmt = $conn->prepare("UPDATE User SET password = ? WHERE netID = ?;");
	 		if(!$stmt) return databaseError($conn->error);
			$stmt->bind_param("ss", $newPassword, $_COOKIE['loggedIn']);
			$stmt->execute();

			if (!$stmt) {
				return databaseError($conn->error);
			}
			$stmt->close();
			return true;
		}
		else {
			return false;
		}
	}

	function updateEmail($conn, $email){
		$stmt = $conn->prepare("UPDATE User SET email = ? WHERE netID = ?;");
 		if(!$stmt) return databaseError($conn->error);
		$stmt->bind_param("ss", $email, $_COOKIE['loggedIn']);
		$stmt->execute();

		if (!$stmt) {
			return databaseError($conn->error);
		}
		$stmt->close();
		return true;
	}

	function updatePhone($conn, $phone){
		$stmt = $conn->prepare("UPDATE User SET phone = ? WHERE netID = ?;");
 		if(!$stmt) return databaseError($conn->error);
		$stmt->bind_param("ss", $phone, $_COOKIE['loggedIn']);
		$stmt->execute();

		if (!$stmt) {
			return databaseError($conn->error);
		}
		$stmt->close();
		return true;
	}

	function updateOffice($conn, $office){
	
		# set up query and post it to database
		$stmt = $conn->prepare("SELECT roomID FROM Room WHERE roomID = ?;");
		if(!$stmt) return databaseError($conn->error);
		$stmt->bind_param("s", $office);
		$stmt->execute();

		#store result
		$stmt->store_result();
		$stmt->bind_result($result);
		$stmt->fetch();

		# cleanup
		$stmt->close();
		
		# verify office exists
		if($result){
			$stmt = $conn->prepare("UPDATE User SET office = ? WHERE netID = ?;");
	 		if(!$stmt) return databaseError($conn->error);
			$stmt->bind_param("ss", $office, $_COOKIE['loggedIn']);
			$stmt->execute();

			if (!$stmt) {
				return databaseError($conn->error);
			}
			$stmt->close();
			return true;
		}
		else {
			return false;
		}
	}

?>
