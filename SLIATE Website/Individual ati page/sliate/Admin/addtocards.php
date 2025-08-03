<?php
include "../user/databaseConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $image_name = basename($_FILES['image']['name']);
        $target_file = $upload_dir . $image_name;

        // Create upload directory if not exists
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Save card details to the database
            $title = $_POST['title'];
            $description = $_POST['description'];
            $fulldescription = $_POST['fulldescription'];
            $link = $_POST['link'];

            $stmt = $conn->prepare("INSERT INTO cards (title, description,fulldescription, image_path, link) VALUES (?, ?, ?, ?,?)");
            $stmt->bind_param("sssss", $title, $description,$fulldescription, $target_file, $link);
            $stmt->execute();
            echo "Card added successfully!";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Error uploading the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Card Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<?php include "./admindashboard.php";?>

<div class="container mt-5">
    <h3>Add New Card</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Card Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Card Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Full Description</label>
            <textarea class="form-control" id="description" name="fulldescription" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Card Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Card Link</label>
            <input type="url" class="form-control" id="link" name="link" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Card</button>
    </form>
</div>
</body>
</html>
