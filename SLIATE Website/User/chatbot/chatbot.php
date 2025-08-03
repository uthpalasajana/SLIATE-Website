<?php
include "../databaseConnection.php"; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message'] ?? '');

    if (empty($message)) {
        echo "Please ask a valid question.";
        exit;
    }

    // Query the database for matching content
    $stmt = $conn->prepare("SELECT content FROM chatbot");
    $stmt->execute();
    $result = $stmt->get_result();

    $found = false;
    $response = "";

    while ($row = $result->fetch_assoc()) {
        $lines = explode("\n", $row['content']); // Split content into lines
        foreach ($lines as $line) {
            if (stripos($line, $message) !== false) {
                $response .= $line . "\n";
                $found = true;
            }
        }
    }

    if ($found) {
        echo nl2br(trim($response)); // Return the relevant text
    } else {
        echo "I couldn't find a specific answer to your question in the knowledge base.";
    }
}
?>
