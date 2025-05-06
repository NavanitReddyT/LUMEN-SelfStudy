<?php
require_once 'db_connection.php';

// Create planner_events table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS planner_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    day VARCHAR(20) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    time TIME NOT NULL,
    remind BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "planner_events table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>