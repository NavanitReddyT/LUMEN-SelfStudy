<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Not authenticated']);
    exit();
}

$note_id = $_GET['id'] ?? 0;
$user_id = $_SESSION['user_id'];

// Get file path before deletion
$stmt = $conn->prepare("SELECT content FROM notes WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $note_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$note = $result->fetch_assoc();

if ($note) {
    // Delete file
    $filepath = __DIR__ . '/' . $note['content'];
    if (file_exists($filepath)) {
        unlink($filepath);
    }

    // Delete database record
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $note_id, $user_id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to delete note']);
    }
} else {
    echo json_encode(['error' => 'Note not found']);
}

$stmt->close();
$conn->close();