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

<?php

include "../User/databaseConnection.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    // Handle file upload
    $targetDir = "uploads/";
    $imagePath = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO Upcommingevents (day, month, year, image_path, title, description, link) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $day, $month, $year, $imagePath, $title, $description, $link);

    if ($stmt->execute()) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<form method="POST" enctype="multipart/form-data" class="container mt-4 p-4 border rounded shadow-sm bg-light">
    <h2 class="mb-4 text-center">Add New Event</h2>
    
    <div class="mb-3">
        <label for="day" class="form-label">Day:</label>
        <input type="text" id="day" name="day" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="month" class="form-label">Month:</label>
        <input type="text" id="month" name="month" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="year" class="form-label">Year:</label>
        <input type="number" id="year" name="year" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">Event Image:</label>
        <input type="file" id="image" name="image" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="title" class="form-label">Event Title:</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
    </div>
    
    <div class="mb-3">
        <label for="link" class="form-label">More Info Link:</label>
        <input type="url" id="link" name="link" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary w-100">Submit Event</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
