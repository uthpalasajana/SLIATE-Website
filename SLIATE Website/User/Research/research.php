<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Research Categories</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="research.css">
  <link rel="stylesheet" href="../navbar/navbar.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .report-card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      text-decoration: none; /* Removes underline */
      color: inherit; /* Inherits text color */
    }

    .report-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .report-icon {
      font-size: 48px;
      color: #007bff;
    }
  </style>
</head>
<body>
<?php include "../navbar/navbar.php"?>

 <!-- Header Section -->
 <header class="header">
    <div class="container text-center">
        <h1>Research</h1>
        <p>Empowering Your Future with Advanced Education</p>
    </div>
</header>

<div class="container py-5">
  <h1 class="text-center mb-5">Research Categories</h1>
  <div class="row g-4">

    <!-- Report Category Cards -->
    <div class="row">
  <div class="col-md-4">
    <a href="categoryResearch.php?category=Research Symposium" class="card report-card text-center">
      <div class="card-body">
        <div class="report-icon mb-3">📚</div>
        <h5 class="card-title">Research Symposium</h5>
        <p class="card-text">Explore and track research symposium activities.</p>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="categoryResearch.php?category=Research Allowance" class="card report-card text-center">
      <div class="card-body">
        <div class="report-icon mb-3">📑</div>
        <h5 class="card-title">Research Allowance</h5>
        <p class="card-text">Detailed insights into grant and research fund management.</p>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="categoryResearch.php?category=Research Papers" class="card report-card text-center">
      <div class="card-body">
      <div class="report-icon mb-3">📑</div>
        <h5 class="card-title">Research Papers</h5>
        <p class="card-text">Monitor and manage your academic publications.</p>
      </div>
    </a>
  </div>
</div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../footer/footer.php"; ?>

</body>
</html>
