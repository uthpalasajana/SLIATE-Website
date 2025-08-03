<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Computing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="navbar/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom Styles */
        .header {
            background-image: url('images/latestnews.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-weight: bold;
            font-size: 3rem;
        }

        .header p {
            margin-top: 10px;
            font-size: 1.2rem;
        }

        .content-section {
            padding: 40px 20px;
        }

        .departments {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .departments h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="sticky-top">
<?php
include "../User/navbar/navbar.php";
?>
</div>
    <!-- Header Section -->
    <div class="header">
    <div class="container" style="color: #FEFCFB; background-color: rgba(10, 17, 40, 0.5);">
            <h1>Latest News</h1>
            <p>Sri Lanka Institute of Advanced Technological Education</p>
        </div>
    </div>


    <?php
    include "databaseConnection.php";

     $result = $conn->query("SELECT * FROM latestnews_cards ORDER BY date DESC");

while ($row = $result->fetch_assoc()) {
    $image_path = "../Admin/" . $row['image_path']; 
    $title = $row['title'];
    $date = date("F d, Y", strtotime($row['date']));
    $description = $row['fulldetails'];
    $link = $row['link'];
    ?>

    <div class="departments" style="margin-top: 20px; background-color: #1282A2 ;">
    <div class="container" >
       
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?php echo $image_path; ?>" style="width: 70%; height: 70%;" alt="<?php echo $title; ?>">
            </div>
            <div class="col-md-8" >
            <h5 class="card-title " style="color: black;" >
            <?php echo $title; ?>
            </h5>
            <p class="text-success"><em><?php echo $date; ?></em></p>
            </div>
        </div>
    </div>
</div>


    <!-- Content Section -->
    <div class="content-section container">
        <p class="card-text"><?php echo $description; ?></p>
                   
    </div>

    <?php
}
?>

    <!-- Departments Section -->
   
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <?php include "footer/footer.php"; ?>
</body>
</html>