<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email_address = $_POST["email_address"];
  // validate email
  if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
  } else {
    // check if email exists in database
    $conn = mysqli_connect("localhost", "root", "", "esiepe");
    $query = "SELECT * FROM post_office_info WHERE email_address = '$email_address'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      //email exists in the database
      //generate password reset token
      $token = bin2hex (random_bytes(16));

      //update the password reset token in the database
      $update_query = "UPDATE post_office_info SET reset_token= '$token' WHERE email_address= '$email_address' ";
      mysqli_query($conn, $update_query);

      // send password reset email
      $to = $email_address;
      $subject = "Password Reset";
      $message = "Please click the link to reset your password: http://example.com/reset.php?token=$token";
      $headers = "From: noreply@example.com";

      mail($to, $subject, $message, $headers);

      echo "Password reset email sent to $email_address";
    }
    else {
      echo "Email not found";
    }
    mysqli_close($conn);
  }
}
