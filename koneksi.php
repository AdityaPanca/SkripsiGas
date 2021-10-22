<?php
    $servername = "localhost";
    $database   = "monitoring_gas";
    $username   = "root";
    $password   = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn){
        die("Connection failed: " . $conn->connect_error);
    }

?>