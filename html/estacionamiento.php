<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ePark | Panel de control</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
  include '../templates/head.php'; 
  include '../build/js/conexion.html'; 
  include '../build/estacionamiento_c.php';
  include '../build/clientes_c.php';

  ?>

  <script type="text/javascript">
    est=new Estacionamiento();
    clientela=new Cliente();

  </script>

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include '../templates/menu.html'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Estacionamiento</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Estacionamiento</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-lg">Registrar cliente</button>
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
                <h3 id="h3"><script type="text/javascript">est.getAutos();</script></h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-12"> 
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">

                  <tbody id="tablilla">


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="titulo"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Estatus</label>
                        <select class="custom-select" id="estado" name="estado">
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12 esconder">
                      <!-- select -->
                      <div class="form-group esconder">
                        <label class="esconder">Cliente</label>
                        <select class="custom-select esconder" name="estado" id="cl">
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12 esconder">
                      <!-- select -->
                      <div class="form-group esconder">
                        <label class="esconder">Tarifa</label>
                        <select class="custom-select esconder" name="estado" id="taf">
                          
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12 esconder">
                      <!-- select -->
                      <div class="form-group esconder">
                        <label class="esconder">Tiempo</label>
                        <select class="custom-select esconder" name="time" id="time">
                          <option value="0.50">30 Minutos</option>
                          <option value="1">1 Hora</option>
                          <option value="2">2 Horas</option>
                          <option value="3">3 Horas</option>
                          
                        </select>
                      </div>
                    </div>

              </div>
            </div>
            <input type="hidden" id="lote">
            <input type="hidden" id="estacionamiento">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary enviar">Guardar cambios</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registrar cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre_cliente" placeholder="Ingrese el nombre del cliente">
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellido(s)</label>
                    <input type="text" class="form-control" id="apellido_cliente" placeholder="Ingrese el apellido del cliente">
                  </div>
                  <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Sexo</label>
                        <select class="custom-select" id="sexo">
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                          <option value="Otro(s)">Otro(s)</option>
                         
                        </select>
                      </div>
                    </div>
                  
                  
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary guardar">Guardar cliente</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

          <!--Contenido principal-->
          <script type="text/javascript">
            //clientela.agregar("Jose","Escobedo Garcia","Otro");
            est.getDatos();
            
          </script>


          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include '../templates/footer.php'; ?>
<script src="../build/js/est_tomar_datos.js"></script>
<script src="../build/js/historial_c.js"></script>
<script src="../build/js/agregar_cliente.js"></script>

<script src="../build/js/Administrador.js"></script>

  <script type="text/javascript">
  var admin = new Administrador();
  admin.observador();
</script>

 
</body>
</html>
