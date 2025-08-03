<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Club Activities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include "../Admin/adminDashboard.php";
    ?>

<?php
include "../User/databaseConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $button_text = $_POST['button_text'] ?: 'Learn More';

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $stmt = $conn->prepare("INSERT INTO student_life (image_path, title, description, button_text) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $target_file, $title, $description, $button_text);

    if ($stmt->execute()) {
        echo "Activity added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<div class="container mt-5">
    <h2 class="text-center">Add Club Activity</h2>
    <form  method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Club Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="button_text" class="form-label">Button Text</label>
            <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Optional">
        </div>
        <button type="submit" class="btn btn-primary">Add Activity</button>
    </form>
</div>
</body>
</html>
