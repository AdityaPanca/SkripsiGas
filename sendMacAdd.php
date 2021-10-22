<?php

    include ('koneksi.php');

    $mac = $_POST["mac"];
    $sql = mysqli_query($conn,"SELECT * FROM device") or die(mysqli_error());
    $row = mysqli_fetch_array($sql);

    if($mac != NULL){
        if(mysqli_num_rows($sql) == 0){
            mysqli_query($conn, "INSERT INTO device (id_perangkat) VALUES ('$mac')");
        } else{
            if($row['id_perangkat'] != $mac){
                mysqli_query($conn, "INSERT INTO device (id_perangkat) VALUES ('$mac')");
            }
        }
    }


?>