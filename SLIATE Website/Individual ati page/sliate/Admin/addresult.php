<?php
// Database connection
include '../user/databaseConnection.php';

// Handle form submissions
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_course'])) {
        // Add course
        $course_name = $_POST['course_name'];
        $stmt = $conn->prepare("INSERT INTO courses (course_name) VALUES (?)");
        $stmt->bind_param("s", $course_name);
        if ($stmt->execute()) {
            $message = "Course added successfully!";
        } else {
            $message = "Error adding course: " . $conn->error;
        }
    } elseif (isset($_POST['add_result'])) {
        // Add result
        $course_id = $_POST['course_id'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $result_file_path = $_FILES['result_file']['name'];
        
        // Save the uploaded file
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['result_file']['name']);
        if (move_uploaded_file($_FILES['result_file']['tmp_name'], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO results (course_id, year, semester, result_file_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $course_id, $year, $semester, $target_file);
            if ($stmt->execute()) {
                $message = "Result added successfully!";
            } else {
                $message = "Error adding result: " . $conn->error;
            }
        } else {
            $message = "Error uploading file.";
        }
    } elseif (isset($_POST['delete_result'])) {
        // Delete result
        $result_id = $_POST['result_id'];
        $stmt = $conn->prepare("DELETE FROM results WHERE result_id = ?");
        $stmt->bind_param("i", $result_id);
        if ($stmt->execute()) {
            $message = "Result deleted successfully!";
        } else {
            $message = "Error deleting result: " . $conn->error;
        }
    }
}

// Fetch courses for the dropdown
$courses_query = $conn->query("SELECT * FROM courses");
$courses = $courses_query->fetch_all(MYSQLI_ASSOC);

// Fetch all results
$results_query = $conn->query("
    SELECT results.result_id, courses.course_name, results.year, results.semester, results.result_file_path 
    FROM results 
    INNER JOIN courses ON results.course_id = courses.course_id
");
$results = $results_query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Manage Results</title>
    <link rel="stylesheet" href="./addresult.css">
</head>
<body>

<?php include "./admindashboard.php";?>

    <div class="container">
        <h1>Manage Results</h1>
        <?php if ($message): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <div class="form-container">
            <!-- Add Course Form -->
            <form method="POST">
                <h2>Add Course</h2>
                <div class="form-group">
                    <label for="course_name">Course Name:</label>
                    <input type="text" name="course_name" id="course_name" required>
                </div>
                <button type="submit" name="add_course">Add Course</button>
            </form>

            <!-- Add Result Form -->
            <form method="POST" enctype="multipart/form-data">
                <h2>Add Result</h2>
                <div class="form-group">
                    <label for="course_id">Course:</label>
                    <select name="course_id" id="course_id" required>
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['course_id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="number" name="year" id="year" min="2000" max="<?php echo date('Y'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester:</label>
                    <select name="semester" id="semester" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="result_file">Result File:</label>
                    <input type="file" name="result_file" id="result_file" accept=".pdf,.docx,.xlsx" required>
                </div>
                <button type="submit" name="add_result">Add Result</button>
            </form>
        </div>

        <!-- Display Results -->
        <div class="results-container">
            <h2>Existing Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($result['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($result['year']); ?></td>
                            <td><?php echo htmlspecialchars($result['semester']); ?></td>
                            <td>
                                <a href="<?php echo htmlspecialchars($result['result_file_path']); ?>" download>Download</a>
                            </td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="result_id" value="<?php echo $result['result_id']; ?>">
                                    <button type="submit" name="delete_result" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
