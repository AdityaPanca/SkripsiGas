<?php
    include 'koneksi.php';

    $mac = $_GET['id_perangkat'];

    $query = mysqli_query($conn, "DELETE FROM koneksi WHERE id_perangkat = '$mac'");

    if($query){
        header("location:dv_management.php");
    }
?>