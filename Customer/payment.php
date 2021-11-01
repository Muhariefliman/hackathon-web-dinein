<?php

    include('../connection_db/connection_db.php');
    session_start();
    $email = $_SESSION['Email'];
    
    $query = "SELECT * FROM `msuser` WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $profile = "../";
        $profile = $profile.$row['Profile-Picture'];
        $name = $row['Name'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Dine In</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="index2.css">
</head>
<body>
    <header>
        <div class="row bg-dark navbar">
            <div class="col">
                <a href="index.php"><span class="navbar-brand mb-0 h1" id="store_title">Dine In</span></a>
            </div>
            <div class="col-7">
                <form method="GET" class="input-group">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="restoName">
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="col">
                <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>
                            <img src="<?php echo $profile;?>" alt="Profile Picutre" class="profile_picture">
                            <label for="" style="color: white;"><?php echo $name ?></label>
                        </span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="mail.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mail</a>
                        <a class="dropdown-item" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                        <form action="logout.php" method="post">
                            <button type="submit" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <?php
                if(isset($_SESSION['Payment'])){
                    foreach ($_SESSION["Payment"] as $productID => $jumlahProduct){
                        $queryPerProduct = "SELECT * FROM `msresto` WHERE RestoId = $productID";
                        $resultPerProdut = mysqli_query($conn, $queryPerProduct);
                        if(mysqli_num_rows($resultPerProdut) > 0){
                            $rowPerProduct = mysqli_fetch_assoc($resultPerProdut);
                        }
                        $PricePerProduct = $jumlahProduct*$rowPerProduct['SeatPrice'];
            ?>
            <div class="text-center text-monospace">
                <h1 class="display-2">Restaurant <?php echo $rowPerProduct['RestoName'];?></h1>
                <p class="display-4"><?php echo $rowPerProduct['RestoDesc'] ?>, <?php echo $rowPerProduct['RestoStreet'] ?></p>
                <img src="<?php echo '../'.$rowPerProduct['RestoPicture'] ?>" alt="<?php echo $rowPerProduct['RestoName'];?>" width="700px">
            </div>
            <div class="text-monospace">
                <p>Your Payment: </p>
                <p><?php echo $jumlahProduct ?> Seat: <?php echo $PricePerProduct ?></p>
                <br>
                <p>How To Pay:</p>

                <form action="get_payment.php" method="post">
                    <ul style="list-style: none;">
                        <li>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPayment" id="inlineRadio1" value="cash" required>
                                <label class="form-check-label" for="genderRadio"><i class="fa fa-money" aria-hidden="true"></i> Cash</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPayment" id="inlineRadio1" value="card" required>
                                <label class="form-check-label" for="genderRadio"><i class="fa fa-credit-card" aria-hidden="true"></i> Credit/Debit Card</label>
                            </div>
                        </li>
                    </ul>
                    
                    <button class="btn btn-outline-primary" type="submit" name="last-action" value="paynow">Pay Now</button>
                    <button class="btn btn-outline-danger" type="submit" name="last-action" value="cancel">Cancel</button>

                </form>
                <br>
            </div>
            <?php } ?>
            <?php   }else{ ?>

                <div class="container">
                    <h1 class="text-center text-monospace" style="margin-top: 250px;">No Payments Available</h1>
                </div>

            <?php } ?>

        </div>
    </main>


</body>
</html>