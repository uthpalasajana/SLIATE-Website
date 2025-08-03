<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLIATE Overview</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../sliate/user//navbar/navbar.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .about-us h6 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #343a40;
        }

        /* Image Gallery Section */
        .gallery-container {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .gallery-container img {
            border-radius: 8px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            max-width: 100%;
        }

        .gallery-container img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .gallery-description {
            flex: 1;
            max-width: 500px;
            padding-left: 20px;
            font-size: 1.1rem;
            color: #495057;
        }

        .gallery-description h5 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
        }

        .gallery-description p {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Stats Section */
       

        /* Call-to-Action Button */
        .btn-warning {
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 30px;
            transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>
<div class="sticky-top">
    <?php include "../navbar/navbar1.php"; ?>
</div>

<section class="about-us">
    <h6>About Us</h6>
</section>

<!-- Main Container -->
<div class="container mt-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <!-- Image Gallery and Description -->
        <div class="gallery-container" >
            <!-- Image Section -->
            <div class="col-md-3 mt-5">
                <img src="../images/new1.jpg" class="img-fluid" alt="Gallery Image 1">
    </br>
                <img src="../images/ati2.jpg" class="img-fluid" alt="Gallery Image 2">

               
            </div>

            <div class="col-md-3" style="margin-left: -25px;">
                <img src="../images/new2.jpg" class="img-fluid" alt="Gallery Image 1">
                <img src="../images/new4.jpg" class="img-fluid" alt="Gallery Image 2">

               
            </div>
            <!-- Description Section -->
            <div class="gallery-description">
                <h5>About ATI-Gampaha</h5>
                <p>
                The Ministry of Higher Education has already formulated policies and strategies and has been implementing the same to bring the education system of the country equivalent to the standards of the rest of the world.                </p>
                <p>
                Sri Lanka Institute of Advanced Technical Education (SLIATE) is one of the leading government institutions in Higher Education sector in Sri Lanka which was established by the parliament act no 29 of 1995, and it comes under the purview of the Ministry of Higher Education. In 2001 the name of the institution was amended to read as Sri Lanka Institute of Advanced Technological Education. It functions as an autonomous Institute for the management of Higher National and National Diploma courses.

</p>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row text-center stats mb-4">
        <div class="col-md-6">
            <h2 class="text-warning display-4">28</h2>
            <p>Years of <strong>HISTORY</strong></p>
        </div>
        <div class="col-md-6">
            <h2 class="text-warning display-4">5</h2>
            <p>Popular <strong>COURSES</strong></p>
        </div>
    </div>

   

<!-- Footer -->
<footer>
    <?php include "../footer/footer.php"; ?>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
