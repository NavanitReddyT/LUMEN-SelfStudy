<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Not authenticated');
}

$data = json_decode(file_get_contents('php://input'), true);
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("UPDATE planner_events SET remind = ? WHERE id = ? AND user_id = ?");
$stmt->bind_param("iii", $data['remind'], $data['id'], $user_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update reminder']);
}

$stmt->close();
$conn->close();