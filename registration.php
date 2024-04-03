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
$email = $_POST['email'];
$password = $_POST['password'];

// Perform SQL query to insert data into your database
$sql = "INSERT INTO registration (username, email, spassword) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registerd successfully'); window.location.href = 'registration.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
