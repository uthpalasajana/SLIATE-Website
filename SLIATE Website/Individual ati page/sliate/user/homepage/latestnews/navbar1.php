<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        
        <link rel="stylesheet" href="navbar.css">

</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001F54; width : 100%;" >
    <div class="container-fluid">
        <!-- Logo and Institute Name -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="gampaha.jpeg" alt="Logo" width="100" height="100" class="rounded-circle me-2">
            <div class="text-white" style="margin-left :30px;">
                <h5 class="fw-lighter "style = "font-size:15px; ">Advanced Technological Institute - Gampaha   </h5>
                <h5 class="fw-lighter" style = "font-size:15px;">උසස් තාක්ෂණ ආයතනය - ගම්පහ</h5>
                <h5 class="fw-lighter"style = "font-size:15px;">மேம்பட்ட தொழில்நுட்ப நிறுவனம் - கம்பஹா</h5>
                
            </div>
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarContent" >
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin: 0 auto;" >
           
            <div class="navbar-divider" >
            <li class="nav-item" >
                    <a class="nav-link text-white" href="../homePage.php">Home</a>
                </li>
            </div>
        <div class="navbar-divider">
                <li class="nav-item">
                    <a class="nav-link text-white" href="">Courses</a>
                </li>
        </div>
        <div class="navbar-divider">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Results</a>
                </li>
        </div>
        <div class="navbar-divider">
        <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Downloads
                    </a>
                    <ul class="dropdown-menu" style="background-color:yellow;">
                        <li><a class="dropdown-item" href="#">Students</a></li>
                        <li><a class="dropdown-item" href="#">Staff</a></li>
                    </ul>
                </li>
                </div>

        <div class="navbar-divider">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Notice</a>
                </li>
        </div>
        <div class="navbar-divider">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contacts</a>
                </li>
        </div>
        <div class="navbar-divider" >
                <li class="nav-item" style="width:100px;">
                    <a class="nav-link text-white" href="#">About Us</a>
                </li>
        </div>
        <div class="navbar-divider">
                <li class="nav-item" style="width:100px;">
                    <a class="nav-link text-white" href="../login/login.php">Sign in</a>
                </li>
        </div>
                
            </ul>
          
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
