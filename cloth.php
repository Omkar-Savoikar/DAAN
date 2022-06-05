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

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70"
    style="background-image: url('img/clothbg.jpg')">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img class="logo" src="img/daan logo.jpg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact">Contact</a>
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
                        <a class="nav-link" href="vermicomposting.php">Vermi Composting</a>
                    </li>
                </ul>
                <button class="btn btn-primary ms-lg-3" onclick="window.location.href='register.php'">Join Us</button>
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
            <form action="user.php" class="row g-3 justify-content-center">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter Cloth type (Tshirt, Shirt, Jeans, etc)">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the gender preference for the cloth">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter the cloth size (XS, S, M, L, XL, XXL)">
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter cloth material">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter cloth color">
                </div>
                <div class="col-md-5">
                </div>
                <div class="col-md-10 d-grid">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
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

</php>