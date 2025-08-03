<?php
include "../User/databaseConnection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'] ?? '';
    $overview = $_POST['overview'] ?? '';
    $category = $_POST['category'] ?? '';
    $published_date = $_POST['published_date'] ?? '';  // Get the published date
    $pdf_url = $_FILES['pdf']['name'] ?? '';
    $image_url = $_FILES['image']['name'] ?? '';

    // File upload handling for PDF and Image
    $pdf_target = "uploads/" . basename($pdf_url);
    $image_target = "uploads/" . basename($image_url);

    move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_target);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO research (title, overview, category, pdf_url, image_url, published_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $overview, $category, $pdf_target, $image_target, $published_date);

    if ($stmt->execute()) {
        echo "Research added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Research</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include "../Admin/adminDashboard.php";
    ?>
<div class="container py-5">
    <h1 class="text-center">Add Research</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea class="form-control" id="overview" name="overview" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                <option value="Research Symposium">Research Symposium</option>
                <option value="Research Allowance">Research Allowance</option>
                <option value="Research Papers">Research Papers</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="published_date" class="form-label">Published Date</label>
            <input type="date" class="form-control" id="published_date" name="published_date" required>
        </div>

        <div class="mb-3">
            <label for="pdf" class="form-label">Research PDF</label>
            <input type="file" class="form-control" id="pdf" name="pdf">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Research Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
