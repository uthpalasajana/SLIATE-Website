<?php
// Include the database connection
include "../../databaseConnection.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $news_id = intval($_GET['id']); // Sanitize the input to prevent SQL injection

    // Fetch the news details from the database
    $stmt = $conn->prepare("SELECT * FROM latestnews_cards WHERE id = ?");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
    } else {
        echo "News not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Computing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../navbar/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom Styles */
        .header {
            background-image: url('../../images/latestnews.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-weight: bold;
            font-size: 3rem;
        }

        .header p {
            margin-top: 10px;
            font-size: 1.2rem;
        }

    </style>
</head>
<body>

<div class="sticky-top">
<?php
include "../htdocs/sliate/user/navbar/navbar1.php";
?>
</div>
    <!-- Header Section -->
    <div class="header">
    <div class="container" style="color: #FEFCFB; background-color: rgba(10, 17, 40, 0.5);">
            <h1>Latest News</h1>
            <p>Advanced Technological Institute-Gampaha</p>
        </div>
    </div>


    <div class="container mt-4">
        <div class="card">
            <img src="<?php echo "../../../Admin/" . $news['image_path']; ?>" class="card-img-top" style="width: 100%; height: 100%;" alt="<?php echo $news['title']; ?>">
            <div class="card-body">
                <h3 class="card-title"><?php echo $news['title']; ?></h3>
                <p class="text-muted"><em><?php echo date("F d, Y", strtotime($news['date'])); ?></em></p>
                <p class="card-text"><?php echo nl2br($news['fulldetails']); ?></p>
                <?php if (!empty($news['link'])): ?>
                    <a href="<?php echo $news['link']; ?>" target="_blank" class="btn btn-primary">Visit Source</a>
                <?php endif; ?>
            </div>
        </div>
        <a href="../homePage.php" class="btn btn-secondary mt-3">Back to News</a>
    </div>
</body>
</html>
