<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./navbar/navbar.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .facility-category {
            margin-bottom: 30px;
        }
        .facility-category h3 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .facility-card {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .facility-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .facility-card-body {
            padding: 15px;
        }
        .facility-card-body h5 {
            margin-bottom: 15px;
        }
        .facility-card-body p {
            color: #6c757d;
        }
        .header {
    background-image: url('../User/images/team.jpg'); /* Replace with your banner image */
    background-size: cover;
    background-position: center;
    height: 300px;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.7);
}

.header h1 {
    font-size: 3.5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    margin-bottom: 10px;
}
.header h2 {
    font-size: 5rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    margin-bottom: 10px;
    margin-left:auto;
}

    </style>
</head>
<body>
<?php include "./navbar/navbar.php"?>
 <!-- Header Section -->
 <header class="header">
        <div class="container text-center">
            <h1>Life @ Sliate</h1>
            <p>Empowering Your Future with Advanced Education</p>
        </div>
    </header>

<div class="container py-5">
    <h1 class="text-center mb-5">Our Facilities</h1>

    <!-- Category 1 -->
    <div class="facility-category">
        <h3>Sports Facilities</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/pexels-digitalbuggu-186240.jpg" alt="Sports Facility 1">
                    <div class="card-body facility-card-body">
                        <h5>Play Ground</h5>
                        <p>The football ground is equipped with all necessary facilities for matches and practice.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/pexels-jim-de-ramos-395808-1263426.jpg" alt="Sports Facility 2">
                    <div class="card-body facility-card-body">
                        <h5>Volley Ball Court</h5>
                        <p>Our swimming pool is designed for both leisure and professional training sessions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/pexels-eric-anada-280222-3660204.jpg" alt="Sports Facility 3">
                    <div class="card-body facility-card-body">
                        <h5>Badminton</h5>
                        <p>The tennis court is available for both beginners and advanced players.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category 2 -->
    <div class="facility-category">
        <h3>Educational Facilities</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/pexels-element5-1370295.jpg" alt="Educational Facility 1">
                    <div class="card-body facility-card-body">
                        <h5>Library</h5>
                        <p>Our library is well-equipped with books, journals, and digital resources.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/pexels-polina-zimmerman-3747486.jpg" alt="Educational Facility 2">
                    <div class="card-body facility-card-body">
                        <h5>Computer Lab</h5>
                        <p>The computer lab is equipped with the latest technology for hands-on learning.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/ati24.jpg" alt="Educational Facility 3">
                    <div class="card-body facility-card-body">
                        <h5>Classrooms</h5>
                        <p>Modern, well-lit classrooms designed for collaborative and interactive learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category 3 -->
    <div class="facility-category">
        <h3>Hostals</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/hostals.jpeg" alt="Health Facility 1">
                    <div class="card-body facility-card-body">
                        <h5>Hostal Buildings</h5>
                        <p>The health center is equipped to handle medical emergencies and routine check-ups.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <p class="fs-5">
                Student counseling plays a crucial role in guiding students toward a balanced and fulfilling life. Our trained counselors are available to help students navigate stress, improve time management, and address any mental health concerns. Whether you're looking for academic advice or personal guidance, our counseling services are here to support you every step of the way. 
                <br><br>
                Visit our counseling center today and take the first step toward achieving your goals with confidence and clarity.
            </p>
        </div>
    </div>
</div>

    <!-- Category 4 -->
    <div class="facility-category">
    <h3>Student Counseling</h3>
    <div class="row align-items-center">
        <!-- Card on the left -->
        <div class="col-md-6">
            <div class="card facility-card">
                <img src="../User/images/councliing.jpg" alt="Student Counseling" class="img-fluid">
                <div class="card-body facility-card-body">
                    <h5>Counseling Services</h5>
                    <p>Our student counseling services offer personalized support to help students manage academic, personal, and career challenges effectively.</p>
                </div>
            </div>
        </div>

        <!-- Paragraph on the right -->
        <div class="col-md-6">
            <p class="fs-5">
                Student counseling plays a crucial role in guiding students toward a balanced and fulfilling life. Our trained counselors are available to help students navigate stress, improve time management, and address any mental health concerns. Whether you're looking for academic advice or personal guidance, our counseling services are here to support you every step of the way. 
                <br><br>
                Visit our counseling center today and take the first step toward achieving your goals with confidence and clarity.
            </p>
        </div>
    </div>
</div>

    <!-- Category 5 -->
    <div class="facility-category">
        <h3>Canteen Facilities</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/canteen2.jpg" alt="Recreational Facility 1">
                    <div class="card-body facility-card-body">
                        <h5>Canteen</h5>
                        <p>Our cafeteria serves a variety of healthy and delicious meals throughout the day.</p>
                     </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card facility-card">
                    <img src="../User/images/canteen.jpg" alt="Recreational Facility 2">
                    <div class="card-body facility-card-body">
                        <h5>Dining Area</h5>
                        <p>Enjoy the latest movies in our on-site cinema with comfortable seating.</p>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php
       include "./footer/footer.php";
    ?>
</body>
</html>
