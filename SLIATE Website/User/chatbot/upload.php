<?php
include "../databaseConnection.php"; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileUpload'])) {
    $file = $_FILES['fileUpload'];

    // Validate file type
    $allowedTypes = ['text/plain'];
    if (!in_array($file['type'], $allowedTypes)) {
        die("Unsupported file type. Please upload a .txt file.");
    }

    // Read the file content
    $fileContent = file_get_contents($file['tmp_name']);
    $fileName = basename($file['name']);

    // Insert content into the database
    $stmt = $conn->prepare("INSERT INTO chatbot (file_name, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $fileContent);

    if ($stmt->execute()) {
        echo "File uploaded and saved to the knowledge base successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>