<?php
  include 'sugeno.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <span id="time"></span>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <h3><span id="temperature"></span>&deg;C</h3>
                <p style="font-size: 20px"> Temperature</p>
              </div>
              <div class="icon">
                <i class="fa fa-thermometer-half"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><span id="humidity"></span>%</h3>
                <p style="font-size: 20px"> Humidity</p>
              </div>
              <div class="icon">
                <i class="fas fa-burn"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><span id="mq"></span>ppm</h3>
                <p style="font-size: 20px"> Kadar Gas</p>
              </div>
              <div class="icon">
                <i class="fas fa-fire"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <span id="kipas" hidden></span>
              <span id="buzzer" hidden></span >
              <h3 style="font: size 75px;color:black;"> Kipas</h3>
              </div>
              <div class="icon">
                <i class="fas fa-fan"></i>
              </div>
              <div class="card-body">
                <input type="checkbox" id="manualBtn" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>
            </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Chart Temperature</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="ChartTemperature" height="200" min-width="200"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Chart Humidity</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="ChartHumidity" height="200" min-width="200"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Chart Kadar gas</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="ChartMq" height="200" min-width="200"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
    </div><!-- /.container-fluid -->
  </section>
    <!-- /.content -->
  </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->