<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Not authenticated']);
    exit();
}

if (!isset($_FILES['noteFile'])) {
    echo json_encode(['error' => 'No file uploaded']);
    exit();
}

$file = $_FILES['noteFile'];
$user_id = $_SESSION['user_id'];

// Check for upload errors
if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['error' => 'Upload failed']);
    exit();
}

// Create uploads directory if it doesn't exist
$uploadDir = __DIR__ . '/uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Generate unique filename
$filename = uniqid() . '_' . basename($file['name']);
$uploadPath = $uploadDir . $filename;

// Move uploaded file
if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
    // Save file info to database
    $stmt = $conn->prepare("INSERT INTO notes (user_id, title, content, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iss", $user_id, $file['name'], 'uploads/' . $filename);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        unlink($uploadPath); // Delete the uploaded file if database insert fails
        echo json_encode(['error' => 'Database error']);
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'Failed to save file']);
}

$conn->close();