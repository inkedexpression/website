<?php
// MySQL database credentials
$servername = "localhost";     // Replace with your server name
$username = "your_username";   // Replace with your MySQL username
$password = "your_password";   // Replace with your MySQL password
$dbname = "your_database";     // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
echo "Connected to MySQL successfully";
?>
