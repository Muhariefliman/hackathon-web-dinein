<?php

    include('../connection_db/connection_db.php');
    error_reporting(0);
    $restoId = $_GET['RestoId'];
    session_start();
    
    if(isset($_SESSION)){
        $email = $_SESSION['Email'];
        
        $query = "SELECT * FROM `msuser` WHERE Email = '$email'";
        $result = mysqli_query($conn, $query);
    
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $profile = "../";
            $profile = $profile.$row['Profile-Picture'];
            $name = $row['Name'];
        }
    }


    $query = "SELECT * FROM MsResto WHERE RestoId = '$restoId'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $rowResto = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rowResto['RestoName']?> - Dine In</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <div class="row bg-dark navbar">
            <?php
                if($_SESSION){?>
                <div class="col">
                    <a href="../Customer/index.php"><span class="navbar-brand mb-0 h1" id="store_title">Dine In</span></a>
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
                                <img src="<?php echo $profile;?>" alt="Profile Picutre" class="profile_picture" >
                                <label for="" style="color: white;"><?php echo $name ?></label>
                            </span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../Customer/mail.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mail</a>
                            <a class="dropdown-item" href="../Customer/profile.php"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                            <form action="../Customer/logout.php" method="post">
                                <button type="submit" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <?php
                    }else{
                        ?>
                <div class="col">
                    <a href="../index.php"><span class="navbar-brand mb-0 h1" id="store_title">Dine In</span></a>                
                </div>
                <div class="col-7">
                    <form action="" class="input-group">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col">
                    <form class="input-group">
                        <a href="../regislogin/Login/login.php" class="btn btn-outline-success mr-sm-2">Login</a>
                        <a href="../regislogin/REGIS/register.php" class="btn btn-outline-success">Register</a>
                    </form>
                </div>
                <?php }?>

        </div>
        
    </header>

    <main>
        <div class="container">
            <div>
                <h1 class="display-1"><?php echo $rowResto['RestoName'] ?></h1>
                <img src="<?php echo '../'.$rowResto['RestoPicture'] ?>" alt="<?php echo $rowResto['RestoName'] ?>" width="700px">
            </div>
            <br>
            <div>
                <h1 class="display-5">
                    Jalan <?php echo $rowResto['RestoStreet'] ?>
                </h1>
                <p class="text-monospace">
                    <?php echo $rowResto['RestoDesc'] ?>
                </p>
            </div>
            <div class="row">
                <?php
                    $queryMenu = "SELECT * FROM restomenu WHERE RestoId = '$restoId'";
                    $resultMenu = mysqli_query($conn, $queryMenu);
                    $menuCount = 0;
                    while($rowMenu = $resultMenu->fetch_assoc()){
                    $menuCount++;
                ?>
                    <div class="col">
                        <div class="card card-info" style="width: 18rem; height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rowMenu['MenuName'] ?></h5>
                                <p class="card-text"><?php echo $rowMenu['MenuDesc'] ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Rp. <?php echo $rowMenu['MenuPrice'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                    if($menuCount == 3) break;
                    }
                ?>
            </div>
            
            <div class="row form-section">
                <div class="col-sm">
                    <form action="get_items.php?RestoId=<?php echo $restoId ?>" method="POST">
                        <div class="form-group form-inline">
                            <input type="number" class="form-control" min="1" maxlength="<?php echo $rowResto['RestoSeat'] ?>" placeholder="<?php echo $rowResto['RestoSeat'] ?> Seat Available" name="seat" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-success" type="submit">Book</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
</body>
</html>