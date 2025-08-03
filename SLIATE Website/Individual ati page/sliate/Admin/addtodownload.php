<?php
// Database connection
include '../user/databaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $category = $_POST['category'];

    // Define the upload directory
    $upload_dir = 'uploads/';
    $file_path = $upload_dir . basename($file_name);

    // Move the uploaded file to the server directory
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO downloads (file_name, file_path, category) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $file_name, $file_path, $category);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-3'>File uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error uploading file.</div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-3'>Error uploading file.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for color theme -->
    <style>
        body {
            background-color: #0A1128;
            color: white;
        }

        .container {
            background-color: #001F54;
            border-radius: 10px;
            padding: 20px;
        }

        h1 {
            color: #1282A2;
        }

        .form-control, .form-control-file {
            background-color: #034078;
            color: white;
            border: 1px solid #1282A2;
        }

        .form-control:focus {
            background-color: #034078;
            color: white;
            border-color: #1282A2;
        }

        button.btn-primary {
            background-color: #1282A2;
            border-color: #1282A2;
        }

        button.btn-primary:hover {
            background-color: #0A1128;
            border-color: #0A1128;
        }

        .alert-success {
            background-color: #1282A2;
            color: white;
        }

        .alert-danger {
            background-color: #034078;
            color: white;
        }
    </style>
</head>
<body>
<?php include "./admindashboard.php";?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload File</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="students">Students</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <div class="form-group">
                <label for="file">Choose File:</label>
                <input type="file" name="file" id="file" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
