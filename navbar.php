<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo.png" alt="AdminLTELogo" height="180" width="250">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <h2><center>Monitoring Gas</center></h2>
    </ul>
    <ul class="navbar-nav ml-auto">
        <form action="overview.php" method="post" >
            <div class="input-group" >
              <select class="form-control" name = "id_perangkat" id="id_perangkat">
                  <?php 
                  include 'koneksi.php';

                  $query = mysqli_query($conn, "SELECT p.id_perangkat, t.nama_perangkat FROM koneksi AS t
                  INNER JOIN device AS p ON t.id_perangkat = p.id_perangkat");
                  while($data=mysqli_fetch_array($query)){?>
                    <?php
                        if($data['id_perangkat'] == $_SESSION["id_perangkat"])
                        {
                            ?>
                            <option <?php echo 'selected="selected"'?> value="<?=$_SESSION["id_perangkat"];?>"><?php echo $data['nama_perangkat'];?></option>
                            <?php
                        }
                        else
                        {
                          ?>
                          <option value="<?=$data['id_perangkat'];?>"><?php echo $data['nama_perangkat'];?></option>
                          <?php
                        }
                    ?> 
                    <?php } ?>
              </select>
              <div class="input-group-append" >
                <button class="btn btn-success" type="submit">
                  <i class="fas fa-check fa-sm"></i>
                </button>
              </div>
            </div>
        </form> 
    </ul>
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->