<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Not authenticated');
}

$data = json_decode(file_get_contents('php://input'), true);
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO planner_events (user_id, day, subject, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $user_id, $data['day'], $data['subject'], $data['time']);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'id' => $stmt->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to add event']);
}

$stmt->close();
$conn->close();