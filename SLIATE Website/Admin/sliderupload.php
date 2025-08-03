<?php
include "../User/databaseConnection.php";

// Handle File Upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    if ($_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $image_name = basename($_FILES['image']['name']);
        $target_file = $upload_dir . $image_name;

        // Create upload directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move the file to the upload directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insert the image path into the database
            $stmt = $conn->prepare("INSERT INTO slider_images (image_path) VALUES (?)");
            $stmt->bind_param("s", $target_file);
            $stmt->execute();
            echo "<div class='alert alert-success'>Image uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to upload the image.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error uploading the file.</div>";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    // Get the image path to delete the file
    $query = $conn->prepare("SELECT image_path FROM slider_images WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $image = $result->fetch_assoc();

    if ($image) {
        unlink($image['image_path']); // Delete the image file
        $stmt = $conn->prepare("DELETE FROM slider_images WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "<div class='alert alert-success'>Image deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Image not found.</div>";
    }
}

// Fetch all images
$images = $conn->query("SELECT * FROM slider_images");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Slider Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include "../Admin/adminDashboard.php";
    ?>
<div class="container mt-5">
    <h3>Upload Image for Slider</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Image</button>
    </form>

    <h3 class="mt-5">Manage Slider Images</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $images->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td>
                    <img src="<?php echo $row['image_path']; ?>" alt="Slider Image" style="width: 100px; height: auto;">
                </td>
                <td>
                    <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
