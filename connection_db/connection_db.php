<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "hackathon_db";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
        die('SomeThing Went Wrong. Cannot Connect To My Sql');
    }

?>