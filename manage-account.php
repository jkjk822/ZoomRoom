<!doctype html>

<?php	
	# Redirect to login page if not logged in
	if(!$_COOKIE['loggedIn']){
		# Redirect browser
		header('Location: unauthorized.html'); 
		exit();
	}

	require_once('db_setup.php');
    $sql = "USE jjaco16;";
    if ($conn->query($sql) !== TRUE) die("Error using  database: " . $conn->error);
	
	# set up query and post it to database
	$stmt = $conn->prepare("SELECT * FROM User WHERE netID = ?;");
	if(!$stmt) die("Error: " . $conn->error);
	$stmt->bind_param("s", $_COOKIE['loggedIn']);
	$stmt->execute();

	#store result
	$result = $stmt->get_result()->fetch_assoc();

	# cleanup
	$stmt->close();
	$conn->close();
?>



<html lang="en">

<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="js/updateAccount.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<meta charset="utf-8">
	<title>Zoom Room - Manage Account</title>
</head>

<body>
	<?php include 'inc/nav.php'; ?>
	<h2>Manage Your Account</h2>

	<form action="updateAccount.php" method="POST">
	<h3>Change Your Password:</h3>
		
		<label for="current-pass">Current Password:</label>
		<input type="password" name="current-pass" id="current-pass" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
		<span id="password-error" class="error"></span><br><br>

		<label for="new-pass">New Password:</label>
		<input type="password" name="new-pass" id="new-pass" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;"><br><br>

		<label for="confirm-pass">Confirm New Password:</label>
		<input type="password" name="confirm-pass" id="confirm-pass" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
		<span id="match-error" class="error"></span><br><br>

	<h3>Update Your Email:</h3>
		<label for="new-email">Email:</label>
		<input type="email" name="new-email" id="new-email" placeholder="<?php echo htmlspecialchars($result['email']) ?>"><br><br>

	<h3>Update Your Phone Number:</h3>
		<label for="new-phone">Phone number:</label>
		<input type="tel" name="new-phone" id="new-phone" placeholder="<?php echo htmlspecialchars($result['phone']) ?>" pattern="\(\d{3}\)-\d{3}-\d{4}$">
		<span id="phone-error" class="error"></span><br><br>

	<h3>Update Your Office:</h3>
		<label for="office">Office:</label>
		<input type="text" name="office" id="office" placeholder="<?php echo htmlspecialchars($result['office']) ?>"><br><br>

		<input type="submit" value="Update profile" class="button"><br><br>
	</form>

    <p id="message"></p>
    <p class="error"></p>
    
	<footer>
		<p>P1M4 by Johnny Jacobs (8) and Mcvvina Lin (22)</p>
		<p>CSC 261 Fall 2017</p>
	</footer>
</body>
</html>
