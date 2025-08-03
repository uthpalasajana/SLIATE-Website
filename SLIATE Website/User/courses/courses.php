<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details - SLIATE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="courses.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
</head>
<body>

<?php include "../navbar/navbar.php"?>
    <!-- Header Section -->
    <header class="header">
        <div class="container text-center">
            <h1>Explore Our Courses</h1>
            <p>Empowering Your Future with Advanced Education</p>
        </div>
    </header>

    <!-- Courses Section -->
    <section class="courses">
        <div class="container">
            <div class="row">




            <?php
include "../databaseConnection.php";

// Fetch all courses from the database
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Construct the correct image path
        $image_path = "../../Admin/" . htmlspecialchars($row['image_url']);

        // Output the course card HTML
        echo '
        <div class="col-md-4 mb-4">
            <div class="course-card shadow p-3">
                <img src="' . $image_path . '" alt="' . htmlspecialchars($row['course_name']) . '" class="img-fluid mb-3 rounded">
                <h3 class="text-primary">' . htmlspecialchars($row['course_name']) . '</h3>
                <p><strong>Duration:</strong> ' . htmlspecialchars($row['duration']) . '</p>
                <p><strong>Intake Months:</strong> ' . htmlspecialchars($row['intake_months']) . '</p>
                <a href="courseall.php?id=' . urlencode($row['id']) . '" class="btn btn-primary">View More</a>
            </div>
        </div>';
    }
} else {
    echo '<div class="col-12"><p class="text-danger">No courses available.</p></div>';
}

$conn->close();
?>





              
                
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
       include "../footer/footer.php";
    ?>
</body>
</html>
