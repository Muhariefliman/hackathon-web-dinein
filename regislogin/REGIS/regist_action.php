<?php
    include('../../connection_db/connection_db.php');
    error_reporting(0);
    // GET DATA FROM REGISTER.PHP
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'];
    $password = $_POST['password'];

    $storeTo = "assets/PictureProfile/pict.png";
    
    $query = "INSERT INTO MsUser (`Name`, Email, PhoneNumber, `Password`, `Profile-Picture`) VALUES ('$name', '$email', '$phone', '$password', '$storeTo')";
    $result = mysqli_query($conn, $query);
    
    if($result){

        header('location:../Login/login.php');
    }else{
        echo mysqli_error($result);
    }
?>