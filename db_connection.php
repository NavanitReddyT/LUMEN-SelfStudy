<?php
$conn = new mysqli("localhost", "root", "", "studyspace");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>