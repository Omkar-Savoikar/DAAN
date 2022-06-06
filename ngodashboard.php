<?php
include("include/config.php");
$msg = "";
ob_start();
session_start();
$DIN = $_SESSION['DIN'];
?>
<!DOCTYPE HTML>
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
                    <h2 class="mb-3 text-primary">NGO Dashboard</h2>
                    <h3 class="mb-3 text-secondary">Requests</h3>
                </div>
                <?php
                $sql = "SELECT `DonationID` FROM `status` WHERE `DIN` = '$DIN' AND `Status` = 'NULL'";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if ($count == 0) {
                    echo "No requests for now";
                }
                while ($row) {
                    $donationID = $row['DonationID'];
                    $sql = "SELECT `Type` FROM `donation` WHERE `DonationID` = '$donationID'";
                    $res = mysqli_query($db, $sql);
                    $req = mysqli_fetch_array($res,MYSQLI_ASSOC);
                    while ($req) {
                        $table = $req['Type'];
                        if ($table == 'book') {
                            $sql = "SELECT * FROM `book` WHERE `BookID` = '$donationID'";
                            $res1 = mysqli_query($db, $sql);
                            $req1 = mysqli_fetch_array($res1,MYSQLI_ASSOC);
                            while ($req1) {
                                $userid = $req1['UserID'];
                                $sql = "SELECT * FROM `user` WHERE `UserID` = '$userid'";
                                $res2 = mysqli_query($db, $sql);
                                $req2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="#" class="text-secondary">Book</a></h3>
                                            <div class="card-text">
                                                <p>Book Name: <?php echo $req1['Name']; ?> </p>
                                                <p>Author: <?php echo $req1['Author']; ?> </p>
                                                <p>Genre: <?php echo $req1['Genre']; ?> </p>
                                                <p>ISBN: <?php echo $req1['ISBN']; ?> </p>
                                                <p>Edition: <?php echo $req1['Edition']; ?> </p>
                                                <p>Publication House: <?php echo $req1['Publication']; ?> </p>
                                                <p>No. of Pages: <?php echo $req1['Pages']; ?> </p>
                                                <p>Units: <?php echo $req1['Units']; ?> </p>
                                                <p>Donar: <?php echo $req2['Name']; ?> </p>
                                                <p>Address: <?php echo 'H.No. ' . $req2['H.No'] . ', ' . $req2['Area'] . ', ' . $req2['City'] . ', ' . $req2['Taluka'] . ', ' . $req2['District']?> </p>
                                                <p>Mobile No: <?php echo $req2['Mobile'] ?> </p>
                                                <p>EmailID: <?php echo $req2['EmailId'] ?> </p>
                                            </div>
                                            <?php
                                            if (isset($_POST['temp']) && $_POST['temp'] == 1) {
                                                if(array_key_exists('button1', $_POST)) {
                                                    // echo "Accept";
                                                    $sql = "UPDATE `status` SET `Status`='Accepted' WHERE `DonationID` = '$donationID' AND `DIN` = '$DIN'";
                                                    $res3 = mysqli_query($db, $sql);
                                                    $sql = "DELETE FROM `status` WHERE `DonationID` = '$donationID' AND `Status` = 'NULL'";
                                                    $res3 = mysqli_query($db, $sql);
                                                }
                                                else if(array_key_exists('button2', $_POST)) {
                                                    // echo "Decline";
                                                    $sql = "UPDATE `status` SET `Status`='Declined' WHERE `DonationID` = '$donationID' AND `DIN` = '$DIN'";
                                                    $res3 = mysqli_query($db, $sql);
                                                }
                                            }
                                            ?>
                                            <form method="post" class="row justify-content-center">
                                                <input type="hidden" name="temp" value="1">
                                                <input class="btn btn-success col-md-5" type="submit" name="button1" value="Accept">
                                                <input class="btn btn-danger col-md-5" type="submit" name="button2" value="Decline">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $req1 = mysqli_fetch_array($res,MYSQLI_ASSOC);
                            }
                        } else
                        if ($table == 'clothes') {
                            $sql = "SELECT * FROM `clothes` WHERE `ClothId` = '$donationID'";
                            $res1 = mysqli_query($db, $sql);
                            $req1 = mysqli_fetch_array($res1,MYSQLI_ASSOC);
                            while ($req1) {
                                $userid = $req1['UserID'];
                                $sql = "SELECT * FROM `user` WHERE `UserID` = '$userid'";
                                $res2 = mysqli_query($db, $sql);
                                $req2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="#" class="text-secondary">Clothes</a></h3>
                                            <div class="card-text">
                                                <p>Type: <?php echo $req1['Type']; ?> </p>
                                                <p>Preferred Gender: <?php echo $req1['Gender']; ?> </p>
                                                <p>Size: <?php echo $req1['Size']; ?> </p>
                                                <p>Material: <?php echo $req1['Material']; ?> </p>
                                                <p>Color: <?php echo $req1['Color']; ?> </p>
                                                <p>Units: <?php echo $req1['Units']; ?> </p>
                                                <p>Donar: <?php echo $req2['Name']; ?> </p>
                                                <p>Address: <?php echo 'H.No. ' . $req2['H.No'] . ', ' . $req2['Area'] . ', ' . $req2['City'] . ', ' . $req2['Taluka'] . ', ' . $req2['District']?> </p>
                                                <p>Mobile No: <?php echo $req2['Mobile'] ?> </p>
                                                <p>EmailID: <?php echo $req2['EmailId'] ?> </p>
                                            </div>
                                            <?php
                                            if (isset($_POST['temp']) && $_POST['temp'] == 2) {
                                                if(array_key_exists('button1', $_POST)) {
                                                    // echo "Accept";
                                                    $sql = "UPDATE `status` SET `Status`='Accepted' WHERE `DonationID` = '$donationID' AND `DIN` = '$DIN'";
                                                    $res3 = mysqli_query($db, $sql);
                                                    $sql = "DELETE FROM `status` WHERE `DonationID` = '$donationID' AND `Status` = 'NULL'";
                                                    $res3 = mysqli_query($db, $sql);
                                                }
                                                else if(array_key_exists('button2', $_POST)) {
                                                    // echo "Decline";
                                                    $sql = "UPDATE `status` SET `Status`='Declined' WHERE `DonationID` = '$donationID' AND `DIN` = '$DIN'";
                                                    $res3 = mysqli_query($db, $sql);
                                                }
                                            }
                                            ?>
                                            <form method="post" class="row justify-content-center">
                                                <input type="hidden" name="temp" value="2">
                                                <input class="btn btn-success col-md-5" type="submit" name="button1" value="Accept">
                                                <input class="btn btn-danger col-md-5" type="submit" name="button2" value="Decline">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $req1 = mysqli_fetch_array($res,MYSQLI_ASSOC);
                            }
                        } else
                        if ($table == 'footwear') {
                            $sql = "SELECT * FROM `footwear` WHERE `FootwearID` = '$donationID'";
                            $res1 = mysqli_query($db, $sql);
                            $req1 = mysqli_fetch_array($res1,MYSQLI_ASSOC);
                            while ($req1) {
                                $userid = $req1['UserID'];
                                $sql = "SELECT * FROM `user` WHERE `UserID` = '$userid'";
                                $res2 = mysqli_query($db, $sql);
                                $req2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="#" class="text-secondary">Footwear</a></h3>
                                            <div class="card-text">
                                                <p>Type: <?php echo $req1['Type']; ?> </p>
                                                <p>Preferred Gender: <?php echo $req1['Gender']; ?> </p>
                                                <p>Size: <?php echo $req1['Size']; ?> </p>
                                                <p>Material: <?php echo $req1['Material']; ?> </p>
                                                <p>Color: <?php echo $req1['Color']; ?> </p>
                                                <p>Units: <?php echo $req1['Units']; ?> </p>
                                                <p>Donar: <?php echo $req2['Name']; ?> </p>
                                                <p>Address: <?php echo 'H.No. ' . $req2['H.No'] . ', ' . $req2['Area'] . ', ' . $req2['City'] . ', ' . $req2['Taluka'] . ', ' . $req2['District']?> </p>
                                                <p>Mobile No: <?php echo $req2['Mobile'] ?> </p>
                                                <p>EmailID: <?php echo $req2['EmailId'] ?> </p>
                                            </div>
                                            <?php
                                            if (isset($_POST['temp']) && $_POST['temp'] == 3) {
                                                if(array_key_exists('button1', $_POST)) {
                                                    // echo "Accept";
                                                    $sql = "UPDATE `status` SET `Status`='Accepted' WHERE `DonationID` = '$donationID' AND `DIN` = '$DIN'";
                                                    $res3 = mysqli_query($db, $sql);
                                                    $sql = "DELETE FROM `status` WHERE `DonationID` = '$donationID' AND `Status` = 'NULL'";
                                                    $res3 = mysqli_query($db, $sql);
                                                }
                                                else if(array_key_exists('button2', $_POST)) {
                                                    // echo "Decline";
                                                    $sql = "UPDATE `status` SET `Status`='Declined' WHERE `DonationID` = '$donationID' AND `DIN` = '$DIN'";
                                                    $res3 = mysqli_query($db, $sql);
                                                }
                                            }
                                            ?>
                                            <form method="post" class="row justify-content-center">
                                                <input type="hidden" name="temp" value="3">
                                                <input class="btn btn-success col-md-5" type="submit" name="button1" value="Accept">
                                                <input class="btn btn-danger col-md-5" type="submit" name="button2" value="Decline">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $req1 = mysqli_fetch_array($res,MYSQLI_ASSOC);
                            }
                        }
                        $req = mysqli_fetch_array($res,MYSQLI_ASSOC);
                    }
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                }
                ?>
                <h3 class="mb-3 text-secondary">Accepted Requests</h3>
                <?php
                $sql = "SELECT * FROM `status` WHERE `DIN` = '$DIN' AND `Status` = 'Accepted'";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if ($count == 0) {
                    echo "You haven't accepted any requests yet.";
                }
                while ($row) {
                    $donationID = $row['DonationID'];
                    $sql = "SELECT `Type` FROM `donation` WHERE `DonationID` = '$donationID'";
                    $res = mysqli_query($db, $sql);
                    $req = mysqli_fetch_array($res,MYSQLI_ASSOC);
                    while ($req) {
                        $table = $req['Type'];
                        if ($table == 'book') {
                            $sql = "SELECT * FROM `book` WHERE `BookID` = '$donationID'";
                        } else
                        if ($table == 'clothes') {
                            $sql = "SELECT * FROM `clothes` WHERE `ClothId` = '$donationID'";
                        } else
                        if ($table == 'footwear') {
                            $sql = "SELECT * FROM `footwear` WHERE `FootwearID` = '$donationID'";
                        }
                        $res1 = mysqli_query($db, $sql);
                        $req1 = mysqli_fetch_array($res1,MYSQLI_ASSOC);
                        $userid = $req1['UserID'];
                        $sql = "SELECT * FROM `user` WHERE `UserID` = '$userid'";
                        $res2 = mysqli_query($db, $sql);
                        $req2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card my-3">
                                <div class="card-body">
                                    <div class="card-text">
                                        <p>Donation ID: <?php echo $donationID; ?> </p>
                                        <p>Donation Type: <?php echo $table; ?> </p>
                                        <p>Units: <?php echo $req1['Units']; ?> </p>
                                        <p>Donar: <?php echo $req2['Name'];?> </p>
                                        <p>Address: <?php echo 'H.No. ' . $req2['H.No'] . ', ' . $req2['Area'] . ', ' . $req2['City'] . ', ' . $req2['Taluka'] . ', ' . $req2['District']?> </p>
                                        <p>Mobile No: <?php echo $req2['Mobile'] ?> </p>
                                        <p>EmailID: <?php echo $req2['EmailId'] ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $req = mysqli_fetch_array($res,MYSQLI_ASSOC);
                    }
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