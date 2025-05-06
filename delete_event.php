<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Not authenticated');
}

$event_id = $_GET['id'] ?? 0;
$user_id = $_SESSION['user_id'];

// Make sure users can only delete their own events
$stmt = $conn->prepare("DELETE FROM planner_events WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $event_id, $user_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete event']);
}

$stmt->close();
$conn->close();