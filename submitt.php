<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ImageLoad"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$name = $_POST["name"];
$date = $_POST['date'];
$note = $_POST['note'];

// File upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

// Insert data into database
$sql = "INSERT INTO simage (name, date, note, image) VALUES ('$name', '$date', '$note', '$target_file')";


if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully'); window.location.href = 'prescr.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// if ($conn->query($sql) === TRUE) {
//     echo "<script>alert('New record created successfully');</script>";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>