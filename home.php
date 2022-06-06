<?php
include("include/config.php");
$msg = "";
ob_start();
session_start();
$userid = $_SESSION['userid'];
$taluka = $_SESSION['taluka'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="48x48" href="img/daan logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>DAAN</title>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/daan logo.jpg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cloth.php">Donate Clothes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Donate Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shoe.php">Donate Shoes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- //NAVBAR -->
    <!-- HERO -->
    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <?php
                    $sql = "SELECT * FROM `user` WHERE `UserID` = '$userid'";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $username = $row['Name'];
                    ?>
                    <h1 class="display-4 text-white">Welcome <?php echo $username; ?></h1>
                    <p class="text-white my-3">Let's Donate and spread Love </p>
                    <a href="#services" class="btn me-2 btn-primary">Make Daan</a>
                </div>
            </div>
        </div>
    </div><!-- //HERO -->
    <!-- SERVICES -->
    <section id="services">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">SERIVCES</h6>
                    <h1>Our Services</h1>
                    <p>We help you to connect the nearest <strong>NGO</strong> so that you can donate fast and easy</p>
                </div>
            </div>
            <div class="row g-4">
                <a class="col-lg-4 col-sm-6" href="cloth.php">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <span class="iconify" data-icon="bx:closet"></span>
                        </div>
                        <h5 class="mt-4 mb-2">Donate Clothes</h5>
                        <p>Stuck with where and whom to donate your old clothes??? Don't worry we're here to help you!!
                            Schedule a donation pickup.</p>
                    </div>
                </a>
                <a class="col-lg-4 col-sm-6" href="books.php">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <span class="iconify" data-icon="bx:book-open"></span>
                        </div>
                        <h5 class="mt-4 mb-2">Donate Books</h5>
                        <p>Want to donate books?? You are at right place.. Just fill the details and donate your books
                            easily!! </p>
                    </div>
                </a>
                <a class="col-lg-4 col-sm-6" href="shoe.php">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <span class="iconify" data-icon="bx:walk"></span>
                        </div>
                        <h5 class="mt-4 mb-2">Donate Shoes</h5>
                        <p> it's always better to donate your shoes than to dump them in your trash can, which would
                            eventually get dumped in a landfill.</p>
                    </div>
                </a>
            </div>
        </div>
    </section><!-- SERVICES -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <img class="logo" src="img/daan logo.jpg" alt="">
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">Site</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-white">Contact</h5>
                        <ul class="list-unstyled">
                            <li>Address: Goa University</li>
                            <li>Email: jackson.graham@example.com</li>
                            <li>Phone: 8322471</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">© 2022 copyright all right reserved | Designed by<a class="text-white">CORE</a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>