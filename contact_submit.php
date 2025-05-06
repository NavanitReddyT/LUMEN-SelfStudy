<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "studyspace";
$port = 3306;

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $dbname, $port);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
$name = $conn->real_escape_string($_POST['name'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$subject = $conn->real_escape_string($_POST['subject'] ?? '');
$message = $conn->real_escape_string($_POST['message'] ?? '');

// Insert into DB
$sql = "INSERT INTO contact_messages (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Message saved successfully!'); window.location.href='contact.php';</script>";
} else {
  echo "<script>alert('Error: Could not save message'); window.location.href='contact.php';</script>";
}

$conn->close();
?>