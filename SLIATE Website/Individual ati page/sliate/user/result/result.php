<?php
// Database connection
include '../databaseConnection.php';

// Fetch courses for the dropdown
$courses_query = $conn->query("SELECT * FROM courses");
$courses = $courses_query->fetch_all(MYSQLI_ASSOC);

// Handle search
$results = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];

    $query = "SELECT r.result_id, c.course_name, r.year, r.semester, r.result_file_path 
              FROM results r 
              JOIN courses c ON r.course_id = c.course_id 
              WHERE r.course_id = ? AND r.year = ? AND r.semester = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $course_id, $year, $semester);
    $stmt->execute();
    $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../result/result.css">
</head>
<body><div class="sticky-top">
    <?php include "../navbar/navbar1.php"; ?>
</div>

    <div class="container">
        <h1>Search Results</h1>
        <form method="POST">
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
            <button type="submit">Search</button>
        </form>

        <?php if (!empty($results)): ?>
            <h2>Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($result['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($result['year']); ?></td>
                            <td><?php echo htmlspecialchars($result['semester']); ?></td>
                            <td>
                            <a href="<?php echo htmlspecialchars('../../Admin/' . $result['result_file_path']); ?>" download>Download</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>No results found for the selected criteria.</p>
        <?php endif; ?>
    </div>
</body>
</html>
