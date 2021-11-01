<?php

    include('../connection_db/connection_db.php');
    session_start();
    if(isset($_SESSION['Email'])){
        $id = $_GET['RestoId'];
    
        $restoSeat = $_POST['seat'];
        

        if(isset($_SESSION['Payment'][$id])){
            $_SESSION['Payment'][$id] += $restoSeat;
        }else{
            $_SESSION['Payment'][$id] = $restoSeat;
        }


        $queryProduct = "SELECT RestoSeat FROM `msresto` WHERE RestoId = $id";
        $resultProduct = mysqli_query($conn, $queryProduct);

        if(mysqli_num_rows($resultProduct) > 0){
            $row = mysqli_fetch_assoc($resultProduct);
        }

        $nowSeat = $row['RestoSeat'];

        $query = "UPDATE `msresto` SET RestoSeat = ($nowSeat - $restoSeat) WHERE RestoId = $id";
    
        $result = mysqli_query($conn, $query);

        header('location:../Customer/payment.php');
    }else{
        header('location:../regislogin/REGIS/register.php');
    }
    
?>