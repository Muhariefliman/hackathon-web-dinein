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
    <title>Profile - Dine In</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="index2.css">
</head>
<body>

    <header>
        <div class="row bg-dark navbar">
            <div class="">
                <a href="index.php"><span class="navbar-brand mb-0 h1" id="store_title">Dine In</span></a>
            </div>
            <!-- <div class="col-7">
                <form method="GET" class="input-group">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="restoName">
                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div> -->
            <!-- <div class="col">
                <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>
                            <img src="<?php echo $profile;?>" alt="Profile Picutre" class="profile_picture">
                            <label for="" style="color: white;"><?php echo $name ?></label>
                        </span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="shoppingHistory.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mail</a>
                        <a class="dropdown-item" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                        <form action="logout_Action.php" method="post">
                            <button type="submit" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
        
    </header>

    <main>

        <div class="container" style="margin-top: 25px;">
            <div class="text-center">
                <img src="<?php echo $profile ?>" alt="<?php $row['Name'] ?>" width="200px" height="200px" style="border-radius: 50%;">
            </div>
            <br>
            <div>
                <form action="" class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="Name" value="<?php echo $row['Name'] ?>">
                    <br>
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="Email" value="<?php echo $row['Email'] ?>">
                    <br>
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="pass" value="<?php echo $row['Password'] ?>">
                    <br>
                    <label for="">Phone Number</label>
                    <input type="text" name="Phone" class="form-control" value="<?php echo $row['PhoneNumber'] ?>">
                    <br>
                    <button class="btn btn-info">Updates Profile</button>
                </form>
            </div>
        </div>

    </main>
    
</body>
</html>