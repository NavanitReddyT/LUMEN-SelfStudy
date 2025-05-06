<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Not authenticated');
}

$day = $_GET['day'] ?? '';
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM planner_events WHERE user_id = ? AND day = ? ORDER BY time ASC");
$stmt->bind_param("is", $user_id, $day);
$stmt->execute();

$result = $stmt->get_result();
$events = [];

while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'subject' => $row['subject'],
        'time' => $row['time'],
        'remind' => (bool)$row['remind']
    ];
}

header('Content-Type: application/json');
echo json_encode($events);

$stmt->close();
$conn->close();