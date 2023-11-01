<?php
$registration_number = $_POST['registration_number'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'post_office_db');

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the registration number is set
if (isset($registration_number)) {
    // Query to retrieve the contact details based on the registration number
    $sql = "SELECT * FROM post_office_info WHERE registration_number = '$registration_number'";
    $result = mysqli_query($conn, $sql);

    // Check if any record is found
    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);

        // Display the contact details
        echo "Postal Address: " . $row["post_office_address"] . "<br>";
        echo "Email: " . $row["email_address"] . "<br>";
        echo "Phone: " . $row["phone_number"] . "<br>";
        // ... and so on
    } else {
        echo "No record found with the given registration number";
    }
}

// Close the connection
mysqli_close($conn);
