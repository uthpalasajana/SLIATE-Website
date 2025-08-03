<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>


<body>
    <div class="sticky-left">

    <?php
include "../Admin/adminDashboard.php";
    ?>
    </div>

<?php
include "../User/databaseConnection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseName = $_POST['coursename'];
    $duration = $_POST['duration'];
    $intakeMonths = $_POST['intakemonths'];
    $description = $_POST['description'];

    // Handle image upload
    $imagePath = 'uploads/' . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        $stmt = $conn->prepare("INSERT INTO courses (course_name,description, duration, intake_months, image_url) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $courseName,$description, $duration, $intakeMonths, $imagePath);

        if ($stmt->execute()) {
            echo "Course added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }

    $conn->close();
}
?>


    <div class="container mt-5">
        <h2>Add New Course</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="courseName" class="form-label">Course Name</label>
                <input type="text" name="coursename" id="courseName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
            <div class="mb-3">
                <label for="intakeMonths" class="form-label">Intake Months</label>
                <input type="text" name="intakemonths" id="intakeMonths" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="courseImage" class="form-label">Course Image</label>
                <input type="file" name="image" id="courseImage" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>
</body>
</html>
