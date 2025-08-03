<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Life Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .club-card {
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            height: 100%;
        }

        /* Custom Colors for Cards */
        .activity-card { background-color: #28a745; } /* Green */
        .sports-card { background-color: #007bff; }   /* Blue */
        .international-card { background-color: #8B0000; } /* Maroon */
        .religious-card { background-color: #8a2be2; } /* Purple */

        /* Image Styling */
        .img-container {
            overflow: hidden;
            height: 100%;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Page Content -->
    <div class="container my-5">
        <h1 class="text-center mb-4" style="color: black;">Student Life</h1>
        <div class="row g-3">
            <!-- First Row -->
            <div class="col-md-4">
                <div class="img-container">
                    <img src="../images/ati11.jpg" alt="Sports Clubs">
                </div>
            </div>
            <div class="col-md-4">
                <div class="club-card activity-card">
                    <div>
                        <h4>Activity Based Clubs</h4>
                        <p>We strive to innovate when it comes to functionality. Our mission is to be the best, come and join the ride.</p>
                        <button class="btn btn-light">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="img-container">
                    <img src="../images/ati21.jpg" alt="International Clubs">
                </div>
            </div>

            <!-- Second Row -->
            <div class="col-md-4">
                <div class="club-card sports-card">
                    <div>
                        <h4>Sports Clubs</h4>
                        <p>Recreation is a part of student life. It builds the inner qualities of the students.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="img-container">
                    <img src="../images/ati8.jpg" alt="Activity Clubs">
                </div>
            </div>
            <div class="col-md-4">
                <div class="club-card international-card">
                    <div>
                        <h4>International Clubs</h4>
                        <p>We are committed to encouraging global exposure and international engagement.</p>
                        <button class="btn btn-light">Learn More</button>
                    </div>
                </div>
            </div>

            <!-- Third Row -->
            <div class="col-md-4">
                <div class="img-container">
                    <img src="../images/ati17.jpg" alt="Religious Clubs">
                </div>
            </div>
            <div class="col-md-8">
                <div class="club-card religious-card">
                    <div>
                        <h4>Religious Clubs</h4>
                        <p>We foster religious diversity and encourage harmony among spiritual beliefs on campus.</p>
                        <button class="btn btn-light">Learn More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
