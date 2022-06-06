<?php
include("include/config.php");
$msg = "";
ob_start();
session_start();
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
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" style="background-image: url('img/ngobg.jpg')">
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
                        <a class="nav-link" href="vermicomposting.php">Vermi Composting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="NGOregister.php">Register as NGO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userRegister.php">Register as User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- //NAVBAR -->
    <section id="contact">
        <div class="container" style="background-color: white; padding-bottom: 20px;">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary"></h6>
                    <h1>NGO REGISTRATION</h1>
                    <p>Happiness doesn't result from what we get, but from what we give</p>
                </div>
            </div>
            <!-- https://www.mca.gov.in/mcafoportal/verifyDIN.do -->
            <form action="" class="row g-3 justify-content-center" method="post" autocomplete="off">
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter NGO Director Identification Number (DIN)" name="DIN" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter NGO name" name="NGOname" required>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter your phone number" name="phone" required>
                </div>
                <div class="col-md-5">
                    <input type="email" class="form-control" placeholder="Enter E-mail" name="emailid" required>
                </div>
                <div class="col-md-5">
                    <input type="password" class="form-control" placeholder="Enter your password" minlength="5" name="password1" required>
                </div>
                <div class="col-md-5">
                    <input type="password" class="form-control" placeholder="Re-enter your password" minlength="5" name="password2" required>
                </div>
                <div class="col-md-10">
                    &nbsp;&nbsp;&nbsp; Address &#8659;
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter House number" name="hno" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter Area" name="area" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter City/ Village" name="city" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter Taluka" name="taluka" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Enter District" name="district" required>
                </div>
                <div class="col-md-5">
                    <input type="number" class="form-control" placeholder="Enter Pincode" name="pincode" required>
                </div>
                <div class="col-md-10 d-grid">
                    <input class="btn btn-primary" type="submit" name="submit" value="Register">
                </div>
                <div class="col-md-4">
                    <a href="NGOlogin.php">Already have an account? Login now.</a>
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $msg = "";
                $password1 = mysqli_real_escape_string($db,$_POST['password1']);
                $password2 = mysqli_real_escape_string($db,$_POST['password2']);
                if ($password1 == $password2) {
                    $DIN = mysqli_real_escape_string($db,$_POST['DIN']);
                    $NGOname = mysqli_real_escape_string($db,$_POST['NGOname']);
                    $phone = $_POST['phone'];
                    // $phone = intval($phone);
                    $emailid = mysqli_real_escape_string($db,$_POST['emailid']);
                    $password = md5($password1);
                    $hno = mysqli_real_escape_string($db,$_POST['hno']);
                    $area = mysqli_real_escape_string($db,$_POST['area']);
                    $city = mysqli_real_escape_string($db,$_POST['city']);
                    $taluka = mysqli_real_escape_string($db,$_POST['taluka']);
                    $district = mysqli_real_escape_string($db,$_POST['district']);
                    $pincode = mysqli_real_escape_string($db,$_POST['pincode']);
                    $sql = "INSERT INTO `ngorequest` (`DIN`, `NGO_Name`, `H.No`, `Area`, `City`, `Taluka`, `District`, `Pincode`, `Mobile`, `EmailId`, `Password`, `Status`) VALUES ('$DIN', '$NGOname', '$hno', '$area', '$city', '$taluka', '$district', '$pincode', '$phone', '$emailid', '$password', 'NULL')";
                    $result = mysqli_query($db,$sql);
                    if ($result) {
                        echo '<script>window.alert("Your registration request was successfully registered. You will be notified of the registration process soon.");</script>';
                        header("location: index.php");
                    } else {
                        $msg = "Sorry, couldn't connect to database. Try again.";
                    }
                } else {
                    $msg = "Passwords don't match. Enter password properly";
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
                        <p class="mb-0">© 2022 copyright all right reserved | Designed by<a class="text-white"> CORE</a>
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