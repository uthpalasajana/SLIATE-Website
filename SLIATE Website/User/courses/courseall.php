<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="courses.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .header {
    background-image: url('../images/graduation.jpg'); /* Replace with your banner image */
    background-size: cover;
    background-position: center;
    height: 300px;
    color:white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative; /* Needed for pseudo-element */
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.8); /* Full shadow around the header */
        
       }

        .course-details {
            padding: 30px 0;
        }

        .course-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .course-card img {
            max-width: 100%;
            border-radius: 10px;
        }

        .course-info {
            padding: 20px;
        }

        .course-info h2 {
            color: #007bff;
        }

        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include "../navbar/navbar.php"?>
    <!-- Header Section -->
    <header class="header text-center">
        <div class="container">
            <?php
            include "../databaseConnection.php";

            // Fetch the course_id from the query parameter
            if (isset($_GET['id'])) {
                $course_id = intval($_GET['id']);

                // Fetch the course details from the database
                $sql = "SELECT * FROM courses WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $course_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Display the course name in the header
                    echo '<h2>' . htmlspecialchars($row['course_name']) . '</h2>';
                } else {
                    echo '<h2 class="text-danger">Course not found.</h2>';
                }

                $stmt->close();
            } else {
                echo '<h2 class="text-danger">Invalid course ID.</h2>';
            }

            $conn->close();
            ?>
        </div>
    </header>

    <!-- Course Details Section -->
    <section class="course-details">
        <div class="container">
            <?php
            // Fetch the course details if not already fetched in the header
            if (isset($row)) {
                // Construct the correct image path
                $image_path = "../../Admin/" . $row['image_url'];

                // Display the course details
                echo '
                <div class="course-card row align-items-center">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="' . $image_path . '" alt="Course Image" class="img-fluid">
                        <p><strong>Duration:</strong> ' . htmlspecialchars($row['duration']) . '</p>
                        <p><strong>Intake Months:</strong> ' . htmlspecialchars($row['intake_months']) . '</p>
                    </div>
                    <!-- Details Column -->
                    <div class="col-md-6 course-info">
                        <p><strong>Description:</strong> ' . nl2br(htmlspecialchars($row['description'])) . '</p>
                        <a href="courses.php" class="btn btn-secondary">Back to Courses</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include "../footer/footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
