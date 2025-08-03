<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Gallery</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="color: white; background-color: #FCFEFB;">

<div class="sticky-top">
    <?php include "../navbar/navbar1.php"; ?>
</div>


<?php include "../slider/imageslider.php"; ?></br>

<h1 style="color: #034078;margin-left: 38rem;text-shadow:2px 2px 5px red;font-family: Nunito, sans-serif;">Our Courses</h1>
<div class="cardcontainer d-flex flex-wrap gap-3 p-3">
    
    
    
    <?php 
    

    
    $result = $conn->query("SELECT * FROM cards");
    while ($row = $result->fetch_assoc()): 
        $image_path = "../../Admin/" . $row['image_path']; 
        
    ?>

   
        <div class="card" style="width: 15rem;">


        
            <img src="<?php echo $image_path; ?>" class="card-img-top" style="height: 200px;" alt="<?php echo htmlspecialchars($row['title']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                <a href="../courses/card_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">More Information</a>

            </div>
        </div>
    <?php endwhile; ?>
</div>

<div class="container-fluid icon-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 icon-box">
                <a href="http://192.248.106.131/Results/"><img src="../images/paper.png" alt="Reesult"></a>
                <p>Online Results</p>
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
                <a href="#"><img src="../images/chatbot.png" alt="Chat Bot"></a>
                <p>Chat Bot</p>
            </div>
        </div>
    </div>
</div>

<?php include "latestnews/latestnews.php"; ?>


<section class="product-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 img-container">
                <img src="../images/movie2.jpg" alt="Furniture Indoor Product">
            </div>
            <div class="col-md-6">
                <p class="sub-title">New Collection</p>
                <h1 class="product-title">Furniture Indoor Product</h1>
                <p class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil id reiciendis quo recusandae? Sapiente rem omnis, nam
                    consequuntur dignissimos libero maiores, voluptates quod accusamus doloribus fuga ducimus quibusdam tenetur.
                </p>
                <button class="btn btn-decorate">Decorate Your House</button>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<?php include "../footer/footer.php"; ?>



</body>
</html>
