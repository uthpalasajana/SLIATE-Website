<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Gallery</title>
    <link rel="stylesheet" href="../navbar//navbar.css">
    <link rel="stylesheet" href="homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="color: white; background-color: #FCFEFB;">

<div class="sticky-top">
    <?php include "../navbar/navbar.php"; ?>
</div>

<?php include "../slider/imageslider.php"; ?>

<div class="cardcontainer d-flex flex-wrap gap-3 p-3">
    <?php 
 

    $result = $conn->query("SELECT * FROM cards");
    while ($row = $result->fetch_assoc()): 
        $image_path = "../../Admin/" . $row['image_path']; 
    ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $image_path; ?>" class="card-img-top" style="height: 200px;" alt="<?php echo htmlspecialchars($row['title']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<div class="container-fluid icon-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="http://www.sliate.ac.lk/result/"><img src="../images/checklist.png" alt="Library"></a>
                <p>online Result</p>
            </div>
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="https://student.sliate.ac.lk/"><img src="../images/graduation.png" alt="Student Management"></a>
                <p>Student Management System</p>
            </div>
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="https://lms.sliate.ac.lk/"><img src="../images/lms.png" alt="Learning Management"></a>
                <p>Learning Management System</p>
            </div>
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="../chatbot/chatbot.html"><img src="../images/robot.png" alt="Explore"></a>
                <p>Chat Bot</p>
            </div>
        </div>
    </div>
</div>

<?php include "latestnews/latestnews.php"; ?>

<div class="container-fluid icon-section">
    <div class="container">
        <div class="row justify-content-center">
        
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="../gallery/gallery.php"><img src="../images/gallery.png" alt="Virtual Learning"></a>
                <p>Gallary</p>
            </div>
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="../informationslide.php"><img src="../images/calendar.png" alt="Student Information"></a>
                <p>Calender</p>
            </div>
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="#"><img src="../images/search.png" alt="Explore University"></a>
                <p>Vacancies</p>
            </div>
        </div>
    </div>
</div>

<?php include "../gallery/galleryhomepage.php"; ?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<?php include "../footer/footer.php"; ?>

</body>
</html>
