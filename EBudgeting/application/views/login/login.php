<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo "Login Page"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="" />
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/responsivelogin.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .navbar-inverse {
      background-color: #333;
    }

    .navbar-color {
      color: #fff;
    }

    blink,
    .blink {
      animation: blinker 3s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
  </style>
</head>

<body class="hold-transition login-page" style="overflow-y: hidden;background:url(
	'<?php echo base_url('assets/image/plnLogin.jpeg'); ?>')no-repeat;background-size: cover;width: 100%;">


  <div class="login-box">
    <br />
    <div class="login-logo">
      <a href="index.php" style="color: yellow;">E-Budgeting 2022<br /><b>PLN ASTER</b></a>
    </div>
    <div id="tampilalert"></div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border:2px solid #226bbf;">
      <p class="login-box-msg" style="font-size:16px;"></p>
      <form action="<?= base_url('C_login/authentikasi_admin'); ?>" method="POST">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" id="user" name="user" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <?php echo $this->session->flashdata('username'); ?>
        </div>


        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <?php echo $this->session->flashdata('password'); ?>
        </div>


        <div class="row">
          <div class="col-xs-8">
            <!-- /.col
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" value="R1"> Remember Me
            </label>
          </div>-->
            <!-- /.social-auth-links -->
          </div>
          <div class="col-xs-4">
            <button type="submit" id="loding" class="btn btn-primary btn-block btn-flat">LOGIN</button>
            <div id="loadingcuy"></div>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
    <br />
    <footer>
      <div class="login-box-body text-center bg-blue">
        <a style="color: yellow;"> Copyright &copy; E-budgeting PLN ASTER - <?php echo date("Y"); ?>
      </div>
    </footer>
  </div>
  <!-- /.login-box -->
  <!-- Response Ajax -->
  <div id="tampilkan"></div>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets/assets_style/assets/plugins/iCheck/icheck.min.js'); ?>"></script>
</body>

</html>