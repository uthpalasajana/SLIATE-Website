<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    echo json_encode(['error' => 'Unauthorized access']);
    exit();
}

// Database connection (update with your credentials)
include "../User/databaseConnection.php";

// Fetch notifications from the database
$sql = "SELECT name, subject, message FROM contact_responses ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $responses = [];
    while ($row = $result->fetch_assoc()) {
        $responses[] = $row;
    }

    echo json_encode(['count' => count($responses), 'responses' => $responses]);
} else {
    echo json_encode(['count' => 0, 'responses' => []]);
}

$conn->close();
?>
