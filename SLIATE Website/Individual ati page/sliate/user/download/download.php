<?php
// Database connection
include '../databaseConnection.php';

// Fetch categories
$category = isset($_GET['category']) ? $_GET['category'] : 'students'; // Default to 'students'

// Fetch downloads based on category
$query = "SELECT * FROM downloads WHERE category = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $category);
$stmt->execute();
$downloads = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Page</title>
    <link rel="stylesheet" href="./download.css">
</head>
<body>

<div class="sticky-top">
    <?php include "../navbar/navbar1.php"; ?>
</div>
    <div class="container">
        <h1>Download Page</h1>
        
        <!-- Category Selection -->
        <div class="category-selector">
            <a href="?category=students" class="category-btn <?php echo ($category == 'students') ? 'active' : ''; ?>">Students</a>
            <a href="?category=staff" class="category-btn <?php echo ($category == 'staff') ? 'active' : ''; ?>">Staff</a>
        </div>

        <!-- Display Downloads -->
        <h2><?php echo ucfirst($category); ?> Downloads</h2>
        <table class="downloads-table">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($downloads) > 0): ?>
                    <?php foreach ($downloads as $download): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($download['file_name']); ?></td>
                            <td><a href="<?php echo htmlspecialchars('../../Admin/' . $download['file_path']); ?>" download>Download</a>
                            </td>



                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No files available for download.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
