<?php
include("include/config.php");
$msg = "";
ob_start();
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
    <style>
        .card-thumbnail {
            max-height: 250px;
            overflow: hidden;
        }
    </style>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- //NAVBAR -->
    <section class="bg-light py-4 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 text-primary">NEW NGO REGISTRATION REQESTS</h2>
                </div>

                <?php
                $sql = "SELECT * FROM `ngorequest` WHERE `Status` = 'NULL'";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if ($count == 0) {
                    echo ('<div class="text-secondary">No new requests</div>');
                } else if ($count == 1) {
                    echo ('<div class="text-secondary">' . $count . ' new request</div>');
                } else {
                    echo ('<div class="text-secondary">' . $count . ' new requests</div>');
                }
                while ($row) {
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card my-3">
                            <div class="card-body">
                                <h3 class="card-title text-secondary"> <?php echo $row['NGO_Name'] ?> </h3>
                                <div class="card-text">
                                    <p>DIN: <?php echo $row['DIN'] ?> </p>
                                    <p>Mobile No: <?php echo $row['Mobile'] ?> </p>
                                    <p>EmailID: <?php echo $row['EmailID'] ?> </p>
                                    <p>Address: <?php echo 'H.No. ' . $row['H.No'] . ', ' . $row['Area'] . ', ' . $row['City'] . ', ' . $row['Taluka'] . ', ' . $row['District']?> </p>
                                </div>
                                <?php
                                if(array_key_exists('button1', $_POST)) {
                                    // echo "Accept";
                                    $DIN = $row['DIN'];
                                    $NGOname = $row['NGO_Name'];
                                    $hno = $row['H.No'];
                                    $area = $row['Area'];
                                    $city = $row['City'];
                                    $taluka = $row['Taluka'];
                                    $district = $row['District'];
                                    $pincode = $row['Pincode'];
                                    $phone = $row['Mobile'];
                                    $emailid = $row['EmailId'];
                                    $password = $row['Password'];
                                    $sql = "UPDATE `ngorequest` SET `Status` = 'Accepted' WHERE `DIN` = '$DIN'";
                                    $result = mysqli_query($db, $sql);
                                    if ($result) {
                                        $sql = "INSERT INTO `ngo` (`DIN`, `NGO_Name`, `H.No`, `Area`, `City`, `Taluka`, `District`, `Pincode`, `Mobile`, `EmailId`, `Password`) VALUES ('$DIN', '$NGOname', '$hno', '$area', '$city', '$taluka', '$district', '$pincode', '$phone', '$emailid', '$password')";
                                        $result = mysqli_query($db,$sql);
                                    }
                                    // refresh maybe
                                }
                                else if(array_key_exists('button2', $_POST)) {
                                    // echo "Decline";
                                    $sql = "UPDATE `ngorequest` SET `Status` = 'Declined' WHERE `DIN` = '$DIN'";
                                    $result = mysqli_query($db, $sql);
                                    // on decline, select the ngo data from the ngorequest, change status to 'Declined'
                                }
                                ?>
                                <form method="post" class="row justify-content-center">
                                    <input class="btn btn-success col-md-5" type="submit" name="button1" value="Accept">
                                    <input class="btn btn-danger col-md-5" type="submit" name="button2" value="Decline">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                }
                ?>
            </div>
        </div>
    </section>
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