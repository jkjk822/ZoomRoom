<?php
$servername = "localhost";
$MYSQLusername = "jjaco16";
$MYSQLpassword = "YSTwphip";

// Create connection
$conn = new mysqli($servername, $MYSQLusername, $MYSQLpassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>
