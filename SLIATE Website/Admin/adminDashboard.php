<?php
// Start session and check admin login
session_start();
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['admin_username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Fetch admin details from session
$admin_username = $_SESSION['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F1F5F9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #0A1128;
            height: 100vh;
            color: #ffffff;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            overflow-y: auto; /* Allow scrolling in the sidebar if content overflows */
            transition: all 0.3s ease;
        }

        .sidebar h2 {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: #1282A2;
            text-decoration: none;
            font-size: 16px;
            margin: 10px 0;
            display: block;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #034078;
            color: #ffffff;
            padding-left: 20px;
        }

        .sidebar a.text-danger {
            color: #FF6B6B;
        }

        .sidebar a.text-danger:hover {
            background-color: #C82333;
            padding-left: 20px;
        }

        /* Sidebar Collapsed for Small Screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .topbar {
                margin-left: 0;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Topbar Styling */
        .topbar {
            background-color: #001F54;
            color: #ffffff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            z-index: 1030;
            transition: all 0.3s ease;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            margin-top: 70px; /* Account for the height of the topbar */
            padding: 30px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }
        }

        /* Card Styling */
        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card h5 {
            margin: 0;
            font-size: 1rem;
            font-weight: 500;
        }

        .card h3 {
            font-size: 2rem;
            font-weight: bold;
            margin: 10px 0 0;
        }

        .text-primary {
            color: #1282A2 !important;
        }
</style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <a href="#dashboard">Dashboard</a>
            <a href="./adminregister.php">Register Admin</a>
            <a href="./addCourses.php">Add Courses</a>
            <a href="./addtogallery.php">Add Gallery</a>
            <a href="./addtocards.php">Add to Cards</a>
            <a href="./addtolatestnews.php">Add News</a>
            <a href="./sliderupload.php">Slider Images</a>
            <a href="./upcomingevents.php">Upcoming Events</a>
            <a href="./addReports.php">Report Submission</a>
            <a href="./addResearch.php">Research Submission</a>
            <a href="./addtochatbot.php">ChatBot</a>
            <a href="./view_responses.php">View Responses</a>
            <a href="./logout.php" class="text-danger">Logout</a>
        </div>


        <?php
// Start session and check admin login



include "../User/databaseConnection.php";

// Fetch total user count from the 'admin_users' table
$user_count_query = "SELECT COUNT(*) AS total_users FROM admin_users";
$reportcount = "SELECT COUNT(*) AS total_reports FROM report";
$researchcount = "SELECT COUNT(*) AS total_research FROM research";

$result = $conn->query($user_count_query);
$result2 = $conn->query($reportcount);
$result3 = $conn->query($researchcount);

// Default value for total users
$total_users = 0;
$total_reports = 0;
$total_research = 0;

if ($result && $row = $result->fetch_assoc()) {
    $total_users = $row['total_users'];
}

if ($result2 && $row2 = $result2->fetch_assoc()) {
    $total_reports = $row2['total_reports'];
}
if ($result3 && $row3 = $result3->fetch_assoc()) {
    $total_research = $row3['total_research'];
}
?>
        <!-- Main Content -->
        <div class="w-100">
            <!-- Topbar -->
            <div class="topbar">
                <h4>Welcome, <?php echo htmlspecialchars($admin_username); ?></h4>
            </div>

            <!-- Dashboard Content -->
            <div class="main-content">
                <h2 class="mb-4">Admin Dashboard</h2>
                <div class="row">
                <div class="col-md-4">
                        <div class="card">
                            <h5>Total Users</h5>
                            <h3 class="text-primary"><?php echo $total_users; ?></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <h5>Total Reports</h5>
                        <h3 class="text-primary"><?php echo $total_reports; ?></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                        <h5>Total Research</h5>
                        <h3 class="text-primary"><?php echo $total_research; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
