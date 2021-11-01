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
    <title>Mail - Dine In</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index2.css">
</head>
<body>
    <?php if(isset($_SESSION['Payment'])) header('location: payment.php'); ?>
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
        <div class="container" style="margin-top: 25px;">
        <h1 class="text-center text-monoscape">History Payment</h1>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Restaurant Name</th>
                <th scope="col">Date</th>
                <th scope="col">Seat</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>ABC</td>
                    <td>12/12/2020</td>
                    <td>2</td>
                    <td>Rp. 150.000</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>KFC</td>
                    <td>25/12/2020</td>
                    <td>3</td>
                    <td>Rp. 300.000</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>ABC 3</td>
                    <td>12/01/2020</td>
                    <td>12</td>
                    <td>Rp. 1.200.000</td>
                </tr>
            </tbody>
        </table>
        </div>
    </main>



</body>
</html>