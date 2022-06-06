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
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" style="background-image: url('img/clothbg.jpg')">
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
    <section id="contact">
        <div class="container" style="background-color: white;">
            <div class="row-md-5">
                <div class="card-body">
                    <center>
                        <h3 class="card-title"><a href="#" class="text-primary">Guidelines to donate Clothes</a></h3>
                    </center>
                    <p><strong>1. All the donated items are subjected to verification.</strong></p>
                    <p><strong>2. The donated items are expected to be in good conditions and not beyond
                            repair.</strong></p>
                    <p><strong>3. The items should be cleaned before donating.</strong></p>
                    <center><a href="#clothform" class="btn btn-success">Donate NOW</a></center>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT -->
    <section id="contact">
        <div class="container" style="background-color: white;">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">GET IN TOUCH WITH THE NGO's</h6>
                    <h1 id="clothform">CLOTH DONATION</h1>
                    <p>Happiness doesn't result from what we get, but from what we give</p>
                </div>
            </div>
            <form action="" class="row g-3 justify-content-center" method="post" autocomplete="off">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter Cloth type (Tshirt, Shirt, Jeans, etc)" name="type" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the gender preference for the cloth" name="gender" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the cloth size (XS, S, M, L, XL, XXL)" name="size" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter cloth material" name="material" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter cloth color" name="color" required>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter number of units" name="units" required>
                </div>
                <div class="col-md-10 d-grid">
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $msg = "";
                $type = mysqli_real_escape_string($db,$_POST['type']);
                $gender = mysqli_real_escape_string($db,$_POST['gender']);
                $size = mysqli_real_escape_string($db,$_POST['size']);
                $material = mysqli_real_escape_string($db,$_POST['material']);
                $color = mysqli_real_escape_string($db,$_POST['color']);
                $units = mysqli_real_escape_string($db,$_POST['units']);
                $sql = "INSERT INTO `donation` (`Type`) VALUES ('clothes')";
                $result = mysqli_query($db,$sql);
                $last_id = mysqli_insert_id($db);
                $sql = "INSERT INTO `clothes`(`ClothId`,`Type`, `Gender`, `Size`, `Material`, `Color`, `Units`, `UserID`) VALUES ('$last_id','$type','$gender','$size','$material','$color','$units','$userid')";
                $result = mysqli_query($db,$sql);
                if ($result) {
                    $msg = "Thank you for this donation.";
                    $sql = "SELECT * FROM `ngo`";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    while ($row) {
                        if ($row['Taluka'] == $taluka) {
                            $DIN = $row['DIN'];
                            $sql = "INSERT INTO `status` VALUES ('$DIN', '$last_id', 'NULL')";
                            $res = mysqli_query($db,$sql);
                        }
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    }
                } else {
                    $msg = "Sorry, couldn't connect to database. Try again.";
                }
            }
            ?>
            <div class="row justify-content-center">
                <?php
                if ($msg != NULL)
                    echo $msg;
                ?>
            </div>
        </div>
    </section><!-- CONTACT -->
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
                            <li><a href="index.php">About</a></li>
                            <li><a href="index.php">Services</a></li>
                            <li><a href="index.php">Features</a></li>
                            <li><a href="index.php">Pricing</a></li>
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
                        <p class="mb-0">© 2022 copyright all right reserved | Designed with by<a
                                href="https://www.youtube.com/channel/UCYMEEnLzGGGIpQQ3Nu_sBsQ"
                                class="text-white">CORE</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>