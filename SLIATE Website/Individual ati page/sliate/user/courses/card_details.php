<?php
// Database connection
include '../databaseConnection.php'; // Adjust the path as needed

// Get the card ID from the URL
$card_id = $_GET['id'];

// Fetch card details
$stmt = $conn->prepare("SELECT * FROM cards WHERE id = ?");
$stmt->bind_param("i", $card_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the card exists
if ($result->num_rows > 0) {
    $card = $result->fetch_assoc();
} else {
    echo "Card not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($card['title']); ?></title>
    <link rel="stylesheet" href="../courses/carddetails.css"> <!-- Link to your CSS -->
</head>
<body>

<?php include "../navbar/navbar1.php"; ?>
    <div class="card-details">
        <img src="<?php echo "../../Admin/" . $card['image_path']; ?>" alt="<?php echo htmlspecialchars($card['title']); ?>" style="width: 100%; max-width: 500px;">
        <h1><?php echo htmlspecialchars($card['title']); ?></h1>
        <p><?php echo htmlspecialchars($card['description']); ?></p>
        <a href="../homepage/homePage.php" class="btn btn-secondary">Back to Courses</a> <!-- Adjust the link as needed -->
    </div>
</body>
</html>
