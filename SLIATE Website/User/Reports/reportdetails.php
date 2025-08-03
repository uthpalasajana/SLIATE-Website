<?php
include "../databaseConnection.php";

// Fetch all reports
$result = $conn->query("SELECT * FROM report");

if (!$result || $result->num_rows === 0) {
    die("No reports found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Reports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="reports.css">
  <style>
    .hidden-content {
      display: none;
    }
    .report-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 20px;
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>

<?php include "../navbar/navbar.php"?>

<header class="header">
        <div class="container text-center">
            <h1>View All Reports</h1>
            <p>Empowering Your Future with Advanced Education</p>
        </div>
    </header>


<div class="container py-5">
    <h1 class="mb-4">Available Reports</h1>
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
<?php include "../footer/footer.php"; ?>
</body>
</html>
