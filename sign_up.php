<?php
$email = $_POST['email_reg'];
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "esiepe";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (email_reg, username, password)
VALUES ('$email','$username', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>