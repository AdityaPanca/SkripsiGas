
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
<!-- <?php include "sugeno.php";?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Device Management</h1>
    <span id="time"></span>
</div>

<!-- Content Row -->
<div class="row">
<div class="col-md-12">
    <div class="card border-left-dark shadow ">
    <div class="card-body">
    <form action="inputMac.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Perangkat</label>
            <input type="text" class="form-control" name = "nama_perangkat" id="nama_perangkat" placeholder="Nama Perangkat">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Mac Address</label>
            <select class="form-control" name = "id_perangkat" id="id_perangkat">
            <option disabled selected>Select Device...</option>
                <?php 
                include 'koneksi.php';

                $query = mysqli_query($conn, "SELECT * FROM device");
                while($data=mysqli_fetch_array($query)){?>
                    <option value="<?=$data['id_perangkat'];?>"><?= $data['id_perangkat'];?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" onclick = "publishMQTT_Connect(1); publishMQTT_Mac();" class="btn btn-success">Connect</button>
    </form>
    </div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
    <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nama Perangkat</th>
        <th scope="col">Mac Address</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            include 'koneksi.php';

            $query = mysqli_query($conn, "SELECT k.id, p.id_perangkat, k.nama_perangkat FROM koneksi AS k
            INNER JOIN device AS p ON k.id_perangkat = p.id_perangkat");
            
            while($data=mysqli_fetch_array($query)){?>
            <tr>
            <td id="macadd"><?=$data['id_perangkat'];?></td>
            <td><?=$data['nama_perangkat'];?></td>
            <td><a href="deleteMac.php?id_perangkat=<?php echo $data['id_perangkat'];?>">
            <button type="button" class="btn btn-danger btn-sm" onclick="publishMQTT_Disconnect(0); publishMQTT_Dis('<?=$data['id_perangkat'];?>');">Disconnect!</button></td>
            </tr>
        <?php } ?>

    </tbody>
</table>
    
    </div>
</div>
</div>
</div>


<!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>