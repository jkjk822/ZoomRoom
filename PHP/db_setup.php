<?php
$servername = "localhost";
$username = "jjaco16";
$password = "YSTwphip";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>
