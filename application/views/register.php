<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WTIS Admin Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form>
            <div class="form-group">
                <input type="text" id="name" class="form-control" placeholder="Nama" required="required" autofocus="autofocus">
            </div>
            <div class="form-group">
                  <input type="text" id="nis" class="form-control" placeholder="NIS" required="required">
            </div>
            <div class="form-group">
                <select id="tingkat" class="form-control" required="required">
                  <option>Tingkat</option>
                  <option value='10'>10</option>
                  <option value='11'>11</option>
                  <option value='12'>12</option>
                  <option value='13'>13</option>
                </select>
            </div>
            <div class="form-group">
                <select id="kelas" class="form-control" required="required">
                  <option>Kelas</option>
                  <option value='A'>A</option>
                  <option value='B'>B</option>
                  <option value='C'>C</option>
                  <option value='D'>D</option>
                </select>
            </div>
            <div class="form-group">
                <select id="jurusan" class="form-control" required="required">
                  <option>Jurusan</option>
                  <option value="SIJA">SIJA</option>
                  <option>ELKOM</option>
                  <option>TPTU</option>
                  <option>TOI</option>
                  <option>EIND</option>
                  <option>RPL</option>
                  <option>Broadcast / TP4</option>
                  <option>IOP</option>
                </select>
            </div>
            <div class="form-group">  
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                </div>
                <div class="col-md-6">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                </div>
              </div>
            </div>
            <a class="btn btn-danger btn-block" href="login.html">Register as a student</a>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.html">Login Page</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

  </body>

</html>

