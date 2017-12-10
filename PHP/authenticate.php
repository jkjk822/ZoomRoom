<?php

	# main
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		if(authenticate($_POST['username'], $_POST['password']))
			header('Location: show_relations.html');
		else
			echo "Username or password is incorrect!";

	}

	function authenticate($username, $password){

		require_once('db_setup.php');
        $sql = "USE jjaco16;";
        if ($conn->query($sql) !== TRUE) die("Error using  database: " . $conn->error);
		

		# set up query and post it to database
		$stmt = $conn->prepare("SELECT password FROM User WHERE netID = ?;");
		if(!$stmt) die("Error: " . $conn->error);
		$stmt->bind_param("s", $username); #? replaced with $username
		$stmt->execute();

		#store result
		$stmt->store_result();
		$stmt->bind_result($result);
		$stmt->fetch();

		# cleanup
		$stmt->close();
		$conn->close();
		
		# verify password
		if($result === $password){
			# set cookie to remember login for 1 week on entire domain
			date_default_timezone_set('UTC'); # prevents warnings about timezone
			setcookie("loggedIn", $username, strtotime("+1 week"), "/");
			
			return true;
		}

		return false;
	}
?>
