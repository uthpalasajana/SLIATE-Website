<?php
// Database connection
include "../databaseConnection.php"; // Ensure this file connects to your database

// Query to fetch images
$result = $conn->query("SELECT * FROM slider_images"); // Modify table name as needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Image Slider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide" style="padding:0;">
  <!-- Carousel Indicators -->
  <div class="carousel-indicators">
    <?php
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $active = ($i === 0) ? 'active' : '';
        echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' class='$active' aria-label='Slide " . ($i + 1) . "'></button>";
        $i++;
    }
    ?>
  </div>

  <!-- Carousel Inner -->
  <div class="carousel-inner" style="height:600px;">
    <?php
    $result->data_seek(0); // Reset the result pointer
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $active = ($i === 0) ? 'active' : '';
        $image_path = "../../Admin/" . $row['image_path']; // Adjust path to Admin/uploads/
        echo "<div class='carousel-item $active'>
                <img src='$image_path' class='d-block w-100' alt='Slide Image'>
              </div>";
        $i++;
    }
    ?>
  </div>

  <!-- Carousel Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
