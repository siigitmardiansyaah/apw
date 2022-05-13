<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link href="<?php echo base_url() ?>assets/data.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/data.png" rel="apple-touch-icon">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/admin/css/main.css">
  <!--===============================================================================================-->
</head>

<body>
  <?php
  if ($this->session->flashdata('success')) {
  ?>
    <div class="alert alert-success alert-dismissible show text-center" role="alert">
      <?= $this->session->flashdata('success') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  ?>

  <?php
  if ($this->session->flashdata('error')) {
  ?>
    <div class="alert alert-danger alert-dismissible show text-center" role="alert">
      <?= $this->session->flashdata('error') ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
  }
  ?>
  <div class="limiter">

    <div class="container-login100">
      <div class="wrap-login100 p-t-50 p-b-90">
        <form class="login100-form validate-form flex-sb flex-w" action="<?php echo base_url() ?>login/verif_admin" method="post">
          <span class="login100-form-title p-b-51">
            Login
          </span>


          <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
            <input class="input100" id="username" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>


          <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
            <input class="input100" id="password" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>



  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url() ?>assets/login/admin/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>


</body>

</html>