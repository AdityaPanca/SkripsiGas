<?php

    include ('koneksi.php');

    $temperature = $_POST["gas/temperature"];
    $humidity = $_POST["gas/humidity"];
    $gas = $_POST["gas/mq"];
    $mac = $_POST["gas/mac"];

    $sql = mysqli_query($conn,"SELECT * FROM monitor") or die(mysqli_error());
    

    // if($mac !='' && $temperature != 0 && $humidity != 0 && $gas != 0){
        mysqli_query($conn, "INSERT INTO monitor (id_perangkat, temperature, humidity, mq) VALUES ('$mac', '$temperature', '$humidity', '$gas')");
    // }

?>