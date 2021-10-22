<?php
    session_start();
?>
    <?php
    session_unset();

    if(isset($_POST['id_perangkat'])){
        $id_perangkat = $_POST['id_perangkat'];
        $_SESSION["id_perangkat"] = (string)$id_perangkat;
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "head.php";?>
    </head>
    <body class="hold-transition sidebar-mini">
        <?php include "sidebar.php";?>
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include "navbar.php";?>
            <?php include "dashboard.php";?>
            <?php include "footer.php";?>
            <?php include "js.php";?>
    </body>
</html>