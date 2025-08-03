<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload to Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include "../User/databaseConnection.php";

include "../Admin/adminDashboard.php";
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $image = $_FILES['image'];

    // File upload path
    $upload_dir = 'uploads/';
    $file_name = basename($image['name']);
    $target_path = $upload_dir . $file_name;

    // Move uploaded file to target directory
    if (move_uploaded_file($image['tmp_name'], $target_path)) {
        // Insert image details into the database
        $sql = "INSERT INTO gallery (image_url, title, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $target_path, $title, $description);
        if ($stmt->execute()) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error uploading image: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error moving uploaded file.";
    }
}
$conn->close();
?>


    <div class="container mt-5">
        <h2 class="text-center">Upload Image to Gallery</h2>
        <form  method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Image Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
