
<?php
// Include the connection file
include 'connection.php';

// Rest of the login logic
// ...


// Establish database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform basic validation
    if (empty($username) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Check if the username and password match a user in the database
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // User authenticated, perform desired actions
            echo "Login successful!";
        } else {
            echo "Invalid username or password.";
        }
    }
}

$conn->close();
?>
