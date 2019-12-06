<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ePark | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="https://www.gstatic.com/firebasejs/5.0.3/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.0.3/firebase-firestore.js"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>e</b>Park
  </div>
    <center>
      <button class="btn btn-success mb-3" data-toggle="modal" 
        data-target="#modalAgregar">Agregar Administrador
      </button>
    </center>
    <div class="mt-2 mb-2" id="displayRegister" style="color: red"></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión en tu cuenta</p>

      
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="correoLogin" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="passwordLogin" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

      

         <!-- modal-agregar -->
      <div class="modal" role="dialog" id="modalAgregar">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agregar Administrador</h5>
              <div id="passwordMessage"></div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="emailAgregar">Email</label>
              <input type="email" id="emailAgregar" class="form-control mb-3">
              <label for="nombreAgregar">nombre</label>
              <input type="text" id="nombreAgregar" class="form-control mb-3">
              <label for="telAgregar">teléfono</label>
              <input type="tel" id="telAgregar" class="form-control">
              <label for="passwordAgregar">contraseña</label>
              <input type="password" id="passwordAgregar" class="form-control">
              <label for="passwordConfirmar">confirmar contraseña</label>
              <input type="password" id="passwordConfirmar" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="admin.agregar()">Guardar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
    </div>

        <div class="row">
          
          <!-- /.col -->
          <form action="html/administradores.php">
            <div class="col-12">
              <center>
                <input onclick="admin.signIn()" value="Iniciar sesión" class="btn btn-primary btn-block">
              </center>
            </div>
          </form>
          <!-- /.col -->
        </div>

        <div id="display" class="mt-2" style="color: red;"></div>
      

      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyDbIcnNoh6_pmkRWNUlbZY5-hLxQJklskc",
                authDomain: "e-park-71416.firebaseapp.com",
                databaseURL: "https://e-park-71416.firebaseio.com",
                projectId: "e-park-71416",
                storageBucket: "e-park-71416.appspot.com",
                messagingSenderId: "1048067032791",
                appId: "1:1048067032791:web:d5c50a8f3872b781059292",
                measurementId: "G-WLL0HHBVY4"
              };

            firebase.initializeApp(config);
            const db = firebase.firestore();
            db.settings({ timestampsInSnapshots: true }); 
        </script>

        <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-auth.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

<script src="build/js/Administrador.js"></script>

<script type="text/javascript">
  var admin = new Administrador();
</script>

</body>
</html>
