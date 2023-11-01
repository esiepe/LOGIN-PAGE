<?php
  // Connect to database
  $conn = mysqli_connect("localhost", "root", "", "esiepe");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if username and password match with database
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Redirect to post office form page
    header("Location: post_office_form.html");
  } else {
    // Stay on login page
    echo "Username or password is incorrect. Please try again.";
  }
  mysqli_close($conn);
?>
