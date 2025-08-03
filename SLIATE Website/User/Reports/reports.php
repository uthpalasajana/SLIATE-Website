<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Categories</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="reports.css">
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
        <h1>Reports</h1>
        <p>Empowering Your Future with Advanced Education</p>
    </div>
</header>

<div class="container py-5">
  <h1 class="text-center mb-5">Report Categories</h1>
  <div class="row g-4">

    <!-- Report Category Cards -->
    <div class="col-md-4">
    <a href="category_reports.php?category=Common Curricular" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">📊</div>
          <h5 class="card-title">Common Curricular</h5>
          <p class="card-text">Track and analyze sales performance over time.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=Internal Curricular" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">📈</div>
          <h5 class="card-title">Internal Curricular</h5>
          <p class="card-text">Detailed insights into revenue generation.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=Governing Council Minutes" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">📉</div>
          <h5 class="card-title">Governing Council Minutes</h5>
          <p class="card-text">Monitor and manage your business expenses.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=Annual Report" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">👥</div>
          <h5 class="card-title">Annual Report</h5>
          <p class="card-text">Analyze customer behavior and demographics.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=Establishment Code" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">📦</div>
          <h5 class="card-title">Establishment Code</h5>
          <p class="card-text">Keep track of stock levels and product availability.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=SLQF Report" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">⚙️</div>
          <h5 class="card-title">SLQF Report</h5>
          <p class="card-text">Evaluate operational efficiency and productivity.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=Policy Papers" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">💰</div>
          <h5 class="card-title">Policy Papers</h5>
          <p class="card-text">Understand profitability with detailed P&L analysis.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=Common Application Formats" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">🛠️</div>
          <h5 class="card-title">Common Application Formats</h5>
          <p class="card-text">Track maintenance activities and schedules.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=SOR" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">📅</div>
          <h5 class="card-title">SOR</h5>
          <p class="card-text">Review attendance records and staff schedules.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
    <a href="category_reports.php?category=List Of Registered Suppliers" class="card report-card text-center">
        <div class="card-body">
          <div class="report-icon mb-3">📬</div>
          <h5 class="card-title">List Of Registered Suppliers</h5>
          <p class="card-text">Analyze customer and staff feedback.</p>
        </div>
      </a>
    </div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../footer/footer.php"; ?>

</body>
</html>
