<?php
include "../databaseConnection.php";

// Fetch category from query string
$category = $_GET['category'] ?? '';
$category = htmlspecialchars($category); // Sanitize input to prevent SQL injection

// Fetch reports belonging to the category
$stmt = $conn->prepare("SELECT * FROM research WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("No research found for this category.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords(str_replace('_', ' ', $category)); ?> Research</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="research.css">
  <style>
    .research-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .research-card img {
      max-height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<?php include "../navbar/navbar.php"?>
<header class="header">
        <div class="container text-center">
        <h1 class="mb-4 text-center"><?php echo ucwords(str_replace('_', ' ', $category)); ?></h1>
            <p>Empowering Your Future with Advanced Education</p>
        </div>
    </header>
<div class="container py-5">
   

    <?php while ($research = $result->fetch_assoc()): 
        $image_path = "../../Admin/" . htmlspecialchars($research['image_url']);
    ?>
    <div class="research-card">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?php echo $image_path; ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($research['title']); ?>">
            </div>
            <div class="col-md-8">
                <h3><?php echo htmlspecialchars($research['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($research['overview'])); ?></p>
                <a href="report_details.php?id=<?php echo $research['id']; ?>" class="btn btn-primary">View Details</a>
                
                <?php if (!empty($research['pdf_url'])): ?>
                    <a href="<?php echo htmlspecialchars($research['pdf_url']); ?>" download class="btn btn-success">Download PDF</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php include "../footer/footer.php"; ?>

</body>
</html>
