<?php
// Include database connection
include "../../databaseConnection.php";

// Check if the event ID is provided in the query string
if (isset($_GET['idevents'])) {
    $eventId = intval($_GET['idevents']); // Sanitize the input

    // Prepare the SQL query to fetch the event details
    $sql = "SELECT * FROM upcommingevents WHERE idevents = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the event exists
    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        die("Event not found.");
    }
} else {
    die("Invalid event ID.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Computing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../navbar/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    /* Custom Styles */
    .header {
            background-image: url('../../images/events.jpg'); /* Replace with your image path */
            background-repeat: no-repeat;
            background-size: cover; /* Make the image cover the entire width */
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
           /* margin-top: 50px;
            width: 100vw; /* Full width of the viewport */
            overflow: hidden;
        }

    .header h1 {
        font-weight: bold;
        font-size: 3rem;
    }

    .header p {
        margin-top: 10px;
        font-size: 1.2rem;
    }

    body {
        background-color: #f8f9fa; /* Light gray background for better readability */
    }

    .card {
        max-width: 800px; /* Restrict maximum card width */
        margin: 0 auto; /* Center align the card */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

    .card-img-top {
        display: block; /* Ensure it is block-level */
        margin: 0 auto; /* Center image inside the card */
        max-width: 100%; /* Make sure the image doesn't overflow the card */
        height: auto; /* Maintain aspect ratio */
    }

    .btn-primary {
        display: block;
        margin: 20px auto; /* Center align the button */
        width: 50%; /* Make the button wider */
    }

    h2.card-title {
        font-size: 1.8rem; /* Adjust font size for better readability */
    }

    p.text-muted {
        font-size: 1rem; /* Improve readability of date */
    }

    .card-text {
        font-size: 1.1rem; /* Adjust description font size */
        line-height: 1.6; /* Improve line spacing */
    }
</style>

</head>
<body>

<?php include "../../../../WebCompetition/User/navbar/navbar.php"?>

<div class="sticky-top"  style="margin-bottom: 0;">
<?php

?>
</div>
    <!-- Header Section -->
    <div class="header">
    <div class="container" style="color: #FEFCFB; background-color: rgba(10, 17, 40, 0.5);">
            <h1>Upcomming Events</h1>
            <p>Sri Lanka Institute of Advanced Technological Education</p>
            
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <img src="<?php echo "../../../Admin/" . htmlspecialchars($event['image_path']); ?>" class="card-img-top"  alt="<?= htmlspecialchars($event['title']) ?>">
            <div class="card-body">
                <h2 class="card-title text-center"><?= htmlspecialchars($event['title']) ?></h2>
                <p class="text-muted text-center">
                    <?= htmlspecialchars($event['day']) ?> <?= htmlspecialchars($event['month']) ?>, <?= htmlspecialchars($event['year']) ?>
                </p>
                <p class="card-text"><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                <?php if (!empty($event['link'])): ?>
                    <p>
                        <a href="<?= htmlspecialchars($event['link']) ?>" target="_blank" class="btn btn-primary">
                            More Information
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
include "/xampp/htdocs/WebCompetition/User/footer/footer.php";
?>
</body>
</html>