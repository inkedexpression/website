<?php
// Establish database connection
include 'connection.php';
$servername = "CREATE DATABASE";
$username = "CREATE DATABASE";
$password = "CREATE DATABASE";
$dbname = "CREATE DATABASE";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic validation
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Check if the username or email already exists
        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "Username or email already exists. Please choose a different one.";
        } else {
            // Insert the user into the database
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($query) === true) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
