<?php
include("include/config.php");
$msg = "";
ob_start();
session_start();
$userid = $_SESSION['userid'];
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
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" style="background-image: url('img/bookbg.jpg')">
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
                        <h3 class="card-title"><a href="#" class="text-primary">Guidelines to donate Books</a></h3>
                    </center>
                    <p><strong>1. All the donated items are subjected to verification.</strong></p>
                    <p><strong>2. The donated items are expected to be in good conditions and not beyond
                            repair.</strong></p>
                    <p><strong>3. The items should be cleaned before donating.</strong></p>
                    <center><a href="#bookform" class="btn btn-success">Donate NOW</a></center>
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
                    <h1 id="bookform">BOOK DONATION</h1>
                    <p>Happiness doesn't result from what we get, but from what we give</p>
                </div>
            </div>
            <form action="" class="row g-3 justify-content-center" method="post" autocomplete="off">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder=" Enter the book Name" name="bookName" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the author name" name="author" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the genre" name="genre" required>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter the edition number" name="edition" required>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter the ISBN number" name="ISBN" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the publication house" name="publication" required>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter number of pages" name="pages" required>
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
                $bookName = mysqli_real_escape_string($db,$_POST['bookName']);
                $author = mysqli_real_escape_string($db,$_POST['author']);
                $genre = mysqli_real_escape_string($db,$_POST['genre']);
                $edition = mysqli_real_escape_string($db,$_POST['edition']);
                $ISBN = mysqli_real_escape_string($db,$_POST['ISBN']);
                $publication = mysqli_real_escape_string($db,$_POST['publication']);
                $pages = mysqli_real_escape_string($db,$_POST['pages']);
                $units = mysqli_real_escape_string($db,$_POST['units']);

                $sql = "INSERT INTO `book`(`Name`, `Genre`, `Author`, `ISBN`, `Edition`, `Publication`, `Pages`, `Units`, `UserID`) VALUES ('$bookName','$genre','$author','$ISBN','$edition','$publication','$pages','$units','$userid')";
                $result = mysqli_query($db,$sql);
                if ($result) {
                    $msg = "Thank you for this donation.";
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
                        <p class="mb-0">© 2022 copyright all right reserved | Designed by<a class="text-white">CORE</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>