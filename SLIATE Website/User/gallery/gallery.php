<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="gallery.css">
  <link rel="stylesheet" href="../navbar/navbar.css">
 
</head>
<body>
<?php include "../navbar/navbar.php"?>

<header class="header">
        <div class="container text-center">
            <h1>Gallery</h1>
            <p>Empowering Your Future with Advanced Education</p>
        </div>
    </header>

  <div class="container py-5">
    <h1 class="text-center mb-4">Gallery</h1>
    <div class="gallery-container">



      <?php
      include '../databaseConnection.php';

      // Fetch gallery images from the database
      $sql = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // Construct the correct image path
              $image_path = "../../Admin/" . htmlspecialchars($row['image_url']);

              // Output the gallery card HTML
              echo '
              <div class="gallery-item">
                <img src="' . $image_path . '" alt="' . htmlspecialchars($row['title']) . '" class="gallery-image">
                <div class="gallery-caption">
                  <h5>' . htmlspecialchars($row['title']) . '</h5>
                  <p>' . htmlspecialchars($row['description']) . '</p>
                </div>
              </div>';
          }
      } else {
          echo '<div class="col-12"><p class="text-center text-danger">No images in the gallery yet.</p></div>';
      }

      $conn->close();
      ?>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <?php
       include "../footer/footer.php";
    ?>
</body>
</html>
