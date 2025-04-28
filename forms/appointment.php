<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Normally: Insert into database here...

  echo json_encode(["message" => "Appointment booked successfully!"]);
} else {
  echo json_encode(["error" => "Invalid request"]);
}
?>
