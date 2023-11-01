<?php
$post_office_address = $_POST['post_office_address'];
$email_address = $_POST['email_address'];
$phone_number = $_POST['phone_number'];
$registration_number = $_POST['registration_number'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_office_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO post_office_info (post_office_address, email_address, phone_number, registration_number)
VALUES ('$post_office_address', '$email_address', '$phone_number', '$registration_number')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
