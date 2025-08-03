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
            $date = $_POST['date'];
            $description = $_POST['description'];
            $fulldescription = $_POST['fulldetails'];
            $link = $_POST['link'];

            $stmt = $conn->prepare("INSERT INTO latestnews_cards (title, date,description,fulldetails, image_path, link) VALUES (?, ?, ?, ?,?,?)");
            $stmt->bind_param("ssssss", $title,$date, $description,$fulldescription, $target_file, $link);
            $stmt->execute();
            echo "Card added successfully!";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Error uploading the file.";
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM latestnews_cards WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Card deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting card: " . $conn->error . "</div>";
    }

    $stmt->close();
}

// Fetch all rows
$result = $conn->query("SELECT * FROM latestnews_cards");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Card Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php include "./admindashboard.php";?>

<div class="container mt-5">
    <h1 class="mb-4">Add Card Details</h1>
    <form  method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Card Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Card Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Full Description</label>
            <textarea class="form-control" id="description" name="fulldetails" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link (Optional)</label>
            <input type="url" class="form-control" id="link" name="link">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="container mt-5">
    <h1 class="mb-4">Existing Cards</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Date</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><img src="<?php echo $row['image_path']; ?>" alt="Image" style="width: 100px; height: auto;"></td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No cards found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
