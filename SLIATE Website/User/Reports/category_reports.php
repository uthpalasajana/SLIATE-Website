<?php
include "../databaseConnection.php";

// Fetch category from query string
$category = $_GET['category'] ?? '';
$category = htmlspecialchars($category); // Sanitize input to prevent SQL injection

// Fetch reports belonging to the category
$stmt = $conn->prepare("SELECT * FROM report WHERE reportCategory = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("No reports found for this category.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords(str_replace('_', ' ', $category)); ?> Reports</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="reports.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .report-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .report-card img {
      max-height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<?php include "../navbar/navbar.php"?>


    
    <header class="header">
        <div class="container text-center">
        <h1 class="mb-4 text-center"><?php echo ucwords(str_replace('_', ' ', $category)); ?> Reports</h1>
            <p>Empowering Your Future with Advanced Education</p>
        </div>
    </header>

    <div class="container py-5">
    <?php while ($report = $result->fetch_assoc()): 
        $image_path = "../../Admin/" . htmlspecialchars($report['image_url']);
        $pdf_path = "../../Admin/" . htmlspecialchars($report['pdf_url']);
    ?>
    <div class="report-card">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?php echo $image_path; ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($report['title']); ?>">
            </div>
            <div class="col-md-8">
                <h3><?php echo htmlspecialchars($report['title']); ?></h3>
                <p>
                    <?php echo nl2br(htmlspecialchars($report['overview'])); ?>
                    <span class="hidden-content">
                        <?php echo nl2br(htmlspecialchars($report['details'])); ?>
                    </span>
                </p>
                <button class="btn btn-primary read-more-btn">Read More</button>
                
                <!-- Download PDF Button -->
                <?php if (!empty($report['pdf_url'])): ?>
                    <a href="<?php echo $pdf_path; ?>" download class="btn btn-success">
                        Download PDF
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
          
</div>


<script>
    // Read More Button Toggle
    document.querySelectorAll('.read-more-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const hiddenContent = this.closest('.report-card').querySelector('.hidden-content');

            if (hiddenContent.style.display === 'none' || hiddenContent.style.display === '') {
                hiddenContent.style.display = 'inline';
                this.textContent = 'Read Less';
            } else {
                hiddenContent.style.display = 'none';
                this.textContent = 'Read More';
            }
        });
    });
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php include "../footer/footer.php"; ?>
</body>
</html>
