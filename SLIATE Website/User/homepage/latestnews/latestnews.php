<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest News and Conferences</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    /* Hover Effect for Image */
    .hover-img {
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .hover-img img {
        transition: transform 0.3s ease-in-out;
    }

    .hover-img:hover img {
        transform: scale(1.1);
    }

    /* Overlay with "See More" */
    .hover-img .see-more {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        text-align: center;
        padding: 10px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .hover-img:hover .see-more {
        opacity: 1;
    }
</style>

</head>
<body>
    <!-- Header Section -->
    <div class="container my-5">
        <div class="row">
            <!-- Latest News Section -->
            <div class="col-md-8">
                <a href="../informationslide.php"><h3 style="color:black">Latest News</h3></a>


                <?php
             //include "../../databaseConnection.php";

              $result = $conn->query("SELECT * FROM latestnews_cards ORDER BY date DESC");

    while ($row = $result->fetch_assoc()) {
        $image_path = "../../Admin/" . $row['image_path']; 
    $title = $row['title'];
    $date = date("F d, Y", strtotime($row['date']));
    $description = $row['description'];
    $link = $row['link'];
    ?>

                <!-- Card 1 -->
                <div class="card mb-3">
                    <div class="row g-0">
                    <div class="col-md-4 hover-img">
                <img src="<?php echo $image_path; ?>" class="img-fluid rounded-start" alt="<?php echo $title; ?>">
                <div class="see-more">See More</div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?php echo $title; ?></h5>
                    <p class="text-success"><em><?php echo $date; ?></em></p>
                    <p class="card-text"><?php echo $description; ?></p>
                    <?php if ($link): ?>
                        <a href="../homepage/latestnews/latestnewsall.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>

                    <?php endif; ?>
                </div>
                        </div>
                    </div>
                </div>
                <?php
                }
              ?>
                

                <!-- Card 2 -->
                
            </div>

            <?php

//include "../User/databaseConnection.php";
// Fetch data
$sql = "SELECT * FROM Upcommingevents";
$result = $conn->query($sql);
/*$image_path = "../../../Admin/" . $row['image_path']; */
?>
            

            <!-- Upcoming Conferences Section -->
            <div class="col-md-4">
    <h3 style="color:black">Upcoming Events</h3>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card text-center mb-3">
            <div class="bg-success text-white py-3">
                <h4 class="mb-0"><?= htmlspecialchars($row['day']) ?></h4>
                <p class="mb-0"><?= htmlspecialchars($row['month']) ?></p>
            </div>
            <div class="bg-primary text-white py-2">
                <h5 class="mb-0"><?= htmlspecialchars($row['year']) ?></h5>
            </div>
            <div class="card">
            <img src="<?php echo "../../Admin/" . $row['image_path']; ?>" class="card-img-top" style="width: 100%; height: 100%;" alt="<?php echo $row['title']; ?>">
               
                <div class="card-body">
                    <h5 class="mt-2">
                    <a href="../homepage/latestnews/upcommingEventsall.php?idevents=<?= $row['idevents'] ?>" class="text-decoration-none text-dark fw-bold">
                     <?= htmlspecialchars($row['title']) ?>
                              </a>
                    </h5>
                    <p class="text-muted"><?= htmlspecialchars($row['description']) ?></p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

               


            </div>
        </div>
        </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>