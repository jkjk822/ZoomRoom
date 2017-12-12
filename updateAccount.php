<?php
	
	# main
	echo json_encode(updateAccount());

	function updateAccount(){
		$data = array();
		$errors = array();

		require_once('db_setup.php');
		$sql = "USE jjaco16;";
		if ($conn->query($sql) !== TRUE) {
		   databaseError($conn->error);
		}

		if(!empty($_POST['current-pass'])
			&& !empty($_POST['new-pass'])
			&& !empty($_POST['confirm-pass'])
			&& ($_POST['new-pass'] === $_POST['confirm-pass']))
		{
			updatePassword($conn, get_post($conn, 'current-pass'), get_post($conn, 'confirm-pass'));
		}
		if(!empty($_POST['new-email'])){
			updateEmail($conn, get_post($conn, 'new-email'));
		}
		if(!empty($_POST['new-phone'])){
			updatePhone($conn, get_post($conn, 'new-phone'));
		}
		if(!empty($errors)){
			$data['errors'] = $errors;
			$conn->close();
			return $data;
		}
		# set up query and post it to database
		
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

	function updatePassword($conn, $password, $newPassword){
	
		# set up query and post it to database
		$stmt = $conn->prepare("SELECT password FROM User WHERE netID = ?;");
		if(!$stmt) databaseError($conn->error);
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
	 		if(!$stmt) databaseError($conn->error);
			$stmt->bind_param("ss", $newPassword, $_COOKIE['loggedIn']);
			$stmt->execute();

			if (!$stmt) {
				databaseError($conn->error);
			}
			$stmt->close();
			$data['password'] = true;
		}
		else {
			$errors['password'] = true;
		}
	}

	function updateEmail($conn, $email){
		$stmt = $conn->prepare("UPDATE User SET email = ? WHERE netID = ?;");
 		if(!$stmt) databaseError($conn->error);
		$stmt->bind_param("ss", $email, $_COOKIE['loggedIn']);
		$stmt->execute();

		if (!$stmt) {
			databaseError($conn->error);
		}
		$stmt->close();
		$data['email'] = true;
	}

	function updatePhone($conn, $phone){
		$stmt = $conn->prepare("UPDATE User SET phone = ? WHERE netID = ?;");
 		if(!$stmt) databaseError($conn->error);
		$stmt->bind_param("ss", $phone, $_COOKIE['loggedIn']);
		$stmt->execute();

		if (!$stmt) {
			databaseError($conn->error);
		}
		$stmt->close();
		$data['phone'] = true;
	}

?>
