<?php
// Assuming you have a connection to your MySQL database
// Replace 'your_host', 'your_username', 'your_password', 'your_database' with your actual database credentials

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'imageLoad';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Perform SQL query to check if username and password match
$sql = "SELECT * FROM registration WHERE username='$username' AND spassword='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // If credentials match, redirect to home page
    header("Location: index.html");
} else {
    // If credentials do not match, redirect back to login page with error message
    header("Location: login.html?error=1");
}

$conn->close();
?>
