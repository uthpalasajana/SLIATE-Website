<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Knowledge Base File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include "../Admin/adminDashboard.php";
    ?>
<?php
include "../User/databaseConnection.php"; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fileUpload'])) {
    $file = $_FILES['fileUpload'];

    // Validate file type
    if ($file['type'] !== 'text/plain') {
        die("Unsupported file type. Please upload a .txt file.");
    }

    // Read the file content
    $fileContent = file_get_contents($file['tmp_name']);
    $fileName = basename($file['name']);

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO chatbot (file_name, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $fileContent);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>File uploaded and saved to the knowledge base successfully.</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error: " . $stmt->error . "</div>";
    }
}
?>


<div class="container py-5">
    <h1 class="text-center">Upload Knowledge Base Document</h1>
    <form id="uploadForm" enctype="multipart/form-data" method="POST" >
        <div class="mb-3">
            <label for="fileUpload" class="form-label">Select File</label>
            <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".txt" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

