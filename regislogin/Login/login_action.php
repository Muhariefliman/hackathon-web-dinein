<?php
    include('../../connection_db/connection_db.php');
    error_reporting(0);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `msuser` WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['Password'] === $password){
            session_start();
            $_SESSION['Email'] = $email;
            header('location:../../Customer/index.php');
        }else{
            echo 'Password Incorrect';
        }
    }else{
        echo 'Username Tidak Ditemukan';
    }






?>