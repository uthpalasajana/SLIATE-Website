<?php
// Database connection
include "../User/databaseConnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if an image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
    
        $image_name = basename($_FILES['image']['name']);
        $target_image_file = $upload_dir . $image_name;

        // Create upload directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move uploaded image file to target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_image_file)) {
            // Check if a PDF file is uploaded
            if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0) {
                $pdf_name = basename($_FILES['pdf']['name']);
                $target_pdf_file = $upload_dir . $pdf_name;

                // Move uploaded PDF file to target directory
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $target_pdf_file)) {
                    // Save report details to the database
                    $title = $_POST['title'];
                    $overview = $_POST['overview'];
                    $category = $_POST['category'];
                    $details = $_POST['details'];
                    $image_url = $target_image_file;
                    $pdf_url = $target_pdf_file;

                    $stmt = $conn->prepare("INSERT INTO report (title, overview, details, reportCategory, image_url, pdf_url) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $title, $overview, $details, $category, $image_url, $pdf_url);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Report added successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                    }
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-danger'>Failed to upload the PDF file.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Please upload a valid PDF file.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Failed to upload the image.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Please upload a valid image.</div>";
    }
}

// Fetch all reports
$reports = $conn->query("SELECT * FROM report");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Validate the ID to prevent SQL injection

    // Fetch the image and PDF URLs to delete the files
    $stmt = $conn->prepare("SELECT image_url, pdf_url FROM report WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();

    if ($report) {
        $image_path = $report['image_url'];
        $pdf_path = $report['pdf_url'];

        // Delete the image and PDF files from the server
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        if (file_exists($pdf_path)) {
            unlink($pdf_path);
        }

        // Delete the record from the database
        $delete_stmt = $conn->prepare("DELETE FROM report WHERE id = ?");
        $delete_stmt->bind_param("i", $id);
        if ($delete_stmt->execute()) {
            echo "<script>alert('Report deleted successfully!'); window.location.href = 'addReports.php';</script>";
        } else {
            echo "<script>alert('Error deleting the report.'); window.location.href = 'addReports.php';</script>";
        }
        $delete_stmt->close();
    } else {
        echo "<script>alert('Report not found.'); window.location.href = 'addReports.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include "../Admin/adminDashboard.php";
    ?>
<div class="container py-5">
    <h2>Add a New Report</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea class="form-control" id="overview" name="overview" rows="2" required></textarea>
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled selected>Select a category</option>
                <option value="Common Curricular">Common Curricular</option>
                <option value="Internal Curricular">Internal Curricular</option>
                <option value="Governing Council Minutes">Governing Council Minutes</option>
                <option value="Annual Report">Annual Report</option>
                <option value="Establishment Code">Establishment Code</option>
                <option value="SLQF Report">SLQF Report</option>
                <option value="Policy Papers">Policy Papers</option>
                <option value="Common Application Formats">Common Application Formats</option>
                <option value="SOR">SOR</option>
                <option value="List Of Registered Suppliers">List Of Registered Suppliers</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="pdf" class="form-label">Upload PDF</label>
            <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Report</button>
    </form>

    <h2 class="mt-5">Existing Reports</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>PDF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($report = $reports->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($report['id']) ?></td>
                    <td><?= htmlspecialchars($report['title']) ?></td>
                    <td><?= htmlspecialchars($report['reportCategory']) ?></td>
                    <td><img src="<?= htmlspecialchars($report['image_url']) ?>" alt="Image" style="width: 100px;"></td>
                    <td><a href="<?= htmlspecialchars($report['pdf_url']) ?>" target="_blank" class="btn btn-info btn-sm">Download PDF</a></td>
                    <td>
                        <a href="?id=<?= $report['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this report?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
