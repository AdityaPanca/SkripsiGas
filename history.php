  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Perangkat</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Kadar Gas</th>
                </tr>
                  </thead>
                  <tbody>       
                  <?php
                      $koneksi = mysqli_connect("localhost", "root", "", "monitoring_gas");
                      $sel_query= "SELECT * FROM monitor ";
                      $result = mysqli_query($koneksi,$sel_query);
                      while($row = mysqli_fetch_assoc($result))
                      {
                        echo '
                            <tr>
                            <td>'.$row["id_perangkat"].'</td>
                            <td>'.$row["temperature"].'</td>
                            <td>'.$row["humidity"].'</td>
                            <td>'.$row["mq"].' </td>
                          </tr>        
                        ';
                      }
                      ?> 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Perangkat</th>
                      <th>Temperature</th>
                      <th>Humidity</th>
                      <th>Kadar Gas</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
