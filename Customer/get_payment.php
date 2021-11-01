<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['Payment']) && isset($_SESSION['Email'])){
        $_SESSION['Payment'] = array();
        unset($_SESSION['Payment']);
        header('location:index.php');
    }

?>